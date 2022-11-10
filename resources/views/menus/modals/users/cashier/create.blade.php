<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Data Kasir</h5>

          </div>
          <div class="modal-body">

              <div class="form-group mb-3">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                  @error('email')
                  <span class="text-danger">{{$message}}</span>
                  @enderror
              </div>
              <div class="form-group mt-3 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>






            {{-- <div class="form-group mt-3 mb-3">
                <label for="photo">Foto</label>
                 <input type="file" class="form-control" required data-allowed-file-extensions="jpg png"  data-max-file-size-preview="3M" id="photo"  name="photo">
                  @error('photo')
                 <span class="text-danger">{{$message}}</span>
                  @enderror
              </div> --}}

            <div class="form-group mt-3 mb-3">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="employeeId">ID Karyawan</label>
                <input type="text" class="form-control" id="employeeId" name="employeeId" required>
                @error('employeeId')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="dateBirth">Tanggal Lahir</label>
                <input type="date" class="form-control" id="dateBirth" name="dateBirth">
                @error('dateBirth')
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
                <label for="address">Alamat</label>
                <input type="text" class="form-control" id="address" name="address">
                @error('address')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group mt-3 mb-3">
                <label for="status"> Status Keaktifan </label>
                <select name="status" id="status" class="form-control">
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
            <button type="button" class="btn btn-primary" id="createSubmit">Save changes</button>
          </div>
        </div>
      </div>
    </div>
</form>
