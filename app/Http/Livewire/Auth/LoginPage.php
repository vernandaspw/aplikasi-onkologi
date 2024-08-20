<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginPage extends Component
{
    public function render()
    {
        return view('livewire.auth.login-page')->extends('layouts.app')->section('content');
    }

    public $username, $password;
    public function login()
    {

        try {
            $this->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $u = User::where('username', $this->username)->first();

            if (!$u) {
                return $this->emit('error', 'username tidak ditemukan');
            }

            if (!Hash::check($this->password, $u->password)) {
                return $this->emit('error', 'password salah');
            }

            if ($u->isaktif == false) {
                return $this->emit('error', 'status akun tidak aktif');
            }

            Auth::login($u, true);

            redirect('/');

        } catch (\Throwable $e) {

            return $this->emit('error', $e->getMessage());
        }

    }
}
