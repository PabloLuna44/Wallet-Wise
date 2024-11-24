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


      <nav class="navbar navbar-expand-lg navbar-dark bg-secodary shadow ">
            <div class="container">
                  <!-- Brand Logo and Name -->
                  <a href="{{ route('dashboard') }}" class="navbar-brand d-flex align-items-center">
                        <img src="{{ asset('build/assets/img/logo.webp') }}" alt="Wallet Wise Logo" style="width: 40px; height: 40px;" class="me-2">
                        <h4 class="mb-0 text-light">Wallet Wise</h4>
                  </a>
                  <!-- Toggler for Mobile View -->
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                  </button>
                  <!-- Navigation Links -->
                  <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ms-auto">
                              <li class="nav-item">
                                    <a class="nav-link text-light" href="#"><i class="fas fa-info-circle me-2"></i>About Us</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link text-light" href="#"><i class="fas fa-concierge-bell me-2"></i>Services</a>
                              </li>
                              <li class="nav-item">
                                    <a class="nav-link text-light" href="#"><i class="fas fa-envelope me-2"></i>Contact</a>
                              </li>
                              <li class="nav-item">
                                    <a class="btn btn-primary px-4 py-2 me-2" href="{{ route('login') }}"><i class="fas fa-sign-in-alt me-2"></i>Login</a>
                              </li>
                              <li class="nav-item">
                                    <a class="btn btn-outline-light px-4 py-2" href="{{ route('register') }}"><i class="fas fa-user-plus me-2"></i>Sign Up</a>
                              </li>
                        </ul>
                  </div>
            </div>
      </nav>



      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                  <div class="carousel-item active">
                        <img class="d-block w-100 fixed-size" src="{{asset('build/assets/img/Trading.webp')}}" alt="Trading">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                              <h5>Trading</h5>
                              <p>Learn how to buy and sell stocks intelligently</p>
                        </div>
                  </div>
                  <div class="carousel-item">
                        <img class="d-block w-100 fixed-size" src="{{asset('build/assets/img/Criptos.webp')}}" alt="Cryptocurrencies">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                              <h5>Cryptocurrencies</h5>
                              <p>Learn how the world of cryptocurrencies works</p>
                        </div>
                  </div>
                  <div class="carousel-item">
                        <img class="d-block w-100 fixed-size" src="{{asset('build/assets/img/Invertions.webp')}}" alt="Smart Investments">
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                              <h5>Smart Investments</h5>
                              <p>Manage your investments with Wallet Wise</p>
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

      <section class="py-5">
            <div class="container">
                  <div class="text-center mb-5">
                        <h2>Why Choose Wallet Wise</h2>
                  </div>
                  <div class="row text-center">
                        <div class="col-md-4 mb-4">
                              <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center mx-auto" style="width: 150px; height: 150px;">
                                    <i class="fas fa-user fa-6x text-white"></i>
                              </div>
                              <h5 class="mt-3">Reliability</h5>
                              <p>Trustworthy and dependable services for all your financial needs.</p>
                        </div>
                        <div class="col-md-4 mb-4">
                              <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center mx-auto" style="width: 150px; height: 150px;">
                                    <i class="fas fa-lock fa-6x text-white"></i>
                              </div>
                              <h5 class="mt-3">Secure Transactions</h5>
                              <p>Ensuring your transactions are safe and secure at all times.</p>
                        </div>
                        <div class="col-md-4 mb-4">
                              <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center mx-auto" style="width: 150px; height: 150px;">
                                    <i class="fas fa-wallet fa-6x text-white"></i>
                              </div>
                              <h5 class="mt-3">Manage Your Income</h5>
                              <p>Efficient tools to help you manage and grow your income.</p>
                        </div>
                  </div>
            </div>
      </section>

      <footer class="bg-secondary text-white py-5">
            <div class="container">
                  <div class="row">
                        <div class="col-md-4 mt-3">
                              <h5>Wallet Wise</h5>
                              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo impedit, esse, veritatis ipsum fugit commodi delectus in expedita iste non incidunt voluptate ipsam sed? Excepturi itaque dolores eos voluptas. Accusamus.</p>
                        </div>
                        <div class="col-md-4 mt-3">
                              <h5>Links</h5>
                              <ul class="list-unstyled">
                                    <li><a href="#" class="text-white">Home</a></li>
                                    <li><a href="#" class="text-white">About Us</a></li>
                                    <li><a href="#" class="text-white">Services</a></li>
                                    <li><a href="#" class="text-white">Contact</a></li>
                              </ul>
                        </div>
                        <div class="col-md-4 mt-3">
                              <h5>Contact</h5>
                              <ul class="list-unstyled">
                                    <li>Phone: 123456789</li>
                                    <li>Email: info@walletwise.com</li>
                              </ul>
                              <h5>Follow Us</h5>
                              <ul class="list-inline">
                                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a></li>
                              </ul>
                        </div>
                  </div>
                  <div class="row mt-4">
                        <div class="col text-center">
                              <p>&copy; {{date('Y')}} Wallet Wise. All Rights Reserved.</p>
                        </div>
                  </div>
            </div>
      </footer>

</body>

</html>