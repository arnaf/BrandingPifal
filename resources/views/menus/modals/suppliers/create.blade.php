<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Supplier</h5>

          </div>
          <div class="modal-body">


            <div class="form-group mt-3 mb-3">
                <label for="name">Nama Supplier</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="address">Alamat</label>
                <input type="textarea" class="form-control" id="address" name="address">
                @error('address')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="phone">Nomor Telepon</label>
                <input type="text" class="form-control" id="phone" name="phone">
                @error('phone')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="status" class="col-sm-12 col-form-label">Status</label>
                   <div class="col-sm-12">
                    <select name="status" id="status" class="form-control" required>
                       <option value="" selected disabled>Pilih status keaktifan supplier</option>
                           <option value="aktif" >Aktif</option>
                           <option value="nonaktif" >Nonaktif</option>
                    </select>
                   </div>
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
