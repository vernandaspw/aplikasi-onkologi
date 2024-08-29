<?php

namespace App\Http\Livewire;

use App\Models\DataTumor;
use App\Models\Pasien;
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

    public function aUnVerify($id)
    {
        try {
            $d = DataTumor::where('id', $id)->first();
            $d->nama_verifikator = null;
            $d->tgl_verifikasi = null;
            $d->save();
            $this->emit('success', 'berhasil un verifikasi');
            redirect('pasien-regs/' . $this->norm);
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

    public function aVerify($id)
    {
        try {
            $d = DataTumor::where('id', $id)->first();
            $d->nama_verifikator = auth()->user()->username;
            $d->tgl_verifikasi = date('Y-m-d');
            $d->save();
            $this->emit('success', 'berhasil verifikasi');
            redirect('pasien-regs/' . $this->norm);
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }

}
