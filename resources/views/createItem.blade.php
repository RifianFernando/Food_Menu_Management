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
          </div>
        </div>
      </nav>


    <h1 class="judul">Create Item</h1>
      <form class="form" action="{{ route('create')}}"  method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="file" class="form-label">Gambar</label>
            <input name= "file" type="file" class="form-control" id="file" placeholder="Upload Image">
        </div>

            @error('file')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <div class="mb-3">
            <label for="namaMenu" class="form-label">Nama Menu</label>
            <input name="namaMenu" type="text" class="form-control" id="namaMenu" value="{{ old('namaMenu') }}" placeholder="Masukkan Nama Menu">
        </div>

            @error('namaMenu')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror


        <div class="mb-3">
            <label for="kategoriMenu" class="form-label">Kategori Menu</label>
            <input name= "kategoriMenu" type="text" class="form-control" id="kategoriMenu" value="{{ old('kategoriMenu') }}" placeholder="Masukkan Kategori Menu">
        </div>

            @error('kategoriMenu')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <div class="mb-3">
            <label for="deskripsiMenu" class="form-label">Deskripsi Menu</label>
            <input name= "deskripsiMenu" type="text" class="form-control" id="deskripsiMenu" value="{{ old('deskripsiMenu') }}" placeholder="Masukkan Deskripsi Menu">
        </div>

            @error('deskripsiMenu')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <div class="mb-3">
            <label for="hargaMenu" class="form-label">Page</label>
            <input name= "hargaMenu" type="numeric" class="form-control" id="hargaMenu" value="{{ old('hargaMenu') }}" placeholder="Rp">
        </div>

            @error('hargaMenu')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <button type="submit" class="btn btn-success">Create</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
