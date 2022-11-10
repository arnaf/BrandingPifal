<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Obat</h5>

          </div>
          <div class="modal-body">




            <div class="form-group mt-3 mb-3">
                <label for="drugName">Nama Obat</label>
                <input type="text" class="form-control" id="drugName" name="drugName">
                @error('drugName')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="drugCategory" class="col-sm-12 col-form-label">Kategori Obat</label>
                <div class="col-sm-12">
                    <select name="drugCategory" id="drugCategory" class="form-control" required>
                        <option value="" selected disabled>Pilih kategori obat</option>
                        @foreach($drugcategories as $dc)
                            <option value="{{ $dc->id }}" >{{ $dc->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="drugType" class="col-sm-12 col-form-label">Jenis Obat</label>
                <div class="col-sm-12">
                    <select name="drugType" id="drugType" class="form-control" required>
                        <option value="" selected disabled>Pilih jenis obat</option>
                        @foreach($drugtypes as $dt)
                            <option value="{{ $dt->id }}" >{{ $dt->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div class="form-group mt-3 mb-3">
                <label for="buyPrice">Harga Beli</label>
                  <input type="number" class="form-control" id="buyPrice" name="buyPrice">
                      @error('buyPrice')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
            </div>


            <div class="form-group mt-3 mb-3">
              <label for="sellPrice">Harga Jual</label>
                <input type="number" class="form-control" id="sellPrice" name="sellPrice">
                    @error('sellPrice')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="barcode">Barcode</label>
                <input type="textarea" class="form-control" id="barcode" name="barcode">
                @error('barcode')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>





          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="createSubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</form>



