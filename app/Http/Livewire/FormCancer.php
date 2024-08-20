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
        $this->perilakus = PerilakuTumor::orderBy('nama', 'asc')->get();
        $this->grades = Grade::orderBy('nama', 'asc')->get();
        $this->basisDiagnosaTervalids = BasisDiagnosaTervalid::orderBy('nama', 'asc')->get();
        $this->stadiums = Stadium::orderBy('nama', 'asc')->get();
        $this->penyebarans = Penyebaran::orderBy('nama', 'asc')->get();
        $this->terapis = TerapiDiinstitusiPelapor::orderBy('nama', 'asc')->get();
        $this->lateralitass = Lateralitas::orderBy('nama', 'asc')->get();
        $this->metastasiss = Metastasis::orderBy('nama', 'asc')->get();
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
