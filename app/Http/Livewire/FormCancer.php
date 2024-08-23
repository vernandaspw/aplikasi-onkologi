<?php

namespace App\Http\Livewire;

use App\Models\BasisDiagnosaTervalid;
use App\Models\Grade;
use App\Models\Lateralitas;
use App\Models\Metastasis;
use App\Models\Pasien;
use App\Models\Penyebaran;
use App\Models\PerilakuTumor;
use App\Models\Stadium;
use App\Models\TerapiDiinstitusiPelapor;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormCancer extends Component
{
    public function render()
    {
        return view('livewire.form-cancer')->extends('layouts.app')->section('content');
    }

    public $norm;
    public $pasien, $nik;
    public function mount($norm)
    {
        $this->norm = $norm;
        $this->pasien = Pasien::where('MedicalNo', $norm)->first();
        // $this->nik = $this->pasien->SSN;
        $this->fetch();
    }

    public $input_perilaku, $input_grade, $input_basisDiagnosaTervalids, $input_stadium, $input_penyebaran, $input_terapi, $input_lateralitas, $input_metastasis;

    public $perilakus = [], $grades = [], $basisDiagnosaTervalids = [], $stadiums = [], $penyebarans = [], $terapis = [], $lateralitass = [], $metastasiss = [];
    public function fetch()
    {
        $this->perilakus = PerilakuTumor::orderBy('kode', 'asc')->get();
        $this->grades = Grade::orderBy('kode', 'asc')->get();
        $this->basisDiagnosaTervalids = BasisDiagnosaTervalid::orderBy('kode', 'asc')->get();
        $this->stadiums = Stadium::orderBy('kode', 'asc')->get();
        $this->penyebarans = Penyebaran::orderBy('kode', 'asc')->get();
        $this->terapis = TerapiDiinstitusiPelapor::orderBy('kode', 'asc')->get();
        $this->lateralitass = Lateralitas::orderBy('kode', 'asc')->get();
        $this->metastasiss = Metastasis::orderBy('kode', 'asc')->get();
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        redirect('login');
    }

    public function save()
    {
        dd($this->input_metastasis);
    }
}
