<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Uređivanje postojeće učionice u Bazi podataka</h1>
    <form method="post" action="{{route('professors.update', ['professor' => $professor])}}">
        @csrf
        @method('put')
        <div>
            <label>Naziv profesora: </label>
            <input type="text" name="name" required placeholder="Matematika 1" value="{{$professor->name}}"/>
        </div>
        <div>
            <label>E-pošta profesora: </label>
            <input type="email" name="email" required placeholder="ime.prezime@fakultet.drzava" value="{{$professor->email}}"/>
        </div>
        <div>
            <input type="submit" value="Potvrdi" />

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
    </div></body>
</html>