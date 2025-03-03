<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>POPIS KOLEGIJA</h1>
    <div>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Naziv</th>
            </tr>
            @foreach($subjects as $subject )
                <tr>
                    <td>{{$subject -> id}}</td>
                    <td>{{$subject -> subject_name}}</td>
                    <td>
                        <a href="{{route('subjects.edit', ['subject' => $subject])}}">
                            <input type="button" value="Uredi"/>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('subjects.delete', ['subject' => $subject])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{route('subjects.create', ['subject' => $subject])}}">
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