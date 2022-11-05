<!DOCTYPE html>
<html lang="en">
    @include('layouts.components.head')
<body>
    <main>
        <div class="container">

          <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                  <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                      <img src="assets/img/logo.png" alt="">
                      <span class="d-none d-lg-block">Ah potek</span>
                    </a>
                  </div><!-- End Logo -->

                  <div class="card mb-3">

                    <div class="card-body">

                      <div class="pt-4 pb-2">
                        <h5 class="card-title text-center pb-0 fs-4">Masuk ke akun Anda</h5>
                        <p class="text-center small">We Find Insightness</p>
                      </div>


                      @error('error')
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Email/password salah!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          {{-- <strong>{{ $message }}</strong> --}}
                      </div>
                      @enderror

                      <form class="row g-3 needs-validation" novalidate action="{{ route('login') }}" method="POST">
                        @csrf
                        {{-- <div class="col-12">
                          <label for="yourUsername" class="form-label">Username</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input type="text" name="username" class="form-control" id="yourUsername" required>
                            <div class="invalid-feedback">Please enter your username.</div>
                          </div>
                        </div> --}}

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">Masukkan Email Anda.</div>
                        </div>
                        {{-- @error('email')
                        <span class="text-danger" style="display: block;">
                            {{ $message }}
                        </span>
                        @enderror --}}


                        <div class="col-12">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="password" required>
                          <div class="invalid-feedback">Masukkan Password Anda.</div>
                        </div>

                        {{-- @error('password')
                        <span class="text-danger" style="display: block;">
                            {{ $message }}
                        </span>
                        @enderror --}}


                        {{-- <div class="col-12">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                          </div>
                        </div> --}}
                        <div class="col-12">
                          <button class="btn btn-primary w-100" type="submit">Masuk</button>
                        </div>
                        <div class="col-12">
                          {{-- <p class="small mb-0">Belum terdaftar sebagai member? <a href="{{ route('registerform') }}">Daftar sekarang</a></p> --}}
                        </div>
                      </form>

                    </div>
                  </div>

                  {{-- <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                  </div> --}}

                </div>
              </div>
            </div>

          </section>

        </div>
      </main>

      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

       <!-- Vendor JS Files -->
       @include('layouts.components.foot')

</body>
</html>
