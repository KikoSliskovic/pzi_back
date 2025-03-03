<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>POPIS KORISNIKA</h1>
    <div>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Korisnik</th>
                <th>E-pošta</th>
                <th>E-pošta verificirana</th>
                <th>Lozinka</th>
                <th>Datum rođenja</th>
                <th>Akademska razina</th>
                <th>Akademsko zvanje</th>
                <th>Ustrojbena jedinica</th>
            </tr>
            @foreach($korisnici as $korisnik )
                <tr>
                    <td>{{$korisnik -> id}}</td>
                    <td>{{$korisnik -> name}}</td>
                    <td>{{$korisnik -> email}}</td>
                    <td>{{$korisnik -> email_verified_at}}</td>
                    <td>{{$korisnik -> password}}</td>
                    <td>{{$korisnik -> date_of_birth}}</td>
                    <td>{{$korisnik -> academic_degree}}</td>
                    <td>{{$korisnik -> academic_vocation}}</td>
                    <td>{{$korisnik -> organisation_id}}</td>
                    <td>
                        <a href="{{route('korisnici.edit', ['korisnik' => $korisnik])}}">
                            <input type="button" value="Uredi"/>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('korisnici.delete', ['korisnik' => $korisnik])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{route('korisnici.create', ['korisnik' => $korisnik])}}">
                <input type="button" value="Dodaj" style="margin-top: 10px"/>
            </a>
        </div>
    </div>

    <div>
        <br>
        @if(@session('success'))
            <div>
                {{session('success')}}
            </div>
            
        @endsession
    </div>
</body>
</html>