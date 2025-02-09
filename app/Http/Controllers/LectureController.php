<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Professor;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index() {
        $lectures = Lecture::with('classroom', 'subject', 'professor')->get(); // Eager load the related classroom data
        return view('lectures.index', ['lectures' => $lectures]);
    }

    public function vraca_json()
    {
        $lectures = Lecture::with('classroom', 'subject', 'professor')->get(); // Ovo će učitati podatke o učionici zajedno s predavanjima
        return response()->json($lectures);
    }

    public function create() {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        $professors = Professor::all();

        return view('lectures.create', compact('classrooms', 'subjects', 'professors'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'subject_id' => 'required:lectures,subject_id',
            'classroom_id' => 'required|exists:classrooms,id',
            'professor_id' => 'required|exists:professors,id',
            'user_id' => 'lectures,user_id',
            'qr_code_id' => 'lectures,qr_code_id',
            'date' => now(),
            'attendance' => 'lectures,attendance' ?? 0,
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

    public function delete(Lecture $lecture) {
        $lecture->delete();

        return redirect(route('lectures.index'))->with('success', 'Lekcija je uspješno obrisana!');
    }

}
