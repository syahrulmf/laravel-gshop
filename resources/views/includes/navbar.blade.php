<!-- navbar -->
<div class="container">
  <nav class="row navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ url('frontend/images/logo.png')  }}"/>
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu -->
    <div class="collapse navbar-collapse" id="navb">
      <ul class="navbar-nav mx-auto mr-3">
        <li class="nav-item mx-md-2">
          <a class="nav-link active" href="{{ route('home') }}">HOME</a>
        </li>
        <li class="nav-item mx-md-2">
          <a class="nav-link" href="#">PRODUCT</a>
        </li>
        <li class="nav-item mx-md-2">
          <a class="nav-link" href="#">ABOUT</a>
        </li>
      </ul>

      <a class="nav-link cart-link" href="#"><i class="fas fa-shopping-cart"></i> My Cart (<span>0</span>)</a>

      @guest
        <!-- Mobile button -->
        <form class="form-inline d-sm-block d-md-none">
          <button class="btn btn-login my-2 my-sm-0" onclick="event.preventDefault(); location.href='{{ url('login') }}';">
            Login
          </button>
        </form>
        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block">
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" onclick="event.preventDefault(); location.href='{{ url('/admin') }}';">
            Login
          </button>
        </form>
      @endguest

      @auth
        <!-- Mobile button -->
        <form class="form-inline d-sm-block d-md-none" action="{{ url('logout') }}" method="POST">
          @csrf
          <button class="btn btn-login my-2 my-sm-0" type="submit">
            Logout
          </button>
        </form>
        <!-- Desktop Button -->
        <form class="form-inline my-2 my-lg-0 d-none d-md-block" action="{{ url('logout') }}" method="POST">
          @csrf
          <button class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4" type="submit">
            Logout
          </button>
        </form>
      @endauth


    </div>
  </nav>
</div>
