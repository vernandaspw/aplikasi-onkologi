<?php

namespace App\Http\Livewire;

use App\Models\BasisDiagnosaTervalid;
use App\Models\DataSumber;
use App\Models\DataTumor;
use App\Models\DataTumorMetastasis;
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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FormCancer extends Component
{
    public function render()
    {
        return view('livewire.form-cancer')->extends('layouts.app')->section('content');
    }

    public $norm;
    public $pasien, $nik;
    public $noreg;
    protected $queryString = [
        'norm' => ['except' => ''],
        'noreg' => ['except' => ''],
    ];
    public $data_sumbers = [];
    public $IDeditDataSumberPage;
    public $ds_tgl_periksa, $ds_nama_rs, $ds_kode_rs, $ds_unit_id, $ds_unit, $ds_pa_lab;
    public $eds_tgl_periksa, $eds_nama_rs, $eds_kode_rs, $eds_unit_id, $eds_unit, $eds_pa_lab;
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

    public $topographys = [];

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
    public $topographyCODE;
    public $topographySTR;
    public function pilihTopography($topography)
    {
        $t = json_decode($topography);

        $this->topographyCODE = $t->CODE;
        $this->topographySTR = $t->STR;
        $this->dispatchBrowserEvent('close-modal-topography');
    }

    public $morphologys = [];

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
    public $morphologyCODE;
    public $morphologySTR;
    public function pilihMorphology($morphology)
    {
        $t = json_decode($morphology);

        $this->morphologyCODE = $t->CODE;
        $this->morphologySTR = $t->STR;
        $this->dispatchBrowserEvent('close-modal-morphology');
    }

    public $inputT, $inputN, $inputM, $inputKesimpulan;
    public $tgl_diagnosis, $tgl_masuk, $tgl_verifikator, $tgl_kontak_terakhir, $tgl_abstraksi;
    public $nmregister, $nmverifikator, $status_hidup;

    public function save()
    {
        // dd([
        //     $this->norm,
        //     $this->pasien->SSN,
        //     $this->topographyCODE,
        //     $this->morphologyCODE,
        //     $this->input_perilaku,
        //     $this->input_grade,
        //     'metas' => $this->input_metastasis,
        //     $this->input_penyebaran,
        //     $this->inputT,
        //     $this->inputN,
        //     $this->inputM,
        //     $this->input_lateralitas,
        //     $this->input_stadium,
        //     $this->input_terapi,
        //     $this->inputKesimpulan,
        //     $this->input_basisDiagnosaTervalids,
        //     $this->tgl_diagnosis,
        //     $this->tgl_masuk,
        //     $this->nmregister,
        //     $this->nmverifikator,
        //     $this->tgl_kontak_terakhir,
        //     $this->tgl_abstraksi,
        //     $this->tgl_verifikator,
        //     $this->status_hidup,
        // ]);
        try {
            DB::beginTransaction();

            $d = new DataTumor();
            $d->noreg = $this->noreg;
            $d->norm = $this->norm;
            $d->nik = $this->pasien->SSN;
            $d->topography_kode = $this->topographyCODE;
            $d->morphology_kode = $this->morphologyCODE;
            $d->perilaku_kode = $this->input_perilaku;
            $d->grade_kode = $this->input_grade;
            $d->basis_diagnosis_tervalid_kode = $this->input_basisDiagnosaTervalids;
            $d->stadium_kode = $this->input_stadium;
            $d->penyebaran_kode = $this->input_penyebaran;
            $d->t = $this->inputT;
            $d->n = $this->inputN;
            $d->m = $this->inputM;
            $d->terapi_diinstitusi_kode = $this->input_terapi;
            $d->lateralitas_kode = $this->input_lateralitas;
            $d->tgl_diagnosa = $this->tgl_diagnosis;
            $d->kesimpulan = $this->inputKesimpulan;
            $d->tgl_masuk = $this->tgl_masuk;
            $d->tgl_kontak_terakhir = $this->tgl_kontak_terakhir;
            $d->status_hidup = $this->status_hidup;
            $d->nama_registrasi = $this->nmregister;
            $d->tgl_abstraksi = $this->tgl_abstraksi;
            $d->nama_verifikator = $this->nmverifikator;
            $d->tgl_verifikasi = $this->tgl_verifikator;
            $d->save();

            if ($d) {
                foreach ($this->input_metastasis as $im) {
                    // $cm = Metastasis::where('id', $im)->first();
                    $dtm = new DataTumorMetastasis();
                    $dtm->kode = $im;
                    $dtm->save();
                }
            }
            // dd($this->data_sumbers);
            if ($this->data_sumbers) {
                foreach ($this->data_sumbers as $ds_item) {
                    $ds = new DataSumber();
                    $ds->norm = $this->norm;
                    $ds->nik = $this->nik;
                    $ds->tgl_periksa = $ds_item['ds_tgl_periksa'];
                    $ds->kode_rs = $ds_item['ds_kode_rs'];
                    $ds->nama_rs = $ds_item['ds_nama_rs'];
                    $ds->unit_id = $ds_item['ds_unit_id'];
                    $ds->unit = $ds_item['ds_unit'];
                    $ds->no_pa_lab = $ds_item['ds_pa_lab'];
                    $ds->save();
                }
            }
            DB::commit();
            $this->emit('success', 'berhasil disimpan');
            redirect('pasien-regs/' . $this->norm);
        } catch (\Throwable $e) {
            DB::rollBack();
            dd($e);
        }
    }


}
