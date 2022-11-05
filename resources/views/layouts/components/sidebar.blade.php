<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

           <!-- End Components Nav -->


      @can('daftar')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/pendaftaran') }}">
          <i class="bi bi-journal-text"></i><span>Pendaftaran Bimbel</span>
        </a>
      </li><!-- End Forms Nav -->
      @endcan




      @can('tagihans')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/tagihan') }}">
          <i class="bi bi-credit-card"></i><span>Tagihan</span>
        </a>
      </li><!-- End Tables Nav -->
      @endcan

      @can('tagihansaya')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('tagihansaya', Auth::user()->id) }}">
          <i class="bi bi-credit-card"></i><span>Tagihan Saya</span>
        </a>
      </li><!-- End Tables Nav -->
      @endcan


      @can('history')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clock-history"></i><span>Riwayat Pembayaran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a href="{{ url('/success') }}">
                  <i class="bi bi-circle"></i><span>Berhasil</span>
                </a>
            </li>
          <li>
            <a href="{{ url('/fail') }}">
              <i class="bi bi-circle"></i><span>Gagal</span>
            </a>
          </li>
        </ul>
      </li>
      @endcan




      @can('myhistory')
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clock-history"></i><span>Riwayat Pembayaran Saya</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a href="{{ route('mysuccess', Auth::user()->id) }}">
                  <i class="bi bi-circle"></i><span>Berhasil</span>
                </a>
            </li>
          <li>
            <a href="{{ route('myfail', Auth::user()->id) }}">
              <i class="bi bi-circle"></i><span>Gagal</span>
            </a>
          </li>
        </ul>
      </li>
      @endcan

      <!-- End Charts Nav -->

           <!-- End Icons Nav -->

        @can('datamt')
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journals"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('/user') }}">
                      <i class="bi bi-circle"></i><span>Member</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('/kategori') }}">
                      <i class="bi bi-circle"></i><span>Kategori Kelas</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ url('/kelas') }}">
                        <i class="bi bi-circle"></i><span>Kelas</span>
                      </a>
                  </li>
            </ul>
          </li>
        @endcan


 </aside>
