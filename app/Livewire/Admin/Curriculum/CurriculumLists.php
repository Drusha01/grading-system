<?php

namespace App\Livewire\Admin\Curriculum;

use Livewire\Component;

class CurriculumLists extends Component
{
    public $title = "Curriculum";

    public $route = "curriculum";

    public function render()
    {
        return view('livewire.admin.curriculum.curriculum-lists')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
