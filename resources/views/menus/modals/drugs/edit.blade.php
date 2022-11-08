<form id="editForm">
    <div class="modal" tabindex="-1" role="dialog" id="editModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Data Obat</h5>
          </div>

          <div class="modal-body">


                <div class="form-group mt-3 mb-3">
                <label for="drugNameEdit">Nama Obat</label>
                <input type="text" class="form-control" id="drugNameEdit" name="drugNameEdit">
                @error('drugNameEdit')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="drugBrandEdit">Merk Dagang Obat</label>
                <input type="text" class="form-control" id="drugBrandEdit" name="drugBrandEdit">
                @error('drugBrandEdit')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group mt-3 mb-3">
                <label for="drugCategoryEdit" class="col-sm-12 col-form-label">Kategori Obat</label>
                <div class="col-sm-12">
                    <select name="drugCategoryEdit" id="drugCategoryEdit" class="form-control" required>
                        <option value="" selected disabled>Pilih kategori obat</option>
                        @foreach($drugcategories as $dc)
                            <option value="{{ $dc->id }}" >{{ $dc->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="drugPatentStatusEdit" class="col-sm-12 col-form-label">Status Paten Obat</label>
                <div class="col-sm-12">
                    <select name="drugPatentStatusEdit" id="drugPatentStatusEdit" class="form-control" required>
                        <option value="" selected disabled>Pilih status paten obat</option>
                            <option value="generik" >Generik</option>
                            <option value="paten" >Paten</option>
                    </select>
                </div>
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="drugTypeEdit" class="col-sm-12 col-form-label">Jenis Obat</label>
                <div class="col-sm-12">
                    <select name="drugTypeEdit" id="drugTypeEdit" class="form-control" required>
                        <option value="" selected disabled>Pilih jenis obat</option>
                        @foreach($drugtypes as $dt)
                            <option value="{{ $dt->id }}" >{{ $dt->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="drugUnitEdit" class="col-sm-12 col-form-label">Satuan Kemasan Obat</label>
                <div class="col-sm-12">
                    <select name="drugUnitEdit" id="drugUnitEdit" class="form-control" required>
                        <option value="" selected disabled>Pilih satuan kemasan obat</option>
                        @foreach($drugunits as $du)
                            <option value="{{ $du->id }}" >{{ $du->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="drugPriceEdit">Harga</label>
                <input type="number" class="form-control" id="drugPriceEdit" name="drugPriceEdit">
                @error('drugPriceEdit')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="drugPhotoEdit">Foto</label>
                <input type="file" class="form-control" required data-allowed-file-extensions="jpg png" data-max-file-size-preview="3M" id="drugPhotoEdit"  name="drugPhotoEdit">
                @error('drugPhotoEdit')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


          <div class="form-group mt-3 mb-3">
            <label for="drugBPJSStatusEdit" class="col-sm-12 col-form-label">Status BPJS</label>
            <div class="col-sm-12">
                <select name="drugBPJSStatusEdit" id="drugBPJSStatusEdit" class="form-control" required>
                    <option value="" selected disabled>Pilih status BPJS obat</option>
                        <option value="BPJS" >BPJS</option>
                        <option value="Non BPJS" >Non BPJS</option>
                </select>
            </div>
          </div>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="editSubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</form>
