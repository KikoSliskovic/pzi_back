<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>POPIS PREDAVANJA</h1>
    <div>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Predmet</th>
                <th>Učionica</th>
                <th>Profesor</th>
                <th>Student</th>
                <th>QR-code</th>
                <th>Datum</th>
                <th>Prisutnost</th>
            </tr>
            @foreach($lectures as $lecture )
                <tr>
                    <td>{{$lecture -> id}}</td>
                    <td>{{$lecture->subject->name ?? 'Nema predmeta'}}</td>
                    <td>{{$lecture->classroom->name ?? 'Nema ucionice'}}</td>
                    <td>{{$lecture->professor_id ?? 'Nema profesora'}}</td>
                    <td>{{$lecture->user->name ?? 'Nema imena'}}</td>
                    <td>{{$lecture->qr_code->qr_code ?? 'Nema QR-koda'}}</td>
                    <td>{{$lecture -> date}}</td>
                    <td>{{$lecture -> attendance}}</td>
                    
                    <td>
                        <form method="post" action="{{route('lectures.delete', ['lecture' => $lecture])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{route('lectures.create', ['lecture' => $lecture])}}">
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