<div>
    <div class="container mt-4">
        <div class="container-fluid shadow p-3 rounded-pill bg-success">
            <div class="d-flex justify-content-between align-items-center">
                {{-- <a href="{{ url('form-cancer', []) }}" class="btn bg-white rounded-pill">
                    Buat Form
                </a> --}}
                <div class=""></div>
                <div class="">
                    <span class="text-white mb-0 h6"><b>DAFTAR PASIEN INDIKASI KANKER</b></span>
                </div>
                <button onclick="confirm('Anda yakin?') || event.stopImmediatePropagation()" wire:click="logout"
                    class="btn bg-danger text-white rounded-pill">
                    Logout
                </button>
            </div>
        </div>
        <br>
    </div>

    <div class="container">
        <div class="mb-2">
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
        </div>
        @if ($cariNorm)
            <div class="card shadow-sm border-1">
                <div class="card-header">
                    hasil Pencarian
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NOMOR REKAM MEDIS</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($pasiens) --}}
                            {{-- @if ($pasiens)



                        @endif --}}
                            @foreach ($pasienResults as $pasienR)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $pasienR->MedicalNo }}</td>
                                    <td>{{ $pasienR->PatientName }}</td>
                                    <td><a class="button" href="Cancer Form.html">Detil</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        @else
            <div class="card shadow-sm border-1">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NOMOR REKAM MEDIS</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">LAST VISIT</th>
                                <th scope="col">Menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($pasiens) --}}
                            @if ($pasiens)
                                @foreach ($pasiens as $pasien)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $pasien->MedicalNo }}</td>
                                        <td>{{ $pasien->PatientName }}</td>
                                        <td>{{ $pasien->last_visit }}</td>
                                        <td><a class="button"
                                                href="{{ url('pasien-regs', $pasien->MedicalNo) }}">Detil</a></td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="">

                        <div wire:loading wire:target="more" class="w-100">
                            <button type="button"
                                class="btn form-control bg-warning-subtle d-flex align-items-center justify-content-center">
                                <div class="spinner-border bg-white me-2" role="status">
                                </div>
                                Loading..
                            </button>
                        </div>
                        {{-- {{ $pasiens_count }} --}}
                        @if ($pasiens_count > $take)
                            <div wire:loading.remove wire:target='more'>
                                <button type="button" wire:click="more"
                                    class="btn form-control py-2 bg-success-subtle">Lainnya</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
