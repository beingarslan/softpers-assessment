<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SingleFile extends Component
{

    public $file;

    public function mount($file){
        $this->file = $file;
    }
    public function render()
    {
        return view('livewire.single-file');
    }
}
