<form id="editForm">
    <div class="modal" tabindex="-1" role="dialog" id="editModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Data Kasir</h5>

          </div>
          <div class="modal-body">




{{--
          <div class="form-group mt-3 mb-3">
              <label for="photoEdit">Foto</label>
               <input type="file" class="form-control" required data-allowed-file-extensions="jpg png"  data-max-file-size-preview="3M" id="photoEdit"  name="photoEdit">
                @error('photo')
               <span class="text-danger">{{$message}}</span>
                @enderror
            </div> --}}

          <div class="form-group mt-3 mb-3">
              <label for="nameEdit">Nama</label>
              <input type="text" class="form-control" id="nameEdit" name="nameEdit">
              @error('nameEdit')
                <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group mt-3 mb-3">
              <label for="employeeIdEdit">ID Karyawan</label>
              <input type="text" class="form-control" id="employeeIdEdit" name="employeeIdEdit" required>
              @error('employeeIdEdit')
                <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group mt-3 mb-3">
              <label for="dateBirthEdit">Tanggal Lahir</label>
              <input type="date" class="form-control" id="dateBirthEdit" name="dateBirthEdit">
              @error('dateBirthEdit')
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
              <label for="addressEdit">Alamat</label>
              <input type="text" class="form-control" id="addressEdit" name="addressEdit">
              @error('addressEdit')
                <span class="text-danger">{{$message}}</span>
              @enderror
          </div>

          <div class="form-group mt-3 mb-3">
              <label for="statusEdit"> Status Keaktifan </label>
              <select name="statusEdit" id="statusEdit" class="form-control">
                  <option selected="" disabled>Pilih Status Keaktifan</option>
                      <option value="Aktif">Aktif</option>
                      <option value="Nonaktif">Nonaktif</option>
              </select>
              @error('status')
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
