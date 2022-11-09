<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Obat</h5>

          </div>
          <div class="modal-body">




            <div class="form-group mt-3 mb-3">
                <label for="drugName">Nama Obat</label>
                <input type="text" class="form-control" id="drugName" name="drugName">
                @error('drugName')
                  <span class="text-danger">{{$message}}</span>
                @enderror
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="drugCategory" class="col-sm-12 col-form-label">Kategori Obat</label>
                <div class="col-sm-12">
                    <select name="drugCategory" id="drugCategory" class="form-control" required>
                        <option value="" selected disabled>Pilih kategori obat</option>
                        @foreach($drugcategories as $dc)
                            <option value="{{ $dc->id }}" >{{ $dc->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>



            <div class="form-group mt-3 mb-3">
                <label for="drugType" class="col-sm-12 col-form-label">Jenis Obat</label>
                <div class="col-sm-12">
                    <select name="drugType" id="drugType" class="form-control" required>
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
            <button type="button" class="btn btn-primary" id="createSubmit">Save changes</button>
          </div>








                  {{-- <div class="form-group mt-3 mb-3">
                    <label for="drugBrand">Merk Dagang Obat</label>
                    <input type="text" class="form-control" id="drugBrand" name="drugBrand">
                    @error('drugBrand')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div> MERK DAGANG --}}

                  {{-- <div class="form-group mt-3 mb-3">
                    <label for="drugPatentStatus" class="col-sm-12 col-form-label">Status Paten Obat</label>
                    <div class="col-sm-12">
                        <select name="drugPatentStatus" id="drugPatentStatus" class="form-control" required>
                            <option value="" selected disabled>Pilih status paten obat</option>
                                <option value="generik" >Generik</option>
                                <option value="paten" >Paten</option>
                        </select>
                    </div>
                  </div> Status Paten --}}

                  {{-- <div class="form-group mt-3 mb-3">
                    <label for="drugUnit" class="col-sm-12 col-form-label">Satuan Kemasan Obat</label>
                    <div class="col-sm-12">
                        <select name="drugUnit" id="drugUnit" class="form-control" required>
                            <option value="" selected disabled>Pilih satuan kemasan obat</option>
                            @foreach($drugunits as $du)
                                <option value="{{ $du->id }}" >{{ $du->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div> Drug Unit --}}


                  {{-- <div class="form-group mt-3 mb-3">
                    <label for="drugPrice">Harga</label>
                    <input type="number" class="form-control" id="drugPrice" name="drugPrice">
                    @error('drugPrice')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div> Drug Price --}}

                  {{-- <div class="form-group mt-3 mb-3">
                    <label for="drugPhoto">Foto</label>
                    <input type="file" class="form-control" required data-allowed-file-extensions="jpg png" data-max-file-size-preview="3M" id="drugPhoto"  name="drugPhoto">
                    @error('drugPhoto')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div> Drug Photo --}}

                  {{-- <div class="form-group mt-3 mb-3">
                    <label for="drugBPJSStatus" class="col-sm-12 col-form-label">Status BPJS</label>
                    <div class="col-sm-12">
                        <select name="drugBPJSStatus" id="drugBPJSStatus" class="form-control" required>
                            <option value="" selected disabled>Pilih status BPJS obat</option>
                                <option value="BPJS" >BPJS</option>
                                <option value="Non BPJS" >Non BPJS</option>
                        </select>
                    </div>
                  </div> BPJS --}}






        </div>
      </div>
    </div>
</form>


