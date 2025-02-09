<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Uređivanje postojeće učionice u Bazi podataka</h1>
    <form method="post" action="{{route('subjects.update', ['subject' => $subject])}}">
        @csrf
        @method('put')
        <div>
            <label>Naziv kolegija: </label>
            <input type="text" name="subject_name" placeholder="Matematika 1" value="{{$subject->subject_name}}"/>
        </div>
        <div>
            <input type="submit" value="Potvrdi" />

            <a href="{{route('subjects.index')}}">
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