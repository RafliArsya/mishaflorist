<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use Tanthammar\LivewireWindowSize\HasBreakpoints;

class AdminSidebar extends Component
{
    public bool $showSidebar = false;

    public function toggleSidebar()
    {
        $this->showSidebar = !$this->showSidebar;
    }

    public function render()
    {
        return view('livewire.components.admin-sidebar');
    }
}
