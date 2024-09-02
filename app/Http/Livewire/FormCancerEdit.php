<?php

namespace App\Http\Livewire;

use App\Models\BasisDiagnosaTervalid;
use App\Models\DataSumber;
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
    public $tes;

    public $topographys = [], $morphologys = [];
    public $perilakus = [], $grades = [], $metastasiss = [], $penyebarans = [], $lateralitass = [], $stadiums = [], $terapis = [], $basisDiagnosaTervalids = [], $data_sumbers = [];

    public $tgl_masuk;
    public $nmregister;
    public $topographyCODE, $topographySTR, $morphologyCODE, $morphologySTR;
    public $input_perilaku, $input_grade, $input_lateralitas, $input_stadium, $input_penyebaran, $input_terapi, $inputKesimpulan, $input_basisDiagnosaTervalids;
    public $inputT, $inputN, $inputM;
    public $input_metastasis;
    public $tgl_diagnosis;
    public $dataTumor;
    public $dpjp;

    public function mount()
    {
        // dd($this->noreg, $this->norm);
        $reg = Registration::where('RegistrationNo', $this->noreg)->first();
        // dd($reg);
        $this->tgl_masuk = Carbon::parse($reg->RegistrationDateTime)->format('Y-m-d');
        $this->nmregister = $reg->LastUpdatedBy;
        $this->pasien = Pasien::where('MedicalNo', $this->norm)->first();

        $this->nik = $this->pasien->SSN;
        $this->dpjp = $reg->paramedic->ParamedicName;

        $this->fetch();

        //    dd($this->inputT);
    }

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
        // dd($this->inputT);
        $this->inputN = $dataTumor->n;
        $this->inputM = $dataTumor->m;
        $this->input_lateralitas = $dataTumor->lateralitas_kode;
        $this->input_stadium = $dataTumor->stadium_kode;
        $this->input_penyebaran = $dataTumor->penyebaran_kode;
        $this->input_terapi = $dataTumor->terapi_diinstitusi_kode;
        $this->inputKesimpulan = $dataTumor->kesimpulan;

        $this->input_basisDiagnosaTervalids = $dataTumor->basis_diagnosis_tervalid_kode;
        $this->tgl_diagnosis = Carbon::parse($dataTumor->tgl_diagnosa)->format('Y-m-d');
        foreach ($dataTumor->dataTumorMetastasis as $itemDTM) {
            $this->input_metastasis[] = $itemDTM->kode;
        }

        $this->loadDataSumber();
    }

    protected $listeners = ['openModalTopography' => 'loadTopography',
        'openModalMorphology' => 'loadMorphology',
    ];

    public function loadTopography()
    {
        $this->topographys = Topography::take($this->takeTopography)->get();

        $this->dispatchBrowserEvent('open-modal-topography');
    }

    public function resetTopography()
    {
        $this->topographys = Topography::take($this->takeTopography)->get();
    }

    public $inputCariTopography;
    public function cariTopography()
    {
        $t = Topography::query();
        $this->topographys = $t->where('CODE', 'like', '%' . $this->inputCariTopography . '%')
            ->orWhere('STR', 'like', '%' . $this->inputCariTopography . '%')
            ->orWhere('SAB', 'like', '%' . $this->inputCariTopography . '%')
            ->take($this->takeTopography)->get();
    }

    public $takeTopography = 20;
    public function moreTopography()
    {
        $this->takeTopography += 20;
        $t = Topography::query();

        if ($this->inputCariTopography) {
            $t->where('CODE', 'like', '%' . $this->inputCariTopography . '%')
                ->orWhere('STR', 'like', '%' . $this->inputCariTopography . '%')
                ->orWhere('SAB', 'like', '%' . $this->inputCariTopography . '%');
        }

        $this->topographys = $t->take($this->takeTopography)->get();
    }

    public function pilihTopography($topography)
    {
        $t = json_decode($topography);

        $this->topographyCODE = $t->CODE;
        $this->topographySTR = $t->STR;
        $this->dispatchBrowserEvent('close-modal-topography');
    }

    public function loadMorphology()
    {
        $this->morphologys = Morphology::take($this->takeMorphology)->get();

        $this->dispatchBrowserEvent('open-modal-morphology');
    }

    public function resetMorphology()
    {
        $this->morphologys = Morphology::take($this->takeMorphology)->get();
    }

    public $inputCariMorphology;
    public function cariMorphology()
    {
        $t = Morphology::query();
        $this->morphologys = $t->where('CODE', 'like', '%' . $this->inputCariMorphology . '%')
            ->orWhere('STR', 'like', '%' . $this->inputCariMorphology . '%')
            ->orWhere('SAB', 'like', '%' . $this->inputCariMorphology . '%')
            ->take($this->takeMorphology)->get();
    }

    public $takeMorphology = 20;
    public function moreMorphology()
    {
        $this->takeMorphology += 20;
        $t = Morphology::query();

        if ($this->inputCariMorphology) {
            $t->where('CODE', 'like', '%' . $this->inputCariMorphology . '%')
                ->orWhere('STR', 'like', '%' . $this->inputCariMorphology . '%')
                ->orWhere('SAB', 'like', '%' . $this->inputCariMorphology . '%');
        }

        $this->morphologys = $t->take($this->takeMorphology)->get();
    }
    public function pilihMorphology($morphology)
    {
        $t = json_decode($morphology);

        $this->morphologyCODE = $t->CODE;
        $this->morphologySTR = $t->STR;
        $this->dispatchBrowserEvent('close-modal-morphology');
    }

    public $IDeditDataSumberPage;
    public $ds_tgl_periksa, $ds_nama_rs, $ds_kode_rs, $ds_unit_id, $ds_unit, $ds_pa_lab;
    public $eds_tgl_periksa, $eds_nama_rs, $eds_kode_rs, $eds_unit_id, $eds_unit, $eds_pa_lab;

    public function loadDataSumber()
    {
        $this->data_sumbers = DataSumber::where('norm', $this->norm)->orWhere('nik', $this->nik)->get();
    }

    public function createDataSumber()
    {
        $this->data_sumbers[] = [
            'ds_tgl_periksa' => $this->ds_tgl_periksa,
            'ds_nama_rs' => $this->ds_nama_rs,
            'ds_kode_rs' => $this->ds_kode_rs,
            'ds_unit_id' => $this->ds_unit_id,
            'ds_unit' => $this->ds_unit,
            'ds_pa_lab' => $this->ds_pa_lab,
        ];
        $this->ds_tgl_periksa = null;
        $this->ds_nama_rs = null;
        $this->ds_kode_rs = null;
        $this->ds_unit_id = null;
        $this->ds_unit = null;
        $this->ds_pa_lab = null;
    }

    public function editDataSumberPage($tgl)
    {

        $this->IDeditDataSumberPage = $tgl;

        foreach ($this->data_sumbers as $index => $data_sumber) {
            if ($data_sumber['ds_tgl_periksa'] === $tgl) {
                $this->eds_tgl_periksa = $data_sumber['ds_tgl_periksa'];
                $this->eds_nama_rs = $data_sumber['ds_nama_rs'];
                $this->eds_kode_rs = $data_sumber['ds_kode_rs'];
                $this->eds_unit_id = $data_sumber['ds_unit_id'];
                $this->eds_unit = $data_sumber['ds_unit'];
                $this->eds_pa_lab = $data_sumber['ds_pa_lab'];
                break;
            }
        }
    }
    public function editDataSumber()
    {
        foreach ($this->data_sumbers as $index => $data_sumber) {
            if ($data_sumber['ds_tgl_periksa'] === $this->IDeditDataSumberPage) {
                $this->data_sumbers[$index] = [
                    'ds_tgl_periksa' => $this->eds_tgl_periksa,
                    'ds_nama_rs' => $this->eds_nama_rs,
                    'ds_kode_rs' => $this->eds_kode_rs,
                    'ds_unit_id' => $this->eds_unit_id,
                    'ds_unit' => $this->eds_unit,
                    'ds_pa_lab' => $this->eds_pa_lab,
                ];
                break;
            }
        }
        $this->IDeditDataSumberPage = null;
        $this->eds_tgl_periksa = null;
        $this->eds_nama_rs = null;
        $this->eds_kode_rs = null;
        $this->eds_unit_id = null;
        $this->eds_unit = null;
        $this->eds_pa_lab = null;
    }
    public function hapusDataSumber($tgl)
    {
        foreach ($this->data_sumbers as $index => $data_sumber) {
            if ($data_sumber['ds_tgl_periksa'] === $tgl) {
                unset($this->data_sumbers[$index]);
                // Mengatur ulang array agar indeks tetap berurutan
                $this->data_sumbers = array_values($this->data_sumbers);
                break;
            }
        }
    }

}
