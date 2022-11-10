<form id="editForm">
    <div class="modal" tabindex="-1" role="dialog" id="editModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data Supplier</h5>

          </div>
          <div class="modal-body">


            <div class="form-group mt-3 mb-3">
                <label for="nameEdit">Nama Supplier</label>
                <input type="text" class="form-control" id="nameEdit" name="nameEdit">
                @error('nameEdit')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="addressEdit">Alamat</label>
                <input type="textarea" class="form-control" id="addressEdit" name="addressEdit">
                @error('addressEdit')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="phoneEdit">Nomor Telepon</label>
                <input type="text" class="form-control" id="phoneEdit" name="phoneEdit">
                @error('phoneEdit')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="statusEdit" class="col-sm-12 col-form-label">Status</label>
                   <div class="col-sm-12">
                    <select name="statusEdit" id="statusEdit" class="form-control" required>
                       <option value="" selected disabled>Pilih statusEdit keaktifan supplier</option>
                           <option value="aktif" >Aktif</option>
                           <option value="nonaktif" >Nonaktif</option>
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
