<form id="editForm">
    <div class="modal" tabindex="-1" role="dialog" id="editModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Data Alkes</h5>
          </div>

          <div class="modal-body">


            <div class="form-group mt-3 mb-3">
                <label for="alkesNameEdit">Nama Alkes</label>
                <input type="text" class="form-control" id="alkesNameEdit" name="alkesNameEdit">
                @error('alkesNameEdit')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="alkesBrandEdit">Merk Dagang Alkes</label>
                <input type="text" class="form-control" id="alkesBrandEdit" name="alkesBrandEdit">
                @error('alkesBrandEdit')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>


            <div class="form-group mt-3 mb-3">
                <label for="alkesClasificationEdit" class="col-sm-12 col-form-label">Kategori Pakai</label>
                <div class="col-sm-12">
                    <select name="alkesClasificationEdit" id="alkesClasificationEdit" class="form-control" required>
                        <option value="" selected disabled>Pilih kategori pakai alkes</option>
                        @foreach($alkesclasifications as $ac)
                            <option value="{{ $ac->id }}" >{{ $ac->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="alkesElectroTypeEdit" class="col-sm-12 col-form-label">Kategori Elektromedik</label>
                <div class="col-sm-12">
                    <select name="alkesElectroTypeEdit" id="alkesElectroTypeEdit" class="form-control" required>
                        <option value="" selected disabled>Pilih kategori elektromedik alkes</option>
                            <option value="Elektromedik Radiasi" >Elektromedik Radiasi</option>
                            <option value="Elektromedik Non Radiasi" >Elektromedik Non Radiasi</option>
                            <option value="Non Elektromedik Steril" >Non Elektromedik Steril</option>
                            <option value="Non Elektromedik Non Steril" >Non Elektromedik Non Steril</option>
                            <option value="Produk Diagnostik In Vitro" >Produk Diagnostik In Vitro</option>
                    </select>
                </div>
            </div>


            <div class="form-group mt-3 mb-3">
                <label for="alkesRiskTypeEdit" class="col-sm-12 col-form-label">Kategori Risiko</label>
                <div class="col-sm-12">
                    <select name="alkesRiskTypeEdit" id="alkesRiskTypeEdit" class="form-control" required>
                        <option value="" selected disabled>Pilih status paten alkes</option>
                            <option value="Rendah">Rendah</option>
                            <option value="Rendah-Sedang">Rendah-Sedang</option>
                            <option value="Sedang-Tinggi">Sedang-Tinggi</option>
                            <option value="Tinggi">Tinggi</option>
                    </select>
                </div>
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="alkesUnitEdit" class="col-sm-12 col-form-label">Satuan Kemasan Alkes</label>
                <div class="col-sm-12">
                    <select name="alkesUnitEdit" id="alkesUnitEdit" class="form-control" required>
                        <option value="" selected disabled>Pilih satuan kemasan alkes</option>
                        @foreach($alkesunits as $du)
                            <option value="{{ $du->id }}" >{{ $du->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="alkesPriceEdit">Harga</label>
                <input type="number" class="form-control" id="alkesPriceEdit" name="alkesPriceEdit">
                @error('alkesPriceEdit')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="alkesBPJSStatusEdit" class="col-sm-12 col-form-label">Status BPJS</label>
                <div class="col-sm-12">
                    <select name="alkesBPJSStatusEdit" id="alkesBPJSStatusEdit" class="form-control" required>
                        <option value="" selected disabled>Pilih status BPJS alkes</option>
                            <option value="BPJS" >BPJS</option>
                            <option value="Non BPJS" >Non BPJS</option>
                    </select>
                </div>
              </div>

            <div class="form-group mt-3 mb-3">
                <label for="alkesPhotoEdit">Foto</label>
                <input type="file" class="form-control" required data-allowed-file-extensions="jpg png" data-max-file-size-preview="3M" id="alkesPhotoEdit"  name="alkesPhotoEdit">
                @error('alkesPhotoEdit')
                <span class="text-danger">{{$message}}</span>
                @enderror
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
