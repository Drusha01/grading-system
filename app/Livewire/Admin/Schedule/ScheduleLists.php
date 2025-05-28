<?php

namespace App\Livewire\Admin\Schedule;

use Livewire\Component;

class ScheduleLists extends Component
{
    public $title = "Schedule";

    public $route = "schedule";
    public function render()
    {
        return view('livewire.admin.schedule.schedule-lists')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
