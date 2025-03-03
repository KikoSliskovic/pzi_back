<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Uređivanje postojeće učionice u Bazi podataka</h1>
    <form method="post" action="{{route('korisnici.update', ['korisnik' => $korisnik])}}">
        @csrf
        @method('put')
        <div>
            <label>Naziv korisnika: </label>
            <input type="name" name="name" placeholder="Ante Šimić" value="{{$korisnik->name}}"/>
        </div>
        <div>
            <label>E-pošta: </label>
            <input type="email" name="email" placeholder="e-pošta" value="{{$korisnik->email}}"/>
        </div>
        <div>
            <label>Lozinka: </label>
            <input type="password" name="password" placeholder="********" value="{{$korisnik->password}}"/>
        </div>
        <div>
            <label>Datum rođenja: </label>
            <input type="date" name="date_of_birth" placeholder="DD.MM.YYYY." value="{{$korisnik->date_of_birth}}"/>
        </div>
        <div>
            <label for="academic_degree">Academic Degree: </label>
            <select name="academic_degree" id="academic_degree" required>
                <option value="" disabled selected>Odaberite akademski stupanj:</option>
                <option value="Upisnik" {{ old('academic_degree') == 'Upisnik' ? 'selected' : '' }}>Upisnik</option>
                <option value="Student" {{ old('academic_degree') == 'Student' ? 'selected' : '' }}>Student</option>
                <option value="Prvostupnik" {{ old('academic_degree') == 'Prvostupnik' ? 'selected' : '' }}>Prvostupnik</option>
                <option value="Magistar" {{ old('academic_degree') == 'Magistar' ? 'selected' : '' }}>Magistar</option>
                <option value="Docent" {{ old('academic_degree') == 'Docent' ? 'selected' : '' }}>Docent</option>
                <option value="Ostalo" {{ old('academic_degree') == 'Ostalo' ? 'selected' : '' }}>Doktorand</option>
            </select>
        </div>
        <div>
            <label>Akademsko zvanje: </label>
            <input type="academic_vocation" name="academic_vocation" placeholder="mag. ing. traff." value="{{$korisnik->academic_vocation}}"/>
        </div>
        <div>
            <label for="organisation_id">Ustrojbena jedinica: </label>
            <select name="organisation_id" id="organisation_id" required>
                <option value="" disabled selected>Odaberite ustrojbenu jedinicu:</option>
                <option value="FPMOZ" {{ old('organisation_id') == 'FPMOZ' ? 'selected' : '' }}>FPMOZ - Fakultet prirodoslovno-matematičkih i odgojnih znanosti</option>
                <option value="EF" {{ old('organisation_id') == 'EF' ? 'selected' : '' }}>EF - Ekonomski fakultet</option>
                <option value="APTF" {{ old('organisation_id') == 'APTF' ? 'selected' : '' }}>APTF - Agronomski i prehrambeno-tehnološki fakultet</option>
                <option value="ALU" {{ old('organisation_id') == 'ALU' ? 'selected' : '' }}>ALU - Akademija likovnih umjetnosti</option>
                <option value="FSRE" {{ old('organisation_id') == 'FSRE' ? 'selected' : '' }}>FSRE - Fakultet strojarstva, računarstva i elektrotehnike</option>
                <option value="FZS" {{ old('organisation_id') == 'FZS' ? 'selected' : '' }}>FZS - Fakultet zdravstvenih studija</option>
                <option value="FF" {{ old('organisation_id') == 'FF' ? 'selected' : '' }}>FF - Farmaceutski fakultet</option>
                <option value="FF" {{ old('organisation_id') == 'FF' ? 'selected' : '' }}>FF - Filozofski fakultet</option>
                <option value="GF" {{ old('organisation_id') == 'GF' ? 'selected' : '' }}>GF - Građevinski fakultet</option>
                <option value="MF" {{ old('organisation_id') == 'MF' ? 'selected' : '' }}>MF - Medicinski fakultet</option>
                <option value="PF" {{ old('organisation_id') == 'PF' ? 'selected' : '' }}>PF - Pravni fakultet</option>
                <option value="PMF" {{ old('organisation_id') == 'PMF' ? 'selected' : '' }}>PMF - Fakultet prirodoslovno-matematičkih i odgojnih znanosti</option>
            </select>
        </div>
        <div>
            <input type="submit" value="Potvrdi" />

            <a href="{{route('organisations.index')}}">
                <input type="button" value="Natrag" style="margin-top: 5px"/>
            </a>
        </div>
    </form>

    <div>
        @if($errors->any())
        <h4 bold>Pronađeni problemi pri dodavanju:</h4>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <br>
        <br>
        <br>
        
        @endif
    </div>
</body>
</html>