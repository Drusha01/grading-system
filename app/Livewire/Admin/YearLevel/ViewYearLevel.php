<?php

namespace App\Livewire\Admin\YearLevel;

use Livewire\Component;

class ViewYearLevel extends Component
{
    public $title = "Year Level";

    public function render()
    {
        return view('livewire.admin.year-level.view-year-level')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
