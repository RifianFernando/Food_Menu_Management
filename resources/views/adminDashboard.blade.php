<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Menu Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
</head>
<body>

      <div class="navbar-container">
        <div class="navbar-left">
          <a href="/userPage">Lana's Western Food</a>
        </div>
          <div class="navbar-right">
              <a href="/userPage">Home</a>
              <a href="{{ route('PAGES') }}">Add Token</a>
              @if(Auth::user()->username == 'admin')
                <a href="{{ route('adminDashboard') }}">Admin Panel</a>
              @else
                <a href="/userPage">Detail</a>
              @endif
                @if(Route::has('login'))
                    @auth
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <div class="navbar-login">
                        <button class="navbar-button">
                          <img src="{{ asset('img/Logout.png') }}" alt="">
                        </button>
                      </div>
                    </form>
                    @else
                      <div class="navbar-login">
                        <a href="/login"><img src="{{ asset('img/ButtonLogin.png') }}" alt=""></a>
                      </div>
                    @endif

                  @endauth


        </div>
    </div>

    <h1>Admin Dashboard</h1>
    <hr style="border: 1px solid black">

    <table class="table table-white table-striped" id="tabel">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis</th>
            <th scope="col">Deskripsi Menu</th>
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                <th scope="row">{{ $admin->id }}</th>
                <td><img width="300px" src="{{ asset('storage/'.$admin->file) }}" style="border-radius: 30px"></td>
                <td>{{ $admin->namaMenu }}</td>
                <td>{{ $admin->kategoriMenu }}</td>
                <td>{{ $admin->deskripsiMenu }}</td>
                <td>{{ $admin->hargaMenu }}</td>
                <td>
                    <div class="btnaction">
                        <a href="{{route('updateItem', ['id'=>$admin->id])}}"><button type="submit" class="btn btn-primary">Edit</button></a>

                        <form action="{{route('delete', ['id' => $admin->id])}}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>

                </tr>
            @endforeach
        </tbody>
      </table>


    <form action="{{route('createItem')}}" class="btnadd">
        @csrf
        <button type="submit" class="btn">Add Menu</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
