<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index() {
        $subjects = Subject::all();
        return view('subjects.index', ['subjects' => $subjects]);
    }

    public function vraca_json()
    {
        $subjects = Subject::all(); // Dohvaća sve predmete iz baze
        return response()->json($subjects);
    }

    public function create() {
        return view('subjects.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'subject_name' => 'required:subjects,name' ?? 'Bez naziva',
        ]);

        $newSubject = Subject::create($data);

        return redirect(route('subjects.index'));
    }

    public function edit(Subject $subject) {
        return view('subjects.edit', ['subject' => $subject]);
    }

    public function update(Subject $subject, Request $request) {
        $data = $request->validate([
            'subject_name' => 'required:subjects,name' ?? 'Bez naziva',
        ]);
        $subject->update($data);

        return redirect(route('subjects.index'))->with('success', 'Predmet je uspješno uređen!');
    }

    public function delete(Subject $subject) {
        $subject->delete();

        return redirect(route('subjects.index'))->with('success', 'Predmet je uspješno obrisan!');
    }

    
}
