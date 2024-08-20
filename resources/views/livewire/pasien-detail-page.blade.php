<div>
    <div class="container mt-4">
        <div class="container-fluid shadow p-3 rounded-pill bg-success">
            <div class="d-flex justify-content-between align-items-center">

                <div class=""></div>
                <div class="">
                    <span class="text-white mb-0 h6"><b>LIST REGIS PASIEN KANKER</b></span>
                </div>
                {{-- <button onclick="confirm('Anda yakin?') || event.stopImmediatePropagation()" wire:click="logout"
                    class="btn bg-danger text-white rounded-pill">
                    Logout
                </button> --}}
                <a href="{{ url('/') }}" class="btn bg-white rounded-pill">
                    Kembali
                </a>
            </div>
        </div>
        <br>
    </div>

    <div class="container">
        {{-- <div class="mb-2">
            <div class="row">
                <form wire:submit.prevent='cariNorm()'>
                    <div class="col-md-4 d-flex align-items-center">
                        <input type="text" wire:model.defer="cariNorm" class="form-control rounded-0"
                            placeholder="Cari Nomor Rekam Medis">
                        <button type="submit" class="btn btn-success rounded-0">Cari</button>
                        <button wire:click="resetInput()" type="button"
                            class="btn btn-secondary rounded-0">Reset</button>
                    </div>
                </form>
            </div>
        </div> --}}

        <div class="card shadow-sm p-3 border-1">
            <div class="card-title">
                <div class="">
                    NoRM : <b>{{ $norm }}</b>
                </div>
                <div class="">
                    Nama : <b>{{ $nama }}</b>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NO Registration</th>
                            <th scope="col">Tgl Visited</th>
                            <th scope="col">Formulir</th>
                            <th>Telah di isi</th>
                            <th>Verifikasi</th>
                            <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($pasienRegs as $pasienReg)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pasienReg->RegistrationNo }}</td>
                                <td>{{ $pasienReg->last_visit }}</td>
                                <td>
                                    <a class="button" href="{{ url('form-cancer', $norm) }}">Formulir</a>
                                </td>
                                <td>
                                    <div class="badge bg-success">Sudah</div>
                                    <div class="badge bg-danger">Belum</div>
                                </td>
                                <td>
                                    <div class="badge bg-success">Verified</div>
                                    <div class="badge bg-danger">UnVerified</div>
                                </td>

                                <td>
                                    <button class="btn btn-sm btn-success me-1"
                                        onclick="confirm('Verifikasi formulir ini?') || event.stopImmediatePropagation()">Verify</button>
                                    <button class="btn btn-sm btn-danger me-1"
                                        onclick="confirm('Verifikasi formulir ini?') || event.stopImmediatePropagation()">UnVerify</button>


                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
