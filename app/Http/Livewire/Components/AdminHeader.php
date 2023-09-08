<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class AdminHeader extends Component
{
    public $title;

    public function mount($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.components.admin-header', ['title' => $this->title]);
    }
}
