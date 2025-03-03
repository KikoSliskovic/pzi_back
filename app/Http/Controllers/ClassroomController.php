<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{

    public function getClassrooms(Request $request){
        $data = Classroom::all();
        return response()->json($data);
    }

    public function index() {
        $classrooms = Classroom::all();
        return view('classrooms.index', ['classrooms' => $classrooms]);
    }

    public function vraca_json()
    {
        $subjects = Classroom::all(); // Dohvaća sve classroome iz baze
        return response()->json($subjects);
    }

    public function create() {
        return view('classrooms.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required|unique:classrooms,name',
            'organisation_id' => 'required|string'
        ]);

        $newClassroom = Classroom::create($data);

        return redirect(route('classrooms.index'));
    }

    public function edit(Classroom $classroom) {
        return view('classrooms.edit', ['classroom' => $classroom]);
    }

    public function update(Classroom $classroom, Request $request) {
        $data = $request->validate([
            'name' => 'required:classrooms,name',
        ]);
        $classroom->update($data);

        return redirect(route('classrooms.index'))->with('success', 'Učionica je uspješno uređena!');
    }

    public function delete(Classroom $classroom) {
        $classroom->delete();

        return redirect(route('classrooms.index'))->with('success', 'Učionica je uspješno obrisana!');
    }

    public function index2()
    {
        $classroom = Classroom::all(); // Dohvaća sve predmete iz baze
        return response()->json($classroom);
    }
}
