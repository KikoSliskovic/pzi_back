<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Dodavanje novog profesora u Bazu podataka</h1>
    <form method="post" action="{{route('professors.store')}}">
        @csrf
        @method('post')
        <div>
            <label>Naziv profesora: </label>
            <input type="name" name="name" required placeholder="Puni naziv profesora" />
        </div>
        <div>
            <label>E-pošta profesora: </label>
            <input type="email" name="email" required placeholder="ime.prezime@fakultet.drzava" />
        </div>
        <div>
            <input type="submit" value="Spremi" />
        
            <a href="{{route('professors.index')}}">
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