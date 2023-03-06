<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <title>Eventos</title>
</head>
<style>
    body{
      font-family: 'Russo One', sans-serif;
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
      height: 100vh;
    }
    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
    .anima{
      transition: 2s;
    }
    .anima:hover{
      transform: perspective(500px) rotateY(20deg);
    }
    .animaeve{
      transition: 4s;
    }
    .animaeve:hover{
      transform: scale(1.1);
    }
    .titulo{
      background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
      background-size: 400% 400%;
      animation: gradient 15s ease infinite;
      color: black;
      border-radius: 5px;
      padding: 10px;
      size: 25px;
    }

</style>
<body class="">
        <!-- Menu-->
          <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top p-4">
            <div class="container-fluid">
              <a class="navbar-brand titulo" href="/eventos">
                EVENTOS
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-center" id="navbar-toggler">
                <ul class="navbar-nav d-flex">
                  <li class="nav-item">
                    <a class="nav-link" href="/eventos">EVENTOS</a>
                  </li>
                </ul>
              </div>
              <ul class="navbar-nav d-flex">
                @auth 
              <li><a class="nav-link scrollto" href="/profile">Perfil</a></li>
              @else
                  <li><a class="nav-link scrollto" href="{{ route('login') }}">Login</a></li>
                  @if (Route::has('register'))
                      <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
                  @endif
              @endauth
              </ul>
            </div>
          </nav>

    <main id="main">

        <section id="main" class="section-bg">
            <div class="container-fluid mt-5">
              {{-- <div class="row justify-content-center ">
                <div class="col-12 mt-3">
                    <div class="row justify-content-around rounded  "> --}}
                      @yield('main')
                    </div>
                  {{-- </div>
              </div>
              
            </div> --}}
        </section>
       
    
      </main><!-- End #main -->
    
      <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 ">
          <!-- Section: Social media -->
          <section class="mb-4">
            <!-- Facebook -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="bi bi-facebook"></i></a>
      
            <!-- Twitter -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="bi bi-twitter"></i></a>
      
            <!-- Google -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="bi bi-google"></i></a>
      
            <!-- Instagram -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="bi bi-instagram"></i></a>
      
            <!-- Linkedin -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="bi bi-linkedin"></i></i
            ></a>
      
            <!-- Github -->
            <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
              ><i class="bi bi-github"></i></a>
          </section>
          <!-- Section: Social media -->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2020 Copyright:
          <a class="text-white" href="">Eventos.com</a>
        </div>
        <!-- Copyright -->
      </footer>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>