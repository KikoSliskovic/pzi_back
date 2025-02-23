<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KorisnikController extends Controller
{
    public function index() {
        $korisnici = User::all();
        return response()->json($korisnici);
        return view('korisnici.index', ['korisnici' => $korisnici]);
    }

    public function create() {
        return view('korisnici.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required:users,name',
            'email' => 'required|unique:users,email',
            'email_verified_at' => 'users,email_verified_at',
            'password' => 'required:users,password',
            'date_of_birth' => 'required:users,date_of_birth',
            'academic_degree' => 'nullable:users,academic_degree',
            'academic_vocation' => 'nullable:users,academic_vocation',
            'organisation_id' => 'nullable:users,organisation_id',
        ]);

        $newKorisnik = User::create($data);

        return redirect(route('korisnici.index'));
    }

    public function edit(User $user) {
        return view('korisnici.edit', ['user' => $user]);
    }

    public function update(User $User, Request $request) {
        $data = $request->validate([
            'name' => 'required:users,name',
            'email' => 'required:users,email',
            'email_verified_at' => 'users,email_verified_at',
            'password' => 'required:users,password',
            'date_of_birth' => 'required:users,date_of_birth',
            'academic_degree' => 'nullable:users,academic_degree',
            'academic_vocation' => 'nullable:users,academic_vocation',
            'organisation_id' => 'nullable:users,organisation_id',
        ]);
        $User->update($data);

        return redirect(route('korisnici.index'))->with('success', 'Korisnik je uspješno uređen!');
    }

    public function delete(User $user) {
        $user->delete();

        return redirect(route('korisnici.index'))->with('success', 'Korisnik je uspješno obrisan!');
    }
}
