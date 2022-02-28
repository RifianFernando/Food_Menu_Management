<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Menu Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Food Menu Management</a>
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

            <div class="search">
                <form action="{{url('/cari')}}" method="GET" >
                    <input class="form-control me-2" type="text" placeholder="Search" name="cari" aria-label="Search" value="{{ old('cari') }}">
                </form>
            </div>

          </div>
        </div>
      </nav>

     User Page

     <h1 class="judul">View Item</h1>
     <table class="table table-dark table-striped" id="tabel">
         <thead>
           <tr>
             <th scope="col">id</th>
             <th scope="col">Gambar</th>
             <th scope="col">Nama Menu</th>
             <th scope="col">Kategori Menu</th>
             <th scope="col">Deskripsi Menu</th>
             <th scope="col">Harga Menu</th>
           </tr>
         </thead>
         <tbody>
             @foreach ($admins as $admin)
                 <tr>
                 <th scope="row">{{ $admin->id }}</th>
                 <td><img width="300px" src="{{ asset('storage/'.$admin->file) }}"></td>
                 <td>{{ $admin->namaMenu }}</td>
                 <td>{{ $admin->kategoriMenu }}</td>
                 <td>{{ $admin->deskripsiMenu }}</td>
                 <td>{{ $admin->hargaMenu }}</td>
                 </tr>
             @endforeach
         </tbody>
       </table>

       <button type="submit" class="btn btn-primary">+Add To Cart - blom jadi</button>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
