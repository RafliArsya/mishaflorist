<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class AccountDropdown extends Component
{
    public bool $showDropdown = false;

    public function toggleDropdown()
    {
        $this->showDropdown = !$this->showDropdown;
    }

    public function logout()
    {
        if (auth()->check()) auth()->logout();

        session()->invalidate();

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.components.account-dropdown');
    }
}
