<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>POPIS UČIONICA</h1>
    <div>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Naziv učionice</th>
                <th>Ustrojbena jedinica</th>
            </tr>
            @foreach($classrooms as $classroom )
                <tr>
                    <td>{{$classroom -> id}}</td>
                    <td>{{$classroom -> name}}</td>
                    <td>{{$classroom -> organisation_id ?? 'Nije dodijeljeno.'}}</td>
                    <td>
                        <a href="{{route('classrooms.edit', ['classroom' => $classroom])}}">
                            <input type="button" value="Uredi"/>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('classrooms.delete', ['classroom' => $classroom])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{ route('classrooms.create') }}">
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