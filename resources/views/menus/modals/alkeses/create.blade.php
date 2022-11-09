<form id="createForm">
    <div class="modal" tabindex="-1" role="dialog" id="createModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Alat Kesehatan</h5>

          </div>
          <div class="modal-body">



            <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Langkah 1</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Langkah 2</button>
                </li>
            </ul>



            <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">





                    <div class="form-group mt-3 mb-3">
                        <label for="alkesName">Nama Alkes</label>
                        <input type="text" class="form-control" id="alkesName" name="alkesName">
                        @error('alkesName')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <label for="alkesBrand">Merk Dagang Alkes</label>
                        <input type="text" class="form-control" id="alkesBrand" name="alkesBrand">
                        @error('alkesBrand')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="form-group mt-3 mb-3">
                        <label for="alkesClasification" class="col-sm-12 col-form-label">Klasifikasi Pakai</label>
                        <div class="col-sm-12">
                            <select name="alkesClasification" id="alkesClasification" class="form-control" required>
                                <option value="" selected disabled>Pilih klasifikasi pakai alkes</option>
                                @foreach($alkesclasifications as $ac)
                                    <option value="{{ $ac->id }}" >{{ $ac->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <label for="alkesElectroType" class="col-sm-12 col-form-label">Kategori Elektromedik</label>
                        <div class="col-sm-12">
                            <select name="alkesElectroType" id="alkesElectroType" class="form-control" required>
                                <option value="" selected disabled>Pilih kategori elektromedik alkes</option>
                                    <option value="Elektromedik Radiasi" >Elektromedik Radiasi</option>
                                    <option value="Elektromedik Non Radiasi" >Elektromedik Non Radiasi</option>
                                    <option value="Non Elektromedik Steril" >Non Elektromedik Steril</option>
                                    <option value="Non Elektromedik Non Steril" >Non Elektromedik Non Steril</option>
                                    <option value="Produk Diagnostik In Vitro" >Produk Diagnostik In Vitro</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group mt-3 mb-3">
                        <label for="alkesRiskType" class="col-sm-12 col-form-label">Kategori Risiko</label>
                        <div class="col-sm-12">
                            <select name="alkesRiskType" id="alkesRiskType" class="form-control" required>
                                <option value="" selected disabled>Pilih status paten alkes</option>
                                    <option value="Rendah">Rendah</option>
                                    <option value="Rendah-Sedang">Rendah-Sedang</option>
                                    <option value="Sedang-Tinggi">Sedang-Tinggi</option>
                                    <option value="Tinggi">Tinggi</option>
                            </select>
                        </div>
                    </div>


                    <div class="modal-footer">

                    </div>



                </div>
                <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">





                    <div class="form-group mt-3 mb-3">
                        <label for="alkesUnit" class="col-sm-12 col-form-label">Satuan Kemasan Alkes</label>
                        <div class="col-sm-12">
                            <select name="alkesUnit" id="alkesUnit" class="form-control" required>
                                <option value="" selected disabled>Pilih satuan kemasan alkes</option>
                                @foreach($alkesunits as $du)
                                    <option value="{{ $du->id }}" >{{ $du->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <label for="alkesPrice">Harga</label>
                        <input type="number" class="form-control" id="alkesPrice" name="alkesPrice">
                        @error('alkesPrice')
                          <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <label for="alkesBPJSStatus" class="col-sm-12 col-form-label">Status BPJS</label>
                        <div class="col-sm-12">
                            <select name="alkesBPJSStatus" id="alkesBPJSStatus" class="form-control" required>
                                <option value="" selected disabled>Pilih status BPJS alkes</option>
                                    <option value="BPJS" >BPJS</option>
                                    <option value="Non BPJS" >Non BPJS</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mt-3 mb-3">
                        <label for="alkesPhoto">Foto</label>
                        <input type="file" class="form-control" required data-allowed-file-extensions="jpg png" data-max-file-size-preview="3M" id="alkesPhoto"  name="alkesPhoto">
                        @error('alkesPhoto')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="createSubmit">Save changes</button>
                    </div>



                </div>
            </div>




          </div>


        </div>
      </div>
    </div>
</form>


