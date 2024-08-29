<?php

namespace App\Http\Livewire;

use App\Models\BasisDiagnosaTervalid;
use App\Models\DataTumor;
use App\Models\Grade;
use App\Models\Lateralitas;
use App\Models\Metastasis;
use App\Models\Morphology;
use App\Models\Pasien;
use App\Models\Penyebaran;
use App\Models\PerilakuTumor;
use App\Models\Registration;
use App\Models\Stadium;
use App\Models\TerapiDiinstitusiPelapor;
use App\Models\Topography;
use Carbon\Carbon;
use Livewire\Component;

class FormCancerEdit extends Component
{
    public function render()
    {
        return view('livewire.form-cancer-edit')->extends('layouts.app')->section('content');
    }

    public $norm;
    public $pasien, $nik;
    public $noreg;
    protected $queryString = [
        'norm' => ['except' => ''],
        'noreg' => ['except' => ''],
    ];

    public $topographys = [], $morphologys = [];
    public $perilakus = [], $grades = [], $metastasiss = [], $penyebarans = [], $lateralitass = [], $stadiums = [], $terapis = [], $basisDiagnosaTervalids = [], $data_sumbers = [];

    public $tgl_masuk;
    public $nmregister;
    public $topographyCODE, $topographySTR, $morphologyCODE, $morphologySTR;
    public $input_perilaku, $input_grade, $input_lateralitas;
    public $inputT, $inputN, $inputM;

    // public $dataTumor;

    public function mount()
    {
        // dd($this->noreg, $this->norm);
        $reg = Registration::where('RegistrationNo', $this->noreg)->first();
        // dd($reg);
        $this->tgl_masuk = Carbon::parse($reg->RegistrationDateTime)->format('Y-m-d');
        $this->nmregister = $reg->LastUpdatedBy;
        $this->pasien = Pasien::where('MedicalNo', $this->norm)->first();
        // $this->nik = $this->pasien->SSN;

        $this->fetch();
    }

    public $aa;

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

        $dataTumor = DataTumor::where('norm', $this->norm)->where('noreg', $this->noreg)->first();
        $topography = Topography::where('code', $dataTumor->topography_kode)->first();
        $this->topographyCODE = $topography->CODE;
        $this->topographySTR = $topography->STR;

        $morphology = Morphology::where('code', $dataTumor->morphology_kode)->first();
        $this->morphologyCODE = $morphology->CODE;
        $this->morphologySTR = $morphology->STR;

        $this->input_perilaku = $dataTumor->perilaku_kode;
        $this->input_grade = $dataTumor->grade_kode;
        $this->inputT = $dataTumor->t;
        $this->inputN = $dataTumor->n;
        $this->inputM = $dataTumor->m;
        $this->input_lateralitas = $dataTumor->lateralitas_kode;
    }
}
