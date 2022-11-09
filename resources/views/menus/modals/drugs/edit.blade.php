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

         

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" id="editSubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</form>
