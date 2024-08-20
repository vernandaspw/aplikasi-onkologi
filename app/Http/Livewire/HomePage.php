<?php

namespace App\Http\Livewire;

use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page')->extends('layouts.app')->section('content');
    }

    public function mount()
    {
        $this->fetch();
    }

    public $pasiens = [];
    public $cariNorm, $take = 15;
    public function query()
    {
        return [
            'take' => $this->take,
        ];
    }

    public $pasiens_count = 0;
    public function fetch()
    {
        $this->pasiens_count = Pasien::patientCancers()->count();
        $this->pasiens = Pasien::patientCancers($this->query());
    }

    public $pasienResults = [];

    public function cariNorm()
    {
        // dd($this->cariNorm);
        if ($this->cariNorm) {
            $this->pasienResults = Pasien::where('MedicalNo', $this->cariNorm)->get();
            $this->pasiens = [];
        } else {
            $this->pasienResults = [];
            $this->fetch();
        }
    }

    public function resetInput()
    {
        $this->cariNorm = null;
        $this->pasienResults = [];
        $this->fetch();
    }

    public function more()
    {
        $this->take += 15;
        $this->fetch();
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        redirect('login');
    }
}
