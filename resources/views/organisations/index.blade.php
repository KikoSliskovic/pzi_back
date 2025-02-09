<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>POPIS ORGANIZACIJSKIH JEDINICA</h1>
    <div>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>Naziv</th>
            </tr>
            @foreach($organisations as $organisation )
                <tr>
                    <td>{{$organisation -> id}}</td>
                    <td>{{$organisation -> name}}</td>
                    <td>
                        <form method="post" action="{{route('organisations.delete', ['organisation' => $organisation])}}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <div>
            <a href="{{route('organisations.create', ['organisation' => $organisation])}}">
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