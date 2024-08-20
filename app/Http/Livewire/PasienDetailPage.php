<?php

namespace App\Http\Livewire;

use App\Models\Pasien;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PasienDetailPage extends Component
{
    public function render()
    {
        return view('livewire.pasien-detail-page')->extends('layouts.app')->section('content');
    }

    public $norm, $nama;
    public function mount($norm)
    {
        $this->norm = $norm;
        $pasien = Pasien::where('MedicalNo', $norm)->first();
        $this->nama = $pasien->PatientName;
        $this->fetch();
    }

    public $pasienRegs = [];
    public function fetch()
    {
        $this->pasienRegs = Pasien::PatientRegs($this->norm);

    }


}
