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
          <a href="/page">Lana's Western Food</a>
        </div>
          <div class="navbar-right">
              <a href="/page">Home</a>
              <a href="">Menu</a>
              <a href="">Details</a>
              <div class="navbar-login">
              <a href="/login"><img src="{{ asset('img/Button.png') }}" alt=""></a>
          </div>
        </div>
    </div>

    <section id="Hero">
      <div class="hero-container">
      </div>
    </section>

      <div class="navbartype">
          <div class="type-food">
            <a href="#food">Food</a>
            <a href="#drink">Drink</a>
          </div>
            <form class="search" action="" method="GET">
              @csrf
                <input type="text" class="searchTerm" name="" placeholder="What are you looking for?">
                <button type="submit" class="searchButton">
                  <img src="{{ asset('img/searchicon.png') }}">
                  <i class="fa fa-search"></i>
              </button> 
            </form>
      </div>
      <div class="list-food-container">
        <p>Main Course</p>
      </div>

      <section id="list-food"> 
          @foreach ( as )
            
          @endforeach
          <div class="foreach-food">
            <div class="makanan">
              <div class="gambar">
                <img src="{{ asset('img/ayam.png') }}" alt="Food.png">
              </div>
            <div class="makanan1">
              <div class="nama-makanan">
                <p> nasi goreng padang</p>
              </div>
              <div class="harga-makanan">
                <p> Rp5000</p>  
              </div>
              <button type="submit" class="add-button">
                <img src="{{ asset('img/add-button1.png') }}">
              </button>
            </div>
            </div>
          </div>

      </section>
      



    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script href="{{ asset('js/page.js') }}">
</body>
</html>
