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
                  <a class="btn btn-warning"
                       href="{{ route('exportdrug') }}">
                              Export Drug Data
                  </a>

                {{-- <form action="{{ route('importdrug') }}"
                    method="POST"
                    enctype="multipart/form-data">
                  @csrf
                  <input type="file" id="importdrug" name="importdrug" hidden/>
                  <button type="submit" class="btn btn-success"><i class="bi bi-check-circle" ></i><br>Import Data</button>
                </form> --}}



                <form action="{{ route('importdrug') }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="drugimport"
                           class="form-control">
                    <br>
                    <button class="btn btn-success">
                          Import User Data
                    </button>

                </form>

              <table class="table table-hover table-striped table-border" id="table">

                  <thead>
                      <th>#</th>
                      <th>Nama Obat</th>
                      <th>Kategori Obat</th>
                      <th>Tipe Obat</th>
                      <th>Harga Jual</th>
                      <th>Harga Beli</th>
                      <th>Barcode</th>
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
      @include('menus.modals.drugs.detail')

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
