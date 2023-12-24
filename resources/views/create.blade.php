<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <form action="{{ route('create.api') }}" method="POST">
      @csrf
      
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Judul</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Konten</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="konten">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Kategori</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="kategori">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">User ID</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_id" value="1">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>