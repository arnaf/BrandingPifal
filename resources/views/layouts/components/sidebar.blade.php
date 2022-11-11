<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

           <!-- End Components Nav -->



      <!-- End Forms Nav -->





      @can('kasir')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/cart') }}">
          <i class="bi bi-credit-card"></i><span>KASIR</span>
        </a>
      </li><!-- End Tables Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/penjualans') }}">
          <i class="bi bi-credit-card"></i><span>Penjualan</span>
        </a>
      </li><!-- End Tables Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link collapsed" href="">
          <i class="bi bi-cash-stack"></i><span>Pembelian</span>
        </a>
      </li> --}}




      {{-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clock-history"></i><span>Riwayat Pembayaran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a href="">
                  <i class="bi bi-circle"></i><span>Berhasil</span>
                </a>
            </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Gagal</span>
            </a>
          </li>
        </ul>
      </li>






      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-clock-history"></i><span>Riwayat Pembayaran Saya</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li class="nav-item">
                <a href="">
                  <i class="bi bi-circle"></i><span>Berhasil</span>
                </a>
            </li>
          <li>
            <a href="">
              <i class="bi bi-circle"></i><span>Gagal</span>
            </a>
          </li>
        </ul>
      </li>--}}
      @endcan



      <!-- End Charts Nav -->

           <!-- End Icons Nav -->

    @can('Data Master')


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journals"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="icons-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ url('/drugcategory') }}">
                      <i class="bi bi-circle"></i><span>Kategori Obat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/alkesclasification') }}">
                      <i class="bi bi-circle"></i><span>Klasifikasi Alkes</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/unit') }}">
                      <i class="bi bi-circle"></i><span>Unit</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/drugtype') }}">
                      <i class="bi bi-circle"></i><span>Jenis Obat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/drug') }}">
                      <i class="bi bi-circle"></i><span>Obat</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/alkes') }}">
                      <i class="bi bi-circle"></i><span>Alkes</span>
                    </a>
                </li>




{{--
                <li>
                    <a href="">
                      <i class="bi bi-circle"></i><span>Supplier</span>
                    </a>
                </li>
            </ul>
          </li> --}}


          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journals"></i><span>Management User</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                <li>
                    <a href="{{ url('/role') }}">
                      <i class="bi bi-circle"></i><span>Role</span>
                    </a>
                </li>

                <li>
                    <a href="{{ url('/cashier') }}">
                      <i class="bi bi-circle"></i><span>Cashier</span>
                    </a>
                </li>
            </ul>
          </li>

    @endcan



 </aside>
