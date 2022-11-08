@extends('layouts.app')

@section('content')
<main id="main" class="main">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="col-sm-6">
              <h1>Obat</h1>
            </div>

          <div class="card-tools">

          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">

                  <button type="button" class="my-3 btn btn-primary" onclick="create()">Tambah Data Obat</button>

              <table class="table table-hover table-striped table-border" id="table">

                  <thead>
                      <th>#</th>
                      <th>Nama Obat</th>
                      <th>Kategori</th>
                      <th>Merk Dagang</th>
                      <th>Tipe Obat</th>
                      <th>Jenis Paten</th>
                      <th>Satuan Kemasan</th>
                      <th>Status BPJS</th>
                      <th>Tindakan</th>
                  </thead>

                  <tbody>


                  </tbody>
              </table>
          </div>
        </div>
      </div>
      @include('menus.modals.drugs.create')
      @include('menus.modals.drugs.edit')

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
