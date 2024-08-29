<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
</div>
<div>
    <div class="container">
        <div class="row">


            <div class="col">
                <div class="sticky-top">
                    <div class="container mt-3">
                        <div class="container-fluid shadow p-3 rounded-pill bg-success">
                            <div class="d-flex justify-content-between align-items-center">

                                <a href="{{ url('pasien-regs', $norm) }}"
                                    class="btn bg-secondary text-white rounded-pill">
                                    Kembali
                                </a>
                                <div class="">
                                    <span class="text-white mb-0 h6"><b>Buat Formulir Cancer</b></span>
                                </div>
                                {{-- <button onclick="confirm('Anda yakin?') || event.stopImmediatePropagation()"
                                    wire:click="logout" class="btn bg-danger text-white rounded-pill">

                                    Logout
                                </button> --}}
                                <a href="{{ url('pasien-regs', $norm) }}" class="btn bg-white rounded-pill">
                                    Simpan
                                </a>

                            </div>
                        </div>
                        <br>
                    </div>
                </div>

                <div id="list-item-1" class="card mb-2">
                    <div class="card-header text-center text-white bg-success">
                        <b>DATA PASIEN</b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">

                                <div class="row mb-3">
                                    <label for="norm" class="col-3 col-form-label">No. RM</label>
                                    <div class="col">
                                        <input disabled type="text" value="{{ $pasien->MedicalNo }}"
                                            class="form-control" id="norm" name="norm">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="nik" class="col-3 col-form-label ">NIK</label>
                                    <div class="col">
                                        <input value="{{ $pasien->SSN }}" disabled type="text" class="form-control"
                                            id="nik" name="nik">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-3 col-form-label">Nama Pasien </label>
                                    <div class="col">
                                        <input value="{{ $pasien->PatientName }}" disabled type="text"
                                            class="form-control" placeholder="Nama Pasien" name="nmpasien">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgllhr" class="col-3 col-form-label">Tempat Lahir </label>
                                    <div class="col">
                                        <input value="{{ $pasien->CityOfBirth }}" disabled type="text"
                                            class="form-control" id="tgllhr" name="tgllhr">
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
                            <div class="col-6">
                                <div class="row mb-3">
                                    <label for="tgllhr" class="col-3 col-form-label">Jenis kelamin</label>
                                    <div class="col">
                                        <input value="{{ $pasien->GCSex == '0001^M' ? 'Laki-laki' : 'Perempuan' }}"
                                            disabled type="text" class="form-control" id="tgllhr" name="tgllhr">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgllhr" class="col-3 col-form-label">Agama</label>
                                    <div class="col">
                                        <input @if($pasien->GCReligion == '0006^BUD')
                                        value="Buddhist"
                                        @elseif($pasien->GCReligion == '0006^CHR')
                                        value="Christian"
                                        @elseif($pasien->GCReligion == '0006^CNF')
                                        value="Confucian (Kong Fu Cu)"
                                        @elseif($pasien->GCReligion == '0006^CTH')
                                        value="Catholic"
                                        @elseif($pasien->GCReligion == '0006^HIN')
                                        value="Hindu"
                                        @elseif($pasien->GCReligion == '0006^MOS')
                                        value="Muslim"

                                        @else
                                        value="Tidak diketahui"
                                        @endif
                                        disabled
                                        type="text" class="form-control" id="tgllhr" name="tgllhr">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgllhr" class="col-3 col-form-label">Status pernikahan</label>
                                    <div class="col">
                                        <input @if($pasien->GCMaritalStatus == '0002^M')
                                        value="Menikah"
                                        @elseif($pasien->GCMaritalStatus == '0002^B')
                                        value="Belum Menikah"
                                        @else
                                        value="Tidak diketahui"
                                        @endif
                                        disabled
                                        type="text" class="form-control" id="tgllhr" name="tgllhr">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgllhr" class="col-3 col-form-label">Pekerjaan</label>
                                    <div class="col">
                                        <input @if($pasien->GCMaritalStatus == 'X0012^01')
                                        value="Pegawai Swasta"
                                        @elseif($pasien->GCMaritalStatus == 'X0012^02')
                                        value="TNI/Polri/PNS/BUMN"
                                        @elseif($pasien->GCMaritalStatus == 'X0012^03')
                                        value="Buruh dan Lainnya"
                                        @elseif($pasien->GCMaritalStatus == 'X0012^04')
                                        value="Tdk Kerja/sekolah/IRT"
                                        @elseif($pasien->GCMaritalStatus == 'X0012^05')
                                        value="Wiraswasta/dagang/jasa"
                                        @elseif($pasien->GCMaritalStatus == 'X0012^06')
                                        value="Wiraswasta/dagang/jasa"
                                        @elseif($pasien->GCMaritalStatus == 'X0012^07')
                                        value="Petani/Nelayan"
                                        @elseif($pasien->GCMaritalStatus == 'X0012^08')
                                        value="Petani/Nelayan"
                                        @else
                                        value="Tidak diketahui"
                                        @endif
                                        disabled
                                        type="text" class="form-control" id="tgllhr" name="tgllhr">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tgllhr" class="col-3 col-form-label">No HP</label>
                                    <div class="col">
                                        <input value="{{ $pasien->MobilePhoneNo1 }}" disabled type="text"
                                            class="form-control" id="tgllhr" name="tgllhr">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-body-secondary bg-success-subtle">
                    </div>
                </div>

                <div id="">
                    <div class="card">
                        <div class="card-header text-center text-white bg-success">
                            <b>DATA TUMOR</b>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header text-center bg-success-subtle">
                                            Form Pengkajian Awal Medis
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-4">
                                                    <label for="T" class="col-4 col-form-label">T</label>
                                                    <div class="col">
                                                        {{ $inputT }}
                                                        <input wire:model="inputT" type="text" class="form-control"
                                                            id="T">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="N" class="col-4 col-form-label">N</label>
                                                    <div class="col">
                                                        <input wire:model="inputN" type="text" class="form-control"
                                                            id="N">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="M" class="col-4 col-form-label">M</label>
                                                    <div class="col">
                                                        <input wire:model="inputM" type="text" class="form-control"
                                                            id="M">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="lateralitas"
                                                    class="col-5 col-form-label">Lateralitas</label>
                                                <div class="col">
                                                    <select class="form-select" id="lateralitas"
                                                        wire:model="input_lateralitas">
                                                        <option value="">Pilih</option>
                                                        @foreach ($lateralitass as $lateralitas)
                                                        <option value="{{ $lateralitas->kode }}">{{
                                                            $lateralitas->kode }} -
                                                            {{ $lateralitas->nama }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="stdm" class="col-5 col-form-label">Stadium</label>
                                                <div class="col">

                                                    <select class="form-select" id="stdm" wire:model="input_stadium">
                                                        <option value="">Pilih</option>
                                                        @foreach ($stadiums as $stadium)
                                                        <option value="{{ $stadium->kode }}">{{ $stadium->kode }} -
                                                            {{ $stadium->nama }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer py-1 text-body-secondary bg-success-subtle">
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header text-center bg-success-subtle">
                                            Form Pengisian Lab PA
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <label class="col-4 col-form-label">Topografi<span
                                                        class="text-danger"><b>*</b></span>
                                                    <div class="">
                                                        <i>(lokasi tumor)</i>
                                                    </div>
                                                </label>
                                                <div class="col">
                                                    <div wire:click="$emit('openModalTopography', 1)"
                                                        class="btn btn-light text-start border-secondary border-1 form-control">
                                                        @if($topographyCODE && $topographySTR)
                                                        <b>{{ $topographyCODE }}</b> - {{ $topographySTR }}
                                                        @else
                                                        Pilih
                                                        @endif
                                                    </div>
                                                    <span class="text-muted">ICD-0 Kode C</span>
                                                </div>
                                                <div>
                                                    <!-- Modal -->
                                                    <div class="modal modal-lg fade" id="topographyModal" tabindex="-1"
                                                        aria-labelledby="topographyModalLabel" aria-hidden="true"
                                                        wire:ignore.self>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="topographyModalLabel">
                                                                        Pilih Topography</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-2">
                                                                        <form wire:submit.prevent="cariTopography">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <input
                                                                                        wire:model.defer="inputCariTopography"
                                                                                        class="form-control" type="text"
                                                                                        placeholder="Cari..">
                                                                                </div>
                                                                                <div class="col-3 d-flex">
                                                                                    <button type="submit"
                                                                                        class="form-control me-1 btn bg-success text-white">Cari</button>
                                                                                    <button type="button"
                                                                                        wire:click="resetTopography"
                                                                                        class="form-control btn bg-secondary text-white">Reset</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="">
                                                                        <div class="table-responsive">
                                                                            <table
                                                                                class="table table-sm table-borderless table-bordered table-hover">
                                                                                <thead>
                                                                                    <th>CODE</th>
                                                                                    <th>STR</th>
                                                                                    <th>SAB</th>
                                                                                    <th></th>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($topographys as
                                                                                    $topography)
                                                                                    <tr>
                                                                                        <td>{{ $topography->CODE }}</td>
                                                                                        <td>{{ $topography->STR }}</td>
                                                                                        <td>{{ $topography->SAB }}</td>
                                                                                        <td>
                                                                                            <button type="button"
                                                                                                class="btn bg-success-subtle"
                                                                                                wire:click="pilihTopography('{{ $topography }}')">Pilih</button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="mt-1">
                                                                            <button wire:click="moreTopography"
                                                                                type="button"
                                                                                class="form-control btn bg-info-subtle">Lainnya</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    window.addEventListener('open-modal-topography', event => {
                                                            var myModal = new bootstrap.Modal(document.getElementById('topographyModal'));
                                                            myModal.show();
                                                        });

                                                        window.addEventListener('close-modal-topography', event => {
                                                            var myModal = bootstrap.Modal.getInstance(document.getElementById('topographyModal'));
                                                            myModal.hide();
                                                        });
                                                </script>

                                            </div>

                                            <div class="row mb-3">
                                                <label class="col-4 col-form-label">Morfologi<span
                                                        class="text-danger"><b>*</b></span>
                                                    <div class="">
                                                        <i>(jenis tumor)</i>
                                                    </div>
                                                </label>
                                                <div class="col">
                                                    <div wire:click="$emit('openModalMorphology', 1)"
                                                        class="btn btn-light text-start border-secondary border-1 form-control">
                                                        @if($morphologyCODE && $morphologySTR)
                                                        <b>{{ $morphologyCODE }}</b> - {{ $morphologySTR }}
                                                        @else
                                                        Pilih
                                                        @endif
                                                    </div>
                                                    <span class="text-muted">ICD-0 Kode M</span>
                                                </div>
                                                <div>
                                                    <!-- Modal -->
                                                    <div class="modal modal-lg fade" id="morphologyModal" tabindex="-1"
                                                        aria-labelledby="morphologyModalLabel" aria-hidden="true"
                                                        wire:ignore.self>
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="morphologyModalLabel">
                                                                        Pilih Morphology</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-2">
                                                                        <form wire:submit.prevent="cariMorphology">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <input
                                                                                        wire:model.defer="inputCariMorphology"
                                                                                        class="form-control" type="text"
                                                                                        placeholder="Cari..">
                                                                                </div>
                                                                                <div class="col-3 d-flex">
                                                                                    <button type="submit"
                                                                                        class="form-control me-1 btn bg-success text-white">Cari</button>
                                                                                    <button type="button"
                                                                                        wire:click="resetMorphology"
                                                                                        class="form-control btn bg-secondary text-white">Reset</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="">
                                                                        <div class="table-responsive">
                                                                            <table
                                                                                class="table table-sm table-borderless table-bordered table-hover">
                                                                                <thead>
                                                                                    <th>CODE</th>
                                                                                    <th>STR</th>
                                                                                    <th>SAB</th>
                                                                                    <th></th>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($morphologys as
                                                                                    $morphology)
                                                                                    <tr>
                                                                                        <td>{{ $morphology->CODE }}</td>
                                                                                        <td>{{ $morphology->STR }}</td>
                                                                                        <td>{{ $morphology->SAB }}</td>
                                                                                        <td>
                                                                                            <button type="button"
                                                                                                class="btn bg-success-subtle"
                                                                                                wire:click="pilihMorphology('{{ $morphology }}')">Pilih</button>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                        <div class="mt-1">
                                                                            <button wire:click="moreMorphology"
                                                                                type="button"
                                                                                class="form-control btn bg-info-subtle">Lainnya</button>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    window.addEventListener('open-modal-morphology', event => {
                                                            var myModal = new bootstrap.Modal(document.getElementById('morphologyModal'));
                                                            myModal.show();
                                                        });

                                                        window.addEventListener('close-modal-morphology', event => {
                                                            var myModal = bootstrap.Modal.getInstance(document.getElementById('morphologyModal'));
                                                            myModal.hide();
                                                        });
                                                </script>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="prlktmr" class="col-4 col-form-label">Perilaku
                                                    Tumor</label>
                                                <div class="col">
                                                    <select class="form-select" id="prlktmr"
                                                        wire:model.defer="input_perilaku">
                                                        <option value="">Pilih</option>
                                                        @foreach ($perilakus as $perilaku)
                                                        <option @if($input_perilaku==$perilaku->kode)
                                                            selected
                                                            @endif
                                                            value="{{ $perilaku->kode }}">{{ $perilaku->kode }}
                                                            - {{
                                                            $perilaku->nama
                                                            }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="grade" class="col-4 col-form-label">Grade<span
                                                        class="text-danger"><b>*</b></span></label>
                                                <div class="col">
                                                    <select class="form-select" id="grade" wire:model="input_grade">
                                                        <option value="">Pilih</option>
                                                        @foreach ($grades as $grade)
                                                        <option @if($input_grade==$grade->kode)
                                                            selected
                                                            @endif
                                                            value="{{ $grade->kode }}">{{ $grade->kode }} - {{
                                                            $grade->nama }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer py-1 text-body-secondary bg-success-subtle">
                                        </div>
                                    </div>
                                    <div class="card mt-2">
                                        <div class="card-header text-center bg-success-subtle">
                                            Form Pengkajian Expertise Radiologi
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <label for="metastasis" class="col col-form-label">Metastasis/Anak
                                                    Sebar
                                                    Jauh</label>
                                                <div class="">
                                                    @foreach ($metastasiss as $metastasis)
                                                    <div class="col">
                                                        <div class="d-flex align-items-center">
                                                            <input type="checkbox"
                                                                wire:model="input_metastasis.{{ $loop->index }}"
                                                                id="metastasis-{{ $loop->index }}"
                                                                value="{{ $metastasis->kode }}">
                                                            <label for="metastasis-{{ $loop->index }}" class="ms-2">{{
                                                                $metastasis->kode }} - {{
                                                                $metastasis->nama }}</label>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="pnybrn_sblm_trp" class="col-5 col-form-label">Penyebaran
                                                    tumor
                                                    sebelum
                                                    terapi
                                                    <div class="">
                                                        <i>(Clinical ext. of disease before treatment)</i>
                                                    </div>
                                                </label>
                                                <div class="col">
                                                    <select class="form-select" id="pnybrn_sblm_trp"
                                                        wire:model="input_penyebaran">
                                                        <option value="">Pilih</option>
                                                        @foreach ($penyebarans as $penyebaran)
                                                        <option value="{{ $penyebaran->kode }}">{{ $penyebaran->kode
                                                            }} -
                                                            {{ $penyebaran->nama }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="card-footer py-1 text-body-secondary bg-success-subtle">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header text-center bg-success-subtle">
                                            Form Pengkajian Awal Medis
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <div class="col-4">
                                                    <label for="T" class="col-4 col-form-label">T</label>
                                                    <div class="col">
                                                        <input wire:model="inputT" type="text" class="form-control"
                                                            id="T">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="N" class="col-4 col-form-label">N</label>
                                                    <div class="col">
                                                        <input wire:model="inputN" type="text" class="form-control"
                                                            id="N">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <label for="M" class="col-4 col-form-label">M</label>
                                                    <div class="col">
                                                        <input wire:model="inputM" type="text" class="form-control"
                                                            id="M">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="lateralitas"
                                                    class="col-5 col-form-label">Lateralitas</label>
                                                <div class="col">
                                                    <select class="form-select" id="lateralitas"
                                                        wire:model="input_lateralitas">
                                                        <option value="">Pilih</option>
                                                        @foreach ($lateralitass as $lateralitas)
                                                        <option value="{{ $lateralitas->kode }}">{{
                                                            $lateralitas->kode }} -
                                                            {{ $lateralitas->nama }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="stdm" class="col-5 col-form-label">Stadium</label>
                                                <div class="col">

                                                    <select class="form-select" id="stdm" wire:model="input_stadium">
                                                        <option value="">Pilih</option>
                                                        @foreach ($stadiums as $stadium)
                                                        <option value="{{ $stadium->kode }}">{{ $stadium->kode }} -
                                                            {{ $stadium->nama }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer py-1 text-body-secondary bg-success-subtle">
                                        </div>
                                    </div>
                                    <div class="card mt-2">
                                        <div class="card-header text-center bg-success-subtle">
                                            Form didefinisikan dari kungjungan
                                        </div>
                                        <div class="card-body">
                                            <div class="row mb-3">
                                                <label for="trp_plpr" class="col-5 col-form-label">Terapi di
                                                    institusi
                                                    pelapor
                                                    <div class="">
                                                        <i>(Treatment at reporting institution)</i>
                                                    </div>
                                                </label>
                                                <div class="col">
                                                    <select class="form-select" id="trp_plpr" wire:model="input_terapi">
                                                        <option value="">Pilih</option>
                                                        @foreach ($terapis as $terapi)
                                                        <option value="{{ $terapi->kode }}"> {{ $terapi->kode }} -
                                                            {{ $terapi->nama }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlTextarea1"
                                                    class="form-label">Kesimpulan</label>
                                                <textarea wire:model='inputKesimpulan' class="form-control"
                                                    id="exampleFormControlTextarea1" rows="3" id="ksmpln"
                                                    name="ksmpln"></textarea>
                                            </div>
                                        </div>
                                        <div class="card-footer py-1 text-body-secondary bg-success-subtle">
                                        </div>
                                    </div>




                                    <div class="row mb-3 mt-2">
                                        <label for="bss_dg_trvld" class="col-5 col-form-label">Basis diagnosis
                                            tervalid<span class="text-danger"><b>*</b></span></label>
                                        <div class="col">
                                            <select class="form-select" id="basisDiagnosaTervalid"
                                                wire:model="input_basisDiagnosaTervalids">
                                                <option value="">Pilih</option>
                                                @foreach ($basisDiagnosaTervalids as $basisDiagnosaTervalid)
                                                <option value="{{ $basisDiagnosaTervalid->kode }}">{{
                                                    $basisDiagnosaTervalid->kode }} -
                                                    {{ $basisDiagnosaTervalid->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tgl_dg" class="col-5 col-form-label">Tanggal Diagnosis</label>
                                        <div class="col">
                                            <input type="date" class="form-control" id="tgl_dg"
                                                wire:model="tgl_diagnosis">
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-body-secondary bg-success-subtle">
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


    <div class="container">
        <div>
            <br>
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
                                <th class="table-secondary"></th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($data_sumbers as $data_sumber) --}}
                            @foreach ($data_sumbers as $data_sumber)
                            @if($IDeditDataSumberPage === $data_sumber['ds_tgl_periksa'])
                            <tr>
                                <th scope="row"><input wire:model="eds_tgl_periksa" type="date" class="form-control"
                                        name="" id=""></th>
                                <td><input wire:model="eds_nama_rs" type="text" class="form-control"></td>
                                <td><input wire:model="eds_kode_rs" type="text" class="form-control"></td>
                                <td><input wire:model="eds_unit_id" type="text" class="form-control"></td>
                                <td><input wire:model="eds_unit" type="text" class="form-control"></td>
                                <td><input wire:model="eds_pa_lab" type="text" class="form-control"></td>
                                <td><button wire:click="editDataSumber" class="btn bg-success-subtle">Simpan</button>
                                </td>
                            </tr>
                            @else
                            <tr>
                                <th>
                                    {{ $data_sumber['ds_tgl_periksa'] }}
                                </th>
                                <td>{{ $data_sumber['ds_nama_rs'] }}</td>
                                <td>{{ $data_sumber['ds_kode_rs'] }}</td>
                                <td>{{ $data_sumber['ds_unit_id'] }}</td>
                                <td>{{ $data_sumber['ds_unit'] }}</td>
                                <td>{{ $data_sumber['ds_pa_lab'] }}</td>
                                <td class="d-flex">
                                    <button wire:click="editDataSumberPage('{{ $data_sumber['ds_tgl_periksa'] }}')"
                                        class="btn me-1 bg-warning-subtle">Edit</button>
                                    <button wire:click="hapusDataSumber('{{ $data_sumber['ds_tgl_periksa'] }}')"
                                        class="btn bg-danger-subtle">hapus</button>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            <tr>
                                <th scope="row"><input wire:model="ds_tgl_periksa" type="date" class="form-control"
                                        name="" id=""></th>
                                <td><input wire:model="ds_nama_rs" type="text" class="form-control"></td>
                                <td><input wire:model="ds_kode_rs" type="text" class="form-control"></td>
                                <td><input wire:model="ds_unit_id" type="text" class="form-control"></td>
                                <td><input wire:model="ds_unit" type="text" class="form-control"></td>
                                <td><input wire:model="ds_pa_lab" type="text" class="form-control"></td>
                                <td><button wire:click="createDataSumber" class="btn bg-success-subtle">Simpan</button>
                                </td>
                            </tr>
                            {{-- @endforeach --}}

                        </tbody>
                    </table>

                    <div class="row mb-3">
                        <label for="tglmasuk" class="col-sm-2 col-form-label">Tanggal Masuk</label>
                        <div class="col-2">
                            <input type="date" class="form-control" id="tglmasuk" wire:model="tgl_masuk">
                        </div>
                        <label for="nmregister" class="col-sm-2 col-form-label">Nama Register<span
                                class="text-danger"><b>*</b></span></label>
                        <div class="col-2">
                            <input type="text" class="form-control" id="nmregister" wire:model="nmregister">
                        </div>
                        <label for="nmregister" class="col-sm-2 col-form-label">Nama Verifikator</label>
                        <div class="col-2 ">
                            <input type="text" class="form-control" id="nmverifikator" wire:model="nmverifikator">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tglkontaktrkhir" class="col-sm-2 col-form-label">Tgl.kontak terakhir</label>
                        <div class="col-2">
                            <input type="date" class="form-control" id="tgl_kntk_trkhr"
                                wire:model="tgl_kontak_terakhir">
                        </div>
                        <label for="tglabstraksi" class="col-sm-2 col-form-label">Tgl.abstraksi</label>
                        <div class="col-2">
                            <input type="date" class="form-control" id="tglabstraksi" wire:model="tgl_abstraksi">
                        </div>
                        <label for="tglverifikator" class="col-sm-2 col-form-label">Tgl.verifikator</label>
                        <div class="col-2">
                            <input type="date" class="form-control" id="tglverifikator" wire:model="tgl_verifikator">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="stts" class="col-sm-2 col-form-label">Status hidup<span
                                class="text-danger"><b>*</b></span></label>
                        <div class="col-6 col-sm-3">
                            <select required wire:model="status_hidup" class="form-select" id="stts" name="stts">
                                <option value="">Pilih</option>
                                <option value="hidup">Hidup</option>
                                <option value="meninggal">Meninggal</option>
                                <option value="tidak diketahui">Tidak diketahui</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card d-flex card-footer text-body-secondary">

                </div>
            </div>
            <p class="text-center mt-3">
            <div class="" wire:loading wire:target="save()"><button type="button"
                    class="btn w-100 btn-warning">Loading</button></div>
            <div wire:target="save()" wire:loading.remove>
                <button wire:click="save" class="btn w-100 btn-success">Simpan</button>
            </div>
            </p>
        </div>
    </div>
</div>
