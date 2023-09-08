<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        if (!auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->password = '';

            throw ValidationException::withMessages([
                'credentials' => 'Invalid credentials.'
            ]);
        }

        session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function render()
    {
        return view('livewire.admin.login')->layout('layouts.auth', ['title' => 'Login']);
    }
}
