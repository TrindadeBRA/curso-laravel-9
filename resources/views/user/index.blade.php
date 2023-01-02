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
        <h1>Index</h1>

        <a type="button" href="{{route('user.create')}}" class="btn btn-primary my-4">CRIAR USUÁRIO</a>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nome</th>
              <th scope="col">Email</th>
              <th scope="col">Ver</th>
              <th scope="col">Editar</th>
              <th scope="col">Deletar</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td><a type="button" href="{{route('user.show', $user->id)}}" class="btn btn-success">VER</a></td>
                    <td><a type="button" href="{{route('user.edit', $user->id)}}" class="btn btn-warning">EDITAR</a></td>
                    <td>
                      <form action="{{route('user.destroy', $user->id )}}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" href="{{route('user.destroy', $user->id)}}" class="btn btn-danger">DELETAR</button>
                      </form>
                    </td>
                </tr>
            @endforeach
          </tbody>
        </table>
    </main>
  </body>
</html>