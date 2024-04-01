<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{asset('build/assets/css/bootstrap.css')}}" rel="stylesheet">
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
      <!-- En tu layout o plantilla principal -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
      <!-- En tu layout o plantilla principal -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <link href="{{asset('build/assets/css/style.css')}}" rel="stylesheet">


      <!-- Template Stylesheet -->

</head>

<body>


      <nav class="navbar bg-secondary navbar-dark">
            <a href="{{route('dashboard') }}" class="navbar-brand mx-4 mb-3">
                  <h3 class="text-primary"><i class="fa  me-2"><img src="{{asset('build/assets/img/logo.webp')}}" style="max-width: 50px;" alt=""></i>Wallet Wise</h3>
            </a>


            <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                              <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                              </li>
                              <li class="nav-item ml-4">
                                    <a class="nav-link" href="{{ route('register') }}">Sign Up</a>
                              </li>
                        </ul>
                  </div>
            </nav>


      </nav>



      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                  <div class="carousel-item active">
                        <img class="d-block w-100 bg-dark" src="{{asset('build/assets/img/Trading.webp')}}" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                              <h5>Trading</h5>
                              <p>Aprende como comprar acciones y venderlas inteligentemente</p>
                        </div>
                  </div>
                  <div class="carousel-item">
                        <img class="d-block w-100 " src="{{asset('build/assets/img/Criptos.webp')}}" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                              <h5>Criptomonedas</h5>
                              <p>Aprende como funciona el mundo de las Criptomonedas</p>
                        </div>
                  </div>
                  <div class="carousel-item">
                        <img class="d-block w-100 " src="{{asset('build/assets/img/Invertions.webp')}}" alt="...">
                        <div class="carousel-caption d-none d-md-block">

                              <h5>Inversiones Inteligentes</h5>
                              <p>Con wallet wise prodras administrar tus invresiones</p>
                        </div>
                  </div>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
            </a>
      </div>


      <section>

            <div class="container mt-4">
                  <div class="d-flex justify-content-center">
                        <h2>About us</h2>

                  </div>
                  <div class="row  justify-content-center">

                        <div class="col-md-5">
                              <div class="d-flex align-items-center p-3">
                                    <img src="{{asset('build/assets/img/Logo4.webp')}}" alt="">
                              </div>
                        </div>
                        <div class="col-md-5">
                              <div class="p-3 mt-4">
                                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo impedit, esse, veritatis ipsum fugit commodi delectus in expedita iste non incidunt voluptate ipsam sed? Excepturi itaque dolores eos voluptas. Accusamus.</h5>
                              </div>
                        </div>
                  </div>
            </div>
      </section>

      <hr>

      <section>
            <div class="container mt-4">
                  <div class="row  justify-content-center">
                        <div class="col-md-5">
                              <div class="d-flex align-items-center p-3">

                                    <img src="{{asset('build/assets/img/Logo3.webp')}}" alt="">
                              </div>
                        </div>
                        <div class="col-md-5">
                              <div class="p-3 mt-4">
                                    <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo impedit, esse, veritatis ipsum fugit commodi delectus in expedita iste non incidunt voluptate ipsam sed? Excepturi itaque dolores eos voluptas. Accusamus.</h5>
                              </div>
                        </div>
                  </div>
            </div>
      </section>

      <hr>

      <section>
            <div class="d-flex justify-content-center">
                  <h2>Why Choose Wallet Wise</h2>
            </div>

            <div class="d-flex align-items-center justify-content-center">
                  <div class="p-2 m-5">
                        <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center" style="width: 150px; height: 150px;">
                              <i class="fas fa-user fa-6x"></i>
                        </div>
                        <div class="d-flex justify-content-center">
                              <p>Confiabilidad</p>
                        </div>
                  </div>
                  <div class="p-2 m-5">
                        <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center" style="width: 150px; height: 150px;">
                              <i class="fas fa-lock fa-6x"></i>
                        </div>
                        <div class="d-flex justify-content-center">
                              <p>Transaciones seguras</p>
                        </div>
                  </div>
                  <div class="p-2 m-5">
                        <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center" style="width: 150px; height: 150px;">
                              <i class="fas fa-wallet fa-6x"></i>
                        </div>

                        <div class="d-flex justify-content-center">
                              <p>Administra tus Ingresos</p>

                        </div>

                  </div>
            </div>


      </section>

      <footer>
            <div class="bg-secondary">
                  <div class="container">
                        <div class="row ">
                              <div class="col-md-4  mt-5">
                                    <h5>Wallet Wise</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo impedit, esse, veritatis ipsum fugit commodi delectus in expedita iste non incidunt voluptate ipsam sed? Excepturi itaque dolores eos voluptas. Accusamus.</p>
                              </div>
                              <div class="col-md-4  mt-5">
                                    <h5>Links</h5>
                                    <ul>
                                          <li>Home</li>
                                          <li>About us</li>
                                          <li>Services</li>
                                          <li>Contact</li>
                                    </ul>
                              </div>
                              <div class="col-md-4  mt-5">
                                    <h5>Contact</h5>
                                    <ul>
                                          <li>Phone: 123456789</li>
                                          <li>Email:

      </footer>

</body>

</html>