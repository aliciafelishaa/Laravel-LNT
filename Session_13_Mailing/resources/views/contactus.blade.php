<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('contactme')}}" method="post">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="email" name="email" placeholder="email">
        <input type="text" name="subj" placeholder="subject">
        <input type="text" name="contactMessage" placeholder="message">
        <button type="submit">Submit</button>
    </form>
</body>
</html>
