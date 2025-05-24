<?php

namespace App\Livewire\Admin\YearLevel;

use Livewire\Component;

class EditYearLevel extends Component
{
    public $title = "Year Level";

    public function render()
    {
        return view('livewire.admin.year-level.edit-year-level')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
