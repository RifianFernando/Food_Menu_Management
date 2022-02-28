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

    <h1 class="judul">Update Item</h1>
      <form class="form" action="{{ route('update', ['id' => $admins->id])}}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="file" class="form-label">Gambar</label>
            <input name= "file" type="file" class="form-control" value="{{$admins->file}}" id="file" placeholder="Upload Image">
        </div>

            @error('file')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <div class="mb-3">
            <label for="namaMenu" class="form-label">Nama Menu</label>
            <input name="namaMenu" type="text" class="form-control"  id="namaMenu" value="{{ $admins->namaMenu}}" placeholder="Masukkan Nama Menu">
        </div>

            @error('namaMenu')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror


        <div class="mb-3">
            <label for="kategoriMenu" class="form-label">Kategori Menu</label>
            <input name= "kategoriMenu" type="text" class="form-control" id="kategoriMenu" value="{{ $admins->kategoriMenu }}" placeholder="Masukkan Kategori Menu">
        </div>

            @error('kategoriMenu')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <div class="mb-3">
            <label for="deskripsiMenu" class="form-label">Deskripsi Menu</label>
            <input name= "deskripsiMenu" type="text" class="form-control" id="deskripsiMenu" value="{{$admins->deskripsiMenu}}" placeholder="Masukkan Deskripsi Menu">
        </div>

            @error('deskripsiMenu')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <div class="mb-3">
            <label for="hargaMenu" class="form-label">Page</label>
            <input name= "hargaMenu" type="numeric" class="form-control" id="hargaMenu" value="{{ $admins->hargaMenu }}" placeholder="Rp">
        </div>

            @error('hargaMenu')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror

        <button type="submit" class="btn btn-success">Update</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
