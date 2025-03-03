<?php

namespace App\Http\Controllers;

use App\Models\UJOrganizacija;
use Illuminate\Http\Request;

class UJController extends Controller
{
    public function index() {
        $organisations = UJOrganizacija::all();
        return view('organisations.index', ['organisations' => $organisations]);
    }

    public function create() {
        return view('organisations.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required:organisations,name',
        ]);

        $newOrganisation = UJOrganizacija::create($data);

        return redirect(route('organisations.index'));
    }

    public function delete(UJOrganizacija $organisation) {
        $organisation->delete();

        return redirect(route('organisations.index'))->with('success', 'Ustrojbena jedinica je uspješno obrisana!');
    }

    public function index2()
    {
        $data = UJOrganizacija::all();
        return response()->json($data);
    }
}