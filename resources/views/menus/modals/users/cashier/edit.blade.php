<form id="editForm">
    <div class="modal" tabindex="-1" role="dialog" id="editModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Data Member</h5>

          </div>
          <div class="modal-body">
            <div class="form-group mt-3 mb-3">
                <label for="namaEdit">Nama</label>
                <input type="text" class="form-control" id="namaEdit" name="namaEdit">
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="passwordEdit">Password</label>
                <input type="password" class="form-control" id="passwordEdit" name="passwordEdit">
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="tgl_lhrEdit">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tgl_lhrEdit" name="tgl_lhrEdit">
            </div>
            {{-- <div class="form-group">
              <label for="role">Role</label>
              <select name="role" id="role" class="form-control">
                  <option value="" selected disabled>Pilih Role</option>
                  @foreach($roles as $role)
                      <option value="{{ $role->name }}">{{ $role->name }}</option>
                  @endforeach
              </select>
            </div> --}}
            <div class="form-group mt-3 mb-3">
              <label for="tmp_lhrEdit">Tempat Lahir</label>
              <input type="text" class="form-control" id="tmp_lhrEdit" name="tmp_lhrEdit">
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="alamatEdit">Alamat</label>
                <input type="text" class="form-control" id="alamatEdit" name="alamatEdit">
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="pendidikanEdit"> Pendidikan </label>
                <select name="pendidikanEdit" id="pendidikanEdit" class="form-control">
                    <option selected="" disabled>Pilih Pendidikan</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="Kuliah">Kuliah</option>
                </select>
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
