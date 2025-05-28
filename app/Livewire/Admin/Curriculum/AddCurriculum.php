<?php

namespace App\Livewire\Admin\Curriculum;

use Livewire\Component;

class AddCurriculum extends Component
{
    public $title = "Curriculum";

    public $route = "curriculum";
    public function render()
    {
        return view('livewire.admin.curriculum.add-curriculum');
    }
}
