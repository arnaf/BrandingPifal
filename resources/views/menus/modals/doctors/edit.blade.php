<form id="editForm">
    <div class="modal" tabindex="-1" doctor="dialog" id="editModal">
      <div class="modal-dialog" doctor="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Ubah Doctor</h5>
          </div>

          <div class="modal-body">
            <div class="form-group mt-3 mb-3">
                <label for="doctorNameEdit">Doctor</label>
                <input type="text" class="form-control" id="doctorNameEdit" name="doctorNameEdit">
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
