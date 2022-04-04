<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Food Menu Management</title>

    <link rel="stylesheet" href="{{ asset('css/update.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="judul">Edit Menu</h1>

        <form class="form" action="{{ route('update', ['id' => $admins->id])}}"  method="POST" enctype="multipart/form-data">
          @csrf
          @method('patch')



          <div class="content">
              <label for="namaMenu" class="nama-form">Nama Makanan</label>
              <input name="namaMenu" type="text" class="form-control"  id="namaMenu" value="{{ $admins->namaMenu}}" placeholder="Masukkan Nama Menu">
          </div>

              @error('namaMenu')
                  <div class="alert alert-danger">{{$message}}</div>
              @enderror


              <div class="content">
                  <label for="kategoriMenu" class="form-label">Jenis</label>
                  <select name="kategoriMenu" id="kategoriMenu" class="form-control" required>
                      <option value="">Select</option>
                      <option value="Makanan">Makanan</option>
                      <option value="Minuman">Minuman</option>
                  </select>
              </div>

                  @error('kategoriMenu')
                      <div class="alert alert-danger">{{$message}}</div>
                  @enderror



          <div class="content">
              <label for="hargaMenu" class="form-label">Harga</label>
              <input name= "hargaMenu" type="numeric" class="form-control" id="hargaMenu" value="{{ $admins->hargaMenu }}" placeholder="Rp">
          </div>

              @error('hargaMenu')
                  <div class="alert alert-danger">{{$message}}</div>
              @enderror

              <div class="content-file">
                <label for="file" class="form-label">Foto</label>
                <input name= "file" type="file" class="form-control" value="{{$admins->file}}" id="file" placeholder="Upload Image">
            </div>

                @error('file')
                    <div class="alert alert-danger">{{$message}}</div>
                @enderror

                <div class="content-deskripsi">
                    <label for="deskripsiMenu" class="form-deskripsi">Deskripsi</label>
                    <textarea name= "deskripsiMenu" class="form-deskripsi" id="deskripsiMenu" cols="20" rows="3" value="{{$admins->deskripsiMenu}}" placeholder="Masukkan Deskripsi Menu" required></textarea>

                </div>

                    @error('deskripsiMenu')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror

          <button type="submit" class="btnsave">Save</button>
      </form>
    </div>



</body>
</html>
