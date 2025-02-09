<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dodavanje novog korisnika u Bazu podataka</h1>
    <form method="post" action="{{route('organisations.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Name: </label>
            <input type="name" name="name" placeholder="KRATICA - Puni naziv ustrojbene jedinice" />
        </div>
        <div>
            <input type="submit" value="Spremi" />
        
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