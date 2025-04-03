<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name" name="name">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Class</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="class" name="class">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">File</label>
            <input type="file" class="form-control" id="exampleFormControlInput1" placeholder="file" name="file">
          </div>

          <button class="btn btn-primary" type="submit">Submit</button>
    </form>

    @forelse ($network as $n)
    <div class="card" style="width: 18rem;">
        @if (pathinfo($n->file, PATHINFO_EXTENSION) == 'pdf')
        <embed src="{{asset('storage/'.$n->file)}}" type="application/pdf">
        @else
        <img src="{{asset('storage/'.$n->file)}}" class="card-img-top" alt="...">
        @endif
        <div class="card-body">
          <h5 class="card-title">{{$n->name}}</h5>
          <p class="card-text">{{$n->class}}</p>
          <form action="{{route('delete', $n->id)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          <form action="{{route('download', $n->id)}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Download</button>
          </form>
          <a href="{{'storage/' .$n->file}}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    @empty
        <p>Empty</p>
    @endforelse
</body>
</html>
