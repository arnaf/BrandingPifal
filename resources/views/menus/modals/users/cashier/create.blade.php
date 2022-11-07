<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Member</h5>

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
            <div class="form-group mt-3 mb-3">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
                @error('nama')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="tgl_lhr">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lhr" name="tgl_lhr">
                @error('tgl_lhr')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="tmp_lhr">Tempat Lahir</label>
                <input type="text" class="form-control" id="tmp_lhr" name="tmp_lhr" required>
                @error('tmp_lhr')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
                @error('alamat')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="pendidikan"> Pendidikan </label>
                <select name="pendidikan" id="pendidikan" class="form-control">
                    <option selected="" disabled>Pilih Pendidikan</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="Kuliah">Kuliah</option>
                </select>
                @error('pendidikan')
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
