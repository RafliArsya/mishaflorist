<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Header extends Component
{
    public bool $visibleOnScroll = false;
    public bool $showSidebar = false;

    public function toggleSidebar()
    {
        $this->showSidebar = !$this->showSidebar;
    }

    public function render()
    {
        return view('livewire.components.header');
    }
}
