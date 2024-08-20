<div>
    <div class="container mt-4">
        <div class="container-fluid shadow p-3 rounded-pill bg-success">
            <div class="d-flex justify-content-between align-items-center">
                <div class=""></div>
                <div class="">
                    <span class="text-white mb-0 h6"><b>Buat Formulir Cancer</b></span>
                </div>
                {{-- <button onclick="confirm('Anda yakin?') || event.stopImmediatePropagation()" wire:click="logout"
                    class="btn bg-danger text-white rounded-pill">

                    Logout
                </button> --}}
                <a href="{{ url('pasien-regs', $norm) }}" class="btn bg-white rounded-pill">
                    Kembali
                </a>
            </div>
        </div>
        <br>
    </div>

    <div class="container">
        <form>
            <div class="card">
                <div class="card-header text-center bg-success-subtle">
                    <b>DATA PASIEN</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">

                            <div class="row mb-3">
                                <label for="norm" class="col-3 col-form-label">No. RM</label>
                                <div class="col">
                                    <input disabled type="text" value="{{ $pasien->MedicalNo }}" class="form-control"
                                        id="norm" name="norm">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nik" class="col-3 col-form-label ">NIK</label>
                                <div class="col">
                                    <input value="{{ $pasien->SSN }}" disabled type="text" class="form-control"
                                        id="nik" name="nik">
                                </div>
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="row mb-3">
                                <label class="col-3 col-form-label">Nama Pasien </label>
                                <div class="col">
                                    <input value="{{ $pasien->PatientName }}" disabled type="text"
                                        class="form-control" placeholder="Nama Pasien" name="nmpasien">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgllhr" class="col-3 col-form-label">Tanggal Lahir </label>
                                <div class="col">
                                    <input value="{{ date('Y-m-d', strtotime($pasien->DateOfBirth)) }}" disabled
                                        type="date" class="form-control" id="tgllhr" name="tgllhr">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-6">
                            <div class="row mb-3">
                                <label for="jnsklmn" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col">
                                    <select class="form-select" id="jnsklmn" name="jnsklmn">
                                        <option value="Tdk. diketahui">9. Tdk. diketahui</option>
                                        <option value="Laki-Laki">1. Laki-Laki</option>
                                        <option value="Perempuan">2. Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="ras" class="col-sm-3 col-form-label">Ras</label>
                                <div class="col">
                                    <select class="form-select" id="ras" name="ras">
                                        <option value="Tdk. diketahui">00. Tdk. diketahui</option>
                                        <option value="Melayu">1. Melayu</option>
                                        <option value="Non-Melayu">2. Non-Melayu</option>
                                        <option value="Mongoloid">3. Mongoloid</option>
                                        <option value="Non-Mongoloid">4. Non-Mongoloid</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="agm" class="col-sm-3 col-form-label">Agama</label>
                                <div class="col">
                                    <select class="form-select" id="agm" name="agm">
                                        <option value="Tdk. diketahui">0. Tdk. diketahui</option>
                                        <option value="Islam">1. Islam</option>
                                        <option value="Katolik">2. Katolik</option>
                                        <option value="Protestan">3. Protestan</option>
                                        <option value="Hindu">4. Hindu</option>
                                        <option value="Budha">5. Budha</option>
                                        <option value="Lain-lain">9. Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="stts_prnkhn" class="col-sm-3 col-form-label">Status Pernikahan</label>
                                <div class="col">
                                    <select class="form-select" id="stts_prnkhn" name="stts_prnkhn">
                                        <option value="Tdk. diketahui">9. Tdk. diketahui</option>
                                        <option value="Menikah">1. Menikah</option>
                                        <option value="Janda/Duda">2. Janda/Duda</option>
                                        <option value="Belum Menikah">3. Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pkrjn" class="col-sm-3 col-form-label">Pekerjaan</label>
                                <div class="col">
                                    <select class="form-select" id="pkjrn" name="pkjrn">
                                        <option value="Tdk. diketahui">00. Tdk. diketahui</option>
                                        <option value="Staf Kantor">01. Staf Kantor</option>
                                        <option value="Petani">02. Petani</option>
                                        <option value="Buruh Pabrik">03. Buruh Pabrik</option>
                                        <option value="Militer/Polisi">04. Militer/Polisi</option>
                                        <option value="Ibu Rumah Tangga">05. Ibu Rumah Tangga</option>
                                        <option value="Tenaga Medis">06. Tenaga Medis</option>
                                        <option value="Guru">07. Guru</option>
                                        <option value="Pedagang">08. Pedagang</option>
                                        <option value="Lain-lain">09. Lain-lain</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="notelp" class="col-sm-3 col-form-label">No Telp/HP</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="notelp" name="notelp">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="card-footer text-body-secondary bg-success-subtle">
                </div>
            </div>
            <br>

            <!-- As a heading -->
            <div class="card">
                <div class="card-header text-center bg-success-subtle">
                    <b>DATA TUMOR</b>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-6">
                            <div class="row mb-3">
                                <label class="col-4 col-form-label">Topografi
                                    <div class="">
                                        <i>(lokasi tumor)</i>
                                    </div>
                                </label>
                                <div class="col">
                                    <div class="btn btn-light text-start border-secondary border-1 form-control">
                                        Pilih
                                    </div>
                                    <span class="text-muted">ICD-0 Kode C</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-4 col-form-label">Morfologi
                                    <div class="">
                                        <i>(jenis tumor)</i>
                                    </div>
                                </label>
                                <div class="col">
                                    <div class="btn btn-light text-start border-secondary border-1 form-control">
                                        Pilih
                                    </div>
                                    <span class="text-muted">ICD-0 Kode M</span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prlktmr" class="col-4 col-form-label">Perilaku Tumor</label>
                                <div class="col">
                                    <select class="form-select" id="prlktmr" wire:model="input_perilaku">
                                        <option value="">Pilih</option>
                                        @foreach ($perilakus as $perilaku)
                                            <option value="{{ $perilaku->kode }}">{{ $perilaku->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="grade" class="col-4 col-form-label">Grade</label>
                                <div class="col">
                                    <select class="form-select" id="grade" wire:model="input_grade">
                                        <option value="">Pilih</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->kode }}">{{ $grade->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="bss_dg_trvld" class="col-4 col-form-label">Basis diagnosis
                                    tervalid</label>
                                <div class="col">
                                    <select class="form-select" id="basisDiagnosaTervalid"
                                        wire:model="input_basisDiagnosaTervalids">
                                        <option value="">Pilih</option>
                                        @foreach ($basisDiagnosaTervalids as $basisDiagnosaTervalid)
                                            <option value="{{ $basisDiagnosaTervalid->kode }}">
                                                {{ $basisDiagnosaTervalid->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="stdm" class="col-4 col-form-label">Stadium</label>
                                <div class="col">

                                    <select class="form-select" id="stdm" wire:model="input_stadium">
                                        <option value="">Pilih</option>
                                        @foreach ($stadiums as $stadium)
                                            <option value="{{ $stadium->kode }}">
                                                {{ $stadium->nama }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tnm" class="col-4 col-form-label">TNM</label>
                                <div class="col">
                                    <input type="text" class="form-control" id="tnm" name="tnm">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row mb-3">
                                <label for="pnybrn_sblm_trp" class="col-5 col-form-label">Penyebaran tumor sebelum
                                    terapi
                                    <div class="">
                                        <i>(Clinical ext. of disease before treatment)</i>
                                    </div>
                                </label>
                                <div class="col">
                                    <select class="form-select" id="pnybrn_sblm_trp" wire:model="input_penyebaran">
                                        @foreach ($penyebarans as $penyebaran)
                                            <option value="{{ $penyebaran->kode }}">
                                                {{ $penyebaran->nama }}</option>
                                        @endforeach

                                    </select>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <label for="trp_plpr" class="col-5 col-form-label">Terapi di institusi pelapor
                                    <div class="">
                                        <i>(Treatment at reporting institution)</i>
                                    </div>
                                </label>
                                <div class="col">
                                    <select class="form-select" id="trp_plpr" wire:model="input_terapi">
                                        @foreach ($terapis as $terapi)
                                            <option value="{{ $terapi->kode }}">
                                                {{ $terapi->nama }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lateralitas" class="col-5 col-form-label">Lateralitas</label>
                                <div class="col">
                                    <select class="form-select" id="lateralitas" wire:model="input_lateralitas">
                                        @foreach ($lateralitass as $lateralitas)
                                            <option value="{{ $lateralitas->kode }}">
                                                {{ $lateralitas->nama }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_dg" class="col-5 col-form-label">Tanggal Diagnosis</label>
                                <div class="col">
                                    <input type="date" class="form-control" id="tgl_dg" name="tgl_dg">
                                </div>
                            </div>


                        </div>
                    </div>




                    <div class="row mb-3">
                        <label for="metastasis" class="col col-form-label">Metastasis/Anak Sebar Jauh</label>
                        @foreach ($metastasiss as $metastasis)
                            <div class="col">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" wire:model="input_metastasis.{{ $loop->index }}" id="metastasis-{{ $loop->index }}" value="{{ $metastasis->id }}">
                                    <label for="metastasis-{{ $loop->index }}" class="ms-2">{{ $metastasis->nama }}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>






                </div>
                <div class="card-footer text-body-secondary bg-success-subtle">
                </div>
            </div>

            <!-- As a heading -->
            <br>
            <div class="card">
                <div class="card-header text-center bg-success-subtle">
                    <b>DATA SUMBER/FOLLOW UP DPJP</b>
                </div>
                <br>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="table-secondary" scope="col">Tgl. Periksa</th>
                                <th class="table-secondary" scope="col">Nama Rumah Sakit</th>
                                <th class="table-secondary" scope="col">Kode Rumah Sakit</th>
                                <th class="table-secondary" scope="col">Unit ID</th>
                                <th class="table-secondary" scope="col">Unit</th>
                                <th class="table-secondary" scope="col">No. PA/LAB</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Kesimpulan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="ksmpln" name="ksmpln"></textarea>
                    </div>
                    <div class="row mb-3">
                        <label for="tglmasuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-2">
                            <input type="date" class="form-control" id="tglmasuk" name="tgl_msk">
                        </div>
                        <label for="nmregister" class="col-sm-2 col-form-label">Nama Register</label>
                        <div class="col-2">
                            <input type="text" class="form-control" id="nmregister" name="nmregister">
                        </div>
                        <label for="nmregister" class="col-sm-2 col-form-label">Nama Verifikator</label>
                        <div class="col-2 ">
                            <input type="text" class="form-control" id="nmverifikator" name="nmverifikator">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tglkontaktrkhir" class="col-sm-2 col-form-label">Tgl.kontak terakhir</label>
                        <div class="col-2">
                            <input type="date" class="form-control" id="tgl_kntk_trkhr" name="tgl_kntk_trkhr">
                        </div>
                        <label for="tglabstraksi" class="col-sm-2 col-form-label">Tgl.abstraksi</label>
                        <div class="col-2">
                            <input type="date" class="form-control" id="tglabstraksi" name="tglabstraksi">
                        </div>
                        <label for="tglverifikator" class="col-sm-2 col-form-label">Tgl.verifikator</label>
                        <div class="col-2">
                            <input type="date" class="form-control" id="tglverifikator" name="tglverifikator">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="stts" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-6 col-sm-3">
                            <select class="form-select" id="stts" name="stts">
                                <option value="Hidup">Hidup</option>
                                <option value="Meninggal">Meninggal</option>
                                <option value="Tidak diketahui">Tidak diketahui</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card d-flex card-footer text-body-secondary">
                    <p class="text-center">
                        <button wire:click="save" class="btn w-100 btn-success" >Simpan</button>
                        <button wire:click='save' type="button">Simpan</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>
