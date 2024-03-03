@extends('layouts.app')

@section('content')

    <!-- Welcome -->
    <section id="home">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <img src="/storage/image 1.png" alt="Gambar Ilustrasi" class="img-fluid">
                </div>
            <div class="col-md-6">
                <p class="fs-1">Welcome To NARS Cosmetics</p>
                <p class="fs-4">Welcome to our makeup store! We are the perfect place to find high-quality makeup products for all your beauty needs.</p>
            </div>
            </div>
        </div>
    </section>
    <!-- End Welcome -->

    <!-- About -->
    <section id="about" class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4 fs-1 text-center">About Us</h2>
              <p class="fs-5">At our store, we believe that makeup is more than just a cosmetic; it's an art form. That's why we offer a wide range of products from top brands to help you express your unique style and personality.</p>
              <p class="fs-5">Our team of beauty experts is passionate about helping you find the perfect products for your skin type and preferences. Whether you're looking for everyday essentials or glamorous statement pieces, we're here to assist you every step of the way.</p>
            </div>
            <div class="col-md-6">
                <img src="/storage/image 2.png" alt="About Us" class="img-fluid">
              </div>
          </div>
        </div>
      </section>
      <!-- End About -->

      <!-- Best Seller -->
      <section>
        <div class="container">
          <h1 class="my-4">Best Sellers</h1>
          <div class="row">
            <div class="col-md-4">
              <div class="card mb-4 shadow" style="background-color: #F8F0E5">
                <img src="/storage/loose powder.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">NARS Loose Powder</h5>
                  <p class="card-text">16 Hours Oil-Controling & Pore-Blurring</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow" style="background-color: #F8F0E5">
                <img src="/storage/lipstick.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">NARS lipstick</h5>
                  <p class="card-text">Long-lasting & smoothly with a lightweight feel</p>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow" style="background-color: #F8F0E5">
                <img src="/storage/eyeshadow.png" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">NARS Eyeshadow</h5>
                  <p class="card-text">Eyeshadow with Pigmented Color</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End Best Seller -->

  <!-- Footer -->
  <footer class="text-center text-lg-start text-black mt-5" style="background-color: #F8F0E5">
    <div class="container p-4 pb-0">
      <section class="">
        <div class="row">
          <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
            <h3 class="text-uppercase mb-4 font-weight-bold">
              NARS Cosmetics
            </h3>
            <h4>"The secret to your</h4>
            <h4> beauty begins here."</h4>
          </div>
          <hr class="w-100 clearfix d-md-none" />
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Quick Links</h6>
            <p>
              <a href="/" class="text-black">Home</a>
            </p>
            <p>
              <a href="{{ route('index_product') }}" class="text-black">Product</a>
            </p>
            <p>
              <a href="#about" class="text-black">About</a>
            </p>
            <p>
              <a href="#contact" class="text-black">Contact</a>
            </p>
          </div>
          <hr class="w-100 clearfix d-md-none" />
          <hr class="w-100 clearfix d-md-none" />
          <div id="contact" class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
            <p><i class="fas fa-home mr-3"></i> Cornelia Street No. 22</p>
            <p><i class="fas fa-envelope mr-3"></i> nars@gmail.com</p>
            <p><i class="fas fa-phone mr-3"></i> + 62 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 62 234 567 89</p>
          </div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button">
               <i class="fab fa-twitter"></i>
              </a>
            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button">
              <i class="fab fa-instagram"></i>
              </a>
          </div>
        </div>
      </section>

    </div>
    <div class="text-center p-3 text-black" style="background-color: #EADBC8">© 2020 Copyright:
      <a class="text-black" href="/">NARS Cosmetics</a>
    </div>
  </footer>
  <!-- Footer -->

@endsection
