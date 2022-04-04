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

    {{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('userPage') }}">Food Menu Management</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/admin">Dashboard</a>
              </li>

              <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                   Log Out
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Click') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
          </div>
        </div>
      </nav> --}}

      <div class="navbar-container">
        <div class="navbar-left">
          <a href="/userPage">Lana's Western Food</a>
        </div>
          <div class="navbar-right">
              <a href="/userPage">Home</a>
              <a href="">Menu</a>
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
    <br><br><br><br><br>

    <table class="table table-dark table-striped" id="tabel">
        <thead>
          <tr>
            <th scope="col">id</th>
            {{-- <th scope="col">Gambar</th> --}}
            <th scope="col">Nama</th>
            <th scope="col">Jenis</th>
            {{-- <th scope="col">Deskripsi Menu</th> --}}
            <th scope="col">Harga</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                <th scope="row">{{ $admin->id }}</th>
                {{-- <td><img width="300px" src="{{ asset('storage/'.$admin->file) }}"></td> --}}
                <td>{{ $admin->namaMenu }}</td>
                <td>{{ $admin->kategoriMenu }}</td>
                {{-- <td>{{ $admin->deskripsiMenu }}</td> --}}
                <td>{{ $admin->hargaMenu }}</td>
                <td>
                    <a href="{{route('updateItem', ['id'=>$admin->id])}}"><button type="submit" class="btn btn-primary">Update</button></a>

                    <form action="{{route('delete', ['id' => $admin->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>

                </tr>
            @endforeach
        </tbody>
      </table>


    <form action="{{route('createItem')}}">
        @csrf
        <button type="submit" class="btn btn-primary">+Add New</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
