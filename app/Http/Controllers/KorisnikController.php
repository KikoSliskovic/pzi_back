<?php

namespace App\Http\Controllers;

use App\Models\Korisnik;
use Illuminate\Http\Request;

class KorisnikController extends Controller
{
    public function index() {
        $korisnici = Korisnik::all();
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

        $newKorisnik = Korisnik::create($data);

        return redirect(route('korisnici.index'));
    }

    public function edit(Korisnik $korisnik) {
        return view('korisnici.edit', ['korisnik' => $korisnik]);
    }

    public function update(Korisnik $korisnik, Request $request) {
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
        $korisnik->update($data);

        return redirect(route('korisnici.index'))->with('success', 'Korisnik je uspješno uređen!');
    }

    public function delete(Korisnik $korisnik) {
        $korisnik->delete();

        return redirect(route('korisnici.index'))->with('success', 'Korisnik je uspješno obrisan!');
    }
}
