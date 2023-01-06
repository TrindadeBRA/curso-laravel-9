<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <main class="container">
        <h1>Edit</h1>

        <form method="POST" action="{{route('user.update', $user->id )}}">
          @method('PUT')
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" value="{{$user->name}}" class="form-control" name="name" id="name">
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" value="{{$user->email}}" class="form-control" name="email" id="email">
          </div>
          
          <div class="mb-3">
            <label for="password" class="form-label">E-mail</label>
            <input type="password" value="{{$user->password}}" class="form-control" name="password" id="password">
          </div>

          <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
        
    </main>
  </body>
</html>