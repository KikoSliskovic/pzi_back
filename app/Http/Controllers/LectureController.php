<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Classroom;
use App\Models\Subject;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index() {
        $lectures = Lecture::with('classroom', 'subject')->get(); // Eager load the related classroom data
        return view('lectures.index', ['lectures' => $lectures]);
    }

    public function vraca_json()
    {
        $lectures = Lecture::with('classroom', 'subject', 'korisnik')->get(); // Ovo će učitati podatke o učionici zajedno s predavanjima
        return response()->json($lectures);
    }

    public function create() {
        $classrooms = Classroom::all();
        $subjects = Subject::all();

        return view('lectures.create', compact('classrooms', 'subjects'));
    }


    public function create2()
    {
        // Fetch all classrooms from the database
        $classrooms = Classroom::all();
        $subjects = Subject::all();

        // Pass the classrooms to the view
        return view('lectures.create2', compact('classrooms', 'subjects'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'subject_id' => 'required:lectures,subject_id',
            'classroom_id' => 'required|exists:classrooms,id',
            'professor_id' => 'required:lectures,professor_id',
            'user_id' => 'required:lectures,user_id',
            'qr_code_id' => 'required:lectures,qr_code_id',
            'date' => 'required:lectures,date',
            'attendance' => 'required:lectures,attendance' ?? 0,
        ]);

        $newLecture = Lecture::create($data);

        return redirect(route('lectures.index'));
    }

    public function edit(Lecture $lecture) {
        return view('lectures.edit', ['lecture' => $lecture]);
    }

    public function update(Lecture $lecture, Request $request) {
        $data = $request->validate([
            'subject_id' => 'required:lectures,subject_id',
            'classroom_id' => 'required:lectures,classroom_id',
            'professor_id' => 'required:lectures,professor_id',
            'user_id' => 'required:lectures,user_id',
            'qr_code_id' => 'required:lectures,qr_code_id',
            'date' => 'required:lectures,date',
            'attendance' => 'required:lectures,attendance' ?? 0,
        ]);
        $lecture->update($data);

        return redirect(route('lectures.index'))->with('success', 'Lekcija je uspješno uređena!');
    }

    public function delete(Lecture $lecture) {
        $lecture->delete();

        return redirect(route('lectures.index'))->with('success', 'Lekcija je uspješno obrisana!');
    }

}
