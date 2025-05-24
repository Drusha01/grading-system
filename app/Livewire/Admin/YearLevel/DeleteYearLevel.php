<?php

namespace App\Livewire\Admin\YearLevel;

use Livewire\Component;

class DeleteYearLevel extends Component
{
    public $title = "Year Level";
    public function render()
    {
        return view('livewire.admin.year-level.delete-year-level')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
