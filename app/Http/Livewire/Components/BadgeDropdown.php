<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class BadgeDropdown extends Component
{
    public $width;
    public $options;
    public $selected;
    public $show = false;
    public $style;
    public $onSelect;
    public $data;

    public function mount($options, $selected = null)
    {
        $this->options = $options;
        $this->selected = $selected;
    }

    public function select($option)
    {
        if ($this->onSelect) {
            $this->emitUp($this->onSelect, $this->data, $option);
        }

        $this->toggle();
    }

    public function toggle()
    {
        $this->show = !$this->show;
    }


    public function render()
    {
        return view('livewire.components.badge-dropdown');
    }
}
