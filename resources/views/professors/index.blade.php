<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>POPIS PROFESORA</h1>
    <div>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>E-pošta</th>
            </tr>
            @foreach($professors as $professor )
                <tr>
                    <td>{{$professor -> id}}</td>
                    <td>{{$professor -> name}}</td>
                    <td>{{$professor -> email}}</td>
                    <td>
                        <a href="{{route('professors.edit', ['professor' => $professor])}}">
                            <input type="button" value="Uredi"/>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="{{route('professors.delete', ['professor' => $professor])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{route('professors.create', ['professor' => $professor])}}">
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