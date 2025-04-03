<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{asset('style.css')}}">
</head>
<body>
    <h1>This is heading 1 </h1>
    <h2>This is heading 2</h2>
    <h3>This is heading 3</h3>
    <h4>This is heading 4</h4>
    <h5>This is heading 5</h5>
    <h6>This is heading 6</h6>

    <img src="{{asset('Latihan Soal.JPG')}}" alt="This is image">


    <form action="">
        <label for="" class="font-username">Username</label>
        <input type="text">
        <br>
        <label for="">Date</label>
        <input type="date">
        <br>
        <label for="">Age</label>
        <input type="number">
        <br>
        <label for="">Picture</label>
        <input type="file">
        <br>
        <label for="">I have read the terms</label>
        <input type="checkbox">

        <br>
        <button type="submit">This is button</button>
    </form>
</body>
</html>
