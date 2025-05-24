<?php

namespace App\Livewire\Admin\YearLevel;

use Livewire\Component;

class YearLevelLists extends Component
{
    public $title = "Year Level";

    public function render()
    {
        return view('livewire.admin.year-level.year-level-lists')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
