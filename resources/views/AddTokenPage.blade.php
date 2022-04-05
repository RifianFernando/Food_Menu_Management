<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/page.css') }}">
    <title>Add Token</title>
</head>
<body>
    <div class="navbar-container">
        <div class="navbar-left">
          <a href="/userPage">Lana's Western Food</a>
        </div>
          <div class="navbar-right">
              <a href="/userPage">Home</a>
              <a href="#">Add Token</a>
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
<style>
    #Hero1 {
  height: 100vh;
  overflow: hidden;
  background: #d1c413;
  background-repeat: no-repeat;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
}
.hero-container{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(204, 165, 94, 0.5);
    border-radius: 20px;
    width: 50%;
    height: 50%;
    font-family: "Poppins";
    font-weight: bold
}
.token{
    width: 100%;
    height: 50px;
    display: flex;
    align-items: center;
}
.token input{
    height: 30px;
    width: 180px;
    border-radius: 30px
}
.token label{
    display: flex;
    width: 90px;
    height: 25px;
}
.submit{
    width: 100px;
    height: 30px;
    border-radius: 30px;
    background-color: #3b3805;
    color: white;
    font-weight: bold;
    font-family: "Poppins";
    margin-left: 88px;
    margin-top: 20px;
}
</style>
    <section id="Hero1">
        <div class="hero-container">
            <form action="{{ route('ntah') }}" method="POST">
              @csrf
                <div class="token">
                    <label for="token">Token</label>
                    <input type="text" name="token" value="{{ old('token') }}" id="token">
                </div>
                <div class="token">
                    <label for="token">Discount</label>
                    <input type="text" name="discount" value="{{ old('discount') }}" id="token" >
                    <label for="token">%</label>
                </div>
                <button class="submit" type="submit">Submit</button>
            </form>
        </div>
    </section>


</body>
</html>