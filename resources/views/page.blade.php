<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <title>Lana's Western Food</title>
</head>
<body>
    <div class="navbar-container">
        <div class="navbar-left">
          <a href="/userPage">Lana's Western Food</a>
        </div>
          <div class="navbar-right">
              <a href="/userPage">Home</a>
              <a href="#list-food-container">Menu</a>
              @if(Auth::user()->username == 'admin')
                <a href="{{ route('adminDashboard') }}">Admin Panel</a>
              {{-- @else --}}
                {{-- <a href="/userPage">Detail</a> --}}
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

    <section id="Hero">
      <div class="hero-container">
      </div>
    </section>

      <div class="navbartype">
          <div class="type-food">
              <a class="type-food-active" href="{{ route('filter', ['kategori' => "Makanan"]) }}">Food</a>
              <a class="type-drink-nonactive" href="{{ route('filter', ['kategori' => "Minuman"]) }}">Drink</a>
          </div>
            <form class="search" action="{{url('/cari')}}" method="GET">
              @csrf
                <input type="text" class="searchTerm" name="cari" placeholder="What are you looking for?">
                <button type="submit" class="searchButton">
                  <img  src="{{ asset('img/searchicon.png') }}">
                  <i class="fa fa-search"></i>
              </button>
            </form>
      </div>
      <div class="list-food-container" id="list-food-container">
        <p><a href="{{ route('userPage') }}" class="main-coursehref">Main Course</a></p>
      </div>

      @if($total == 0)
        <div id="no-food"class="list-nofood">
          <p>Tidak ada Menu yang tersedia</p>
        </div>

      @else
    <section id="list-food">
    @foreach ($admins as $admin)

            <div class="foreach-food">
              <div class="makanan">
                <div class="gambar">
                  <img src="{{ asset('storage/'.$admin->file) }}" alt="Food.png">
                </div>
              <div class="makanan1">
                <div class="nama-makanan">
                  <p> {{ $admin->namaMenu }}</p>
                </div>
                <div class="harga-makanan">
                  <p> Rp{{ $admin->hargaMenu }}</p>
                </div>
                <button type="button" onclick="myFunction()" id="myBtn" class="add-button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $admin->id }}">
                  <img src="{{ asset('img/add-button1.png') }}">
                </button>
              </div>
              </div>
            </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $admin->id }}" tabindex="-1"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">

                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="isi-cart">
                            <button type="button" onclick="myFunction()"class="btn" id="closing" data-bs-dismiss="modal"><span class="close">&times;</span></button>
                              <div class="img-modal">
                                <div class="img-css">
                                  <img src="{{ asset('storage/'.$admin->file) }}" alt="">
                                </div>
                              </div>
                              <br>
                              <div class="nama-makanan-modal">
                                <p>{{ $admin->namaMenu }}</p>
                              </div>
                              <div class="deskripsi-makanan-modal">
                                <p>{{$admin->deskripsiMenu}}</p>
                              </div>
                              <div class="harga-makanan-modal">
                                <p>Rp.{{ $admin->hargaMenu }}</p>
                                <form action="{{ route('addToCart', ['id'=>$admin->id]) }}" method="post">
                                  @csrf
                                    <button type="submit" id="noob" class="add-button-modal">
                                      <img src="{{ asset('img/add-button1.png') }}">
                                    </button>
                                </form>

                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
          @endforeach
          @endif
        </section>


      <div class="footer">
        <button type="button" id="button_cart" class="button-cart" data-toggle="modal" data-target="#exampleModalIn" style="background: url({{ asset('img/button-cart.png') }})">c</button>
      </div>

        <!-- Modal -->
        <div class="modal-container" id="modal_container">
          <div class="modal-cart">
                  <button id="close_cart">X</button>
                  <div class="judul">
                    <p>Shopping Cart</p>
                  </div>
                  <div class="area-cart">
                    @php
                      $subtotal = 0;
                    @endphp
                    @if(empty($cart) || empty($kuantitas))
                      <div class="empty-cart">
                        <p>Your cart is empty</p>
                      </div>
                    @else
                    @for($i=0; $i < count($cart); $i++)
                      <div class="isi-seluruh-cart">
                        <div class="gambar-makanan">
                          <img src="{{ asset('storage/'.$cart[$i]->file) }}" alt="">
                        </div>
                        <div class="judul-dan-harga">
                          <div class="judul-makanan">
                            <p>{{ $cart[$i]->namaMenu }}</p>
                          </div>
                          <div class="harga">
                            Rp.{{ $cart[$i]->hargaMenu }}
                            @php
                              $subtotal += $cart[$i]->hargaMenu * $kuantitas[$i];
                              
                            @endphp
                          </div>
                        </div>

                        <div class="jumlah-kurang">
                            <form action="{{ route('addToCart', ['id'=>$cart[$i]->id]) }}" method="post">
                            @csrf
                              <button type="submit" class="tanda-tambah">
                                +
                              </button>
                            </form>
                          <div class="box-jumlah">
                            <p>{{ $kuantitas[$i] }}</p>
                          </div>
                          <form action="{{route('Increment', ['id'=>$cart[$i]->id])}}" method="POST">
                            @csrf
                              <button type="submit" class="tanda-tambah">
                                -
                              </button>
                          </form>
                        </div>
                    </div>
                    @endfor
                    @endif
              </div>
              <form class="redeem-and-summary" action="{{ route('checkToken') }}" method="POST">
                @csrf
                <input type="text" class="redeem" name="redeem"  placeholder="@if($errors->any())
                {{$errors->first()}} @else Enter Promotional Code
                  @endif"class="form-control @error('redeem') is-invalid @enderror" >
                <button type="submit" class="button-checkout">Redeem</button>
              </form>
              <div class="garis-batas">
              </div>
              <div class="Summary">
                <div class="title-summary">
                  <p>Summary</p>
                </div>
                <div class="subtotal">
                    <div class="total">
                      <p>Subtotal</p>
                    </div>
                    <div class="harga-subtotal">
                      <p>Rp.{{ $subtotal }}</p>
                    </div>
                </div>
                <div class="charge">
                    <div class="total">
                      @php
                        $charge = 0.10 * $subtotal;
                      @endphp
                      <p>Service Charge (10%)</p>
                    </div>
                    <div class="harga-subtotal">
                      <p>Rp.{{$charge}}</p>
                    </div>
                </div>
                <div class="total-summary">
                    <div class="total">
                      @php
                        $totalharga = $subtotal + $charge;
                      @endphp
                      <p>Total price</p>
                    </div>

                    <div class="harga-subtotal">
                      <p>Rp.{{ $totalharga }}</p>
                    </div>  
                </div>
              </div>

          </div>
        </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="{{ asset('js/page.js')}}"></script>


</body>
</html>
