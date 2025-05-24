<?php

namespace App\Livewire\Admin\YearLevel;

use Livewire\Component;

class AddYearLevel extends Component
{
    public $title = "Year Level";

    public function render()
    {
        return view('livewire.admin.year-level.add-year-level')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
