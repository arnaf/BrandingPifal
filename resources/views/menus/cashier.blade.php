@extends('layouts.app')

@section('content')
<main id="main" class="main">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="col-sm-6">
              <h1>Cashier</h1>
            </div>

          <div class="card-tools">

          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">

                  <button type="button" class="my-3 btn btn-primary" onclick="create()">Tambah Data Kasir</button>

              <table class="table table-hover table-striped table-border" id="table">

                  <thead>
                      <th>#</th>
              
                      <th>Nama</th>
                      <th>Nomor Pegawai</th>
                      <th>Tanggal Lahir</th>
                      <th>Alamat</th>
                      <th>Telp</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                  </thead>

                  <tbody>


                  </tbody>
              </table>
          </div>
        </div>
      </div>
      @include('menus.modals.users.cashier.create')
      @include('menus.modals.users.cashier.edit')

      <!-- /.card -->

    </section>
    <!-- /.content -->
    @push('script')
      @include('menus.scripts.datatables')
      @include('menus.scripts.sweetalert')
      @include($script)
    @endpush
  </section>

</main>
@endsection
