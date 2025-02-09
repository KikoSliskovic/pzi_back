<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index() {
        $professors = Professor::all();
        return view('professors.index', ['professors' => $professors]);
    }

    public function vraca_json()
    {
        $professors = Professor::all(); // Dohvaća sve predmete iz baze
        return response()->json($professors);
    }

    public function create() {
        return view('professors.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required:professors,name' ?? 'Bez naziva',
            'email' => 'required|unique:professors,email' ?? 'Bez e-pošte',
        ]);

        $newprofessor = Professor::create($data);

        return redirect(route('professors.index'));
    }

    public function edit(Professor $professor) {
        return view('professors.edit', ['professor' => $professor]);
    }

    public function update(Professor $professor, Request $request) {
        $data = $request->validate([
            'name' => 'required:professors,name' ?? 'Bez naziva',
            'email' => 'required|unique:professors,email' ?? 'Bez e-pošte',
        ]);
        $professor->update($data);

        return redirect(route('professors.index'))->with('success', 'Predmet je uspješno uređen!');
    }

    public function delete(Professor $professor) {
        $professor->delete();

        return redirect(route('professors.index'))->with('success', 'Predmet je uspješno obrisan!');
    }
}
