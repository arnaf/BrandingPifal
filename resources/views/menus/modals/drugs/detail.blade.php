<form id="detailDrugForm">
    <div class="modal" tabindex="-1" role="dialog" id="detailDrugModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Obat</h5>

          </div>
          <div class="modal-body">



                  <div class="form-group mt-3 mb-3">
                    <label for="drugUnit" class="col-sm-12 col-form-label">Satuan Kemasan Obat</label>
                    <div class="col-sm-12">
                        <select name="drugUnit" id="drugUnit" class="form-control" required>
                            <option value="" selected disabled>Pilih satuan kemasan obat</option>
                            @foreach($drugunits as $du)
                                <option value="{{ $du->id }}" >{{ $du->name }}</option>
                            @endforeach
                        </select>
                    </div>
                  </div>





                  <div class="form-group mt-3 mb-3">
                    <label for="drugPhoto">Foto</label>
                     <input type="file" class="form-control" required data-allowed-file-extensions="jpg png"  data-max-file-size-preview="3M" id="drugPhoto"  name="drugPhoto">
                      @error('drugPhoto')
                     <span class="text-danger">{{$message}}</span>
                      @enderror
                  </div>




                    <div class="form-group mt-3 mb-3">
                      <label for="drugBPJSStatus" class="col-sm-12 col-form-label">Status BPJS</label>
                       <div class="col-sm-12">
                        <select name="drugBPJSStatus" id="drugBPJSStatus" class="form-control" required>
                            <option value="" selected disabled>Pilih status BPJS obat</option>
                                <option value="BPJS" >BPJS</option>
                                <option value="Non BPJS" >Non BPJS</option>
                        </select>
                       </div>
                    </div>



                    <div class="form-group mt-3 mb-3">
                     <label for="drugPatentStatus" class="col-sm-12 col-form-label">Status Paten Obat</label>
                        <div class="col-sm-12">
                         <select name="drugPatentStatus" id="drugPatentStatus" class="form-control" required>
                            <option value="" selected disabled>Pilih status paten obat</option>
                                <option value="Generik" >Generik</option>
                                <option value="Paten" >Paten</option>
                         </select>
                        </div>
                    </div>



                    <div class="form-group mt-3 mb-3">
                        <label for="drugDesc">Deskripsi Obat</label>
                          <input type="textarea" class="form-control" id="drugDesc" name="drugDesc">
                              @error('drugDesc')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                    </div>


                    <div class="form-group mt-3 mb-3">
                        <label for="drugUsage">Kegunaan Obat</label>
                          <input type="textarea" class="form-control" id="drugUsage" name="drugUsage">
                              @error('drugUsage')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                    </div>


                    <div class="form-group mt-3 mb-3">
                        <label for="drugDosage">Dosis Obat</label>
                          <input type="textarea" class="form-control" id="drugDosage" name="drugDosage">
                              @error('drugDosage')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                    </div>



                    <div class="form-group mt-3 mb-3">
                        <label for="unitDesc">Deskripsi Kemasan</label>
                          <input type="textarea" class="form-control" id="unitDesc" name="unitDesc">
                              @error('unitDesc')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                    </div>


                    <div class="form-group mt-3 mb-3">
                        <label for="sideEffect">Efek Samping Obat</label>
                          <input type="textarea" class="form-control" id="sideEffect" name="sideEffect">
                              @error('sideEffect')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                    </div>



                    <div class="form-group mt-3 mb-3">
                        <label for="bpomNum">Nomor Registrasi BPOM</label>
                          <input type="text" class="form-control" id="bpomNum" name="bpomNum">
                              @error('bpomNum')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                    </div>


          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="detailDrugSubmit">Save changes</button>
          </div>








                  {{-- <div class="form-group mt-3 mb-3">
                    <label for="drugBrand">Merk Dagang Obat</label>
                    <input type="text" class="form-control" id="drugBrand" name="drugBrand">
                    @error('drugBrand')
                      <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div> MERK DAGANG --}}














        </div>
      </div>
    </div>
</form>


