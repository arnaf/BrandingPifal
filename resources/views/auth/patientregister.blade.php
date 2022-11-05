<!DOCTYPE html>
<html lang="en">
    @include('layouts.components.head')
    <body>
        <main>
            <div class="container">
                {{-- INGAT! di dalam array tidak boleh ada yang dicomment
                jika route->pakai name si routingnya, jika url tidak perlu, tapi harus dengan (/) --}}
              <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                  <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                      <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                          <img src="assets/img/logo.png" alt="">
                          <span class="d-none d-lg-block">WeFI</span>
                        </a>
                      </div><!-- End Logo -->

                      <div class="card mb-3">

                        <div class="card-body">

                          <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">Daftar akun pasien Ah potek</h5>
                            <p class="text-center small">Aplikasi Apotek - Ah potek</p>
                          </div>

                          <form class="row g-3 needs-validation" novalidate action="{{ route('
                          patientregister') }}" method="POST" >
                            @csrf
                            {{-- <div class="col-12">
                              <label for="yourName" class="form-label">Your Name</label>
                              <input type="text" name="name" class="form-control" id="yourName" required>
                              <div class="invalid-feedback">Please, enter your name!</div>
                            </div> --}}

                            <div class="col-12">
                              <label for="email" class="form-label">Email</label>
                              <input type="email" name="email" class="form-control" id="email" required>
                              <div class="invalid-feedback">Masukkan Email valid!</div>
                            </div>
                            @error('email')
                            <span class="text-danger" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror

                            {{-- <div class="col-12">
                              <label for="yourUsername" class="form-label">Username</label>
                              <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" name="username" class="form-control" id="yourUsername" required>
                                <div class="invalid-feedback">Please choose a username.</div>
                              </div>
                            </div> --}}

                            <div class="col-12">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" name="password" class="form-control" id="password" required>
                              <div class="invalid-feedback">Masukkan password Anda!</div>
                            </div>
                            @error('password')
                            <span class="text-danger" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="col-12">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" id="nama" required>
                                <div class="invalid-feedback">Masukkan nama lengkap Anda!</div>
                            </div>
                            @error('nama')
                            <span class="text-danger" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="col-12">
                                <label for="tgl_lhr" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lhr" class="form-control" id="tgl_lhr" required>
                                <div class="invalid-feedback">Masukkan tanggal lahir Anda!</div>
                            </div>
                            @error('tgl_lhr')
                            <span class="text-danger" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="col-12">
                                <label for="tmp_lhr" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tmp_lhr" class="form-control" id="tmp_lhr" required>
                                <div class="invalid-feedback">Masukkan tempat lahir Anda!</div>
                            </div>
                            @error('tmp_lhr')
                            <span class="text-danger" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" required>
                                <div class="invalid-feedback">Masukkan alamat Anda!</div>
                            </div>
                            @error('alamat')
                            <span class="text-danger" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror

                            <div class="col-12">
                                <label for="pendidikan"> Pendidikan </label>
                                    <select name="pendidikan" id="pendidikan" class="form-control">
                                        <option selected="" disabled>Pilih Pendidikan</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="Kuliah">Kuliah</option>
                                    </select>
                                <div class="invalid-feedback">Masukkan pendidikan Anda saat ini!</div>
                            </div>
                            @error('pendidikan')
                            <span class="text-danger" style="display: block;">
                                {{ $message }}
                            </span>
                            @enderror


                            {{-- <div class="col-12">
                              <div class="form-check">
                                <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                                <div class="invalid-feedback">You must agree before submitting.</div>
                              </div>
                            </div> --}}
                            <div class="col-12">
                              <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                            </div>
                            <div class="col-12">
                              <p class="small mb-0">Sudah menjadi member? <a href="{{ route('loginform') }}">Masuk</a></p>
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

          @include('layouts.components.foot')

    </body>
