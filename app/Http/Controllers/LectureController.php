<?php

namespace App\Http\Controllers;

use App\Helpers\QrHelper;
use App\Models\Lecture;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use OTPHP\TOTP;

class LectureController extends Controller
{

    public function getLectures(Request $request){
        $lectures = Lecture::where("user_id",Auth::id())->with('classroom', 'subject', 'professor','user')->get(); 
        return response()->json($lectures);
    }

    public function index()
    {
        $lectures = Lecture::with('classroom', 'subject', 'professor')->get(); // Eager load the related classroom data
        return view('lectures.index', ['lectures' => $lectures]);
    }

    public function vraca_json()
    {
        $lectures = Lecture::with('classroom', 'subject', 'professor')->get(); // Ovo će učitati podatke o učionici zajedno s predavanjima
        return response()->json($lectures);
    }

    public function create()
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        $professors = Professor::all();

        return view('lectures.create', compact('classrooms', 'subjects', 'professors'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'qr_code' => 'required|string',
            'otp' => 'required|string',
        ]);

        // Decrypt the QR code data
        $decryptedData = QrHelper::decrypt($data['qr_code']);
        $totpSecret = $decryptedData['totp_secret'] ?? null;

        if (!$totpSecret) {
            return back()->withErrors(['qr_code' => 'Invalid QR code data.']);
        }

        // Decrypt the OTP received from the user
        try {
            $otp = Crypt::decrypt($data['otp']);
        } catch (\Exception $e) {
            return back()->withErrors(['otp' => 'Invalid OTP format.']);
        }

        // Verify the OTP using the TOTP secret
        $totp = TOTP::createFromSecret($totpSecret);

        if (!$totp->verify($otp)) {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }

        // If OTP is valid, mark attendance
        // $user = Auth::user();
        $date = now();

        // Store attendance logic here (Example: Save to the database)
        Lecture::create([
            'user_id' => Auth::id(),
            'classroom_id' => $decryptedData['classroom_id'],
            'subject_id' => $decryptedData['subject_id'],
            'professor_id' => $decryptedData['professor_id'],
            'date' => $date,
            'attendance' => true,
        ]);

        return response()->json(['message'=>'success', 'info'=>'Attendance marked successfully.']);
    }

    public function edit(Lecture $lecture)
    {
        return view('lectures.edit', ['lecture' => $lecture]);
    }

    public function update(Lecture $lecture, Request $request)
    {
        $data = $request->validate([
            'subject_id' => 'required:lectures,subject_id',
            'classroom_id' => 'required|exists:classrooms,id',
            'professor_id' => 'required|exists:professors,id',
            'user_id' => 'lectures,user_id',
            'qr_code_id' => 'lectures,qr_code_id',
            'date' => now(),
            'attendance' => 'lectures,attendance' ?? 0,
        ]);
        $lecture->update($data);

        return redirect(route('lectures.index'))->with('success', 'Lekcija je uspješno uređena!');
    }

    public function delete(Lecture $lecture)
    {
        $lecture->delete();

        return redirect(route('lectures.index'))->with('success', 'Lekcija je uspješno obrisana!');
    }
}
