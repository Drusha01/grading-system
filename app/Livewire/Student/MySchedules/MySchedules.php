<?php

namespace App\Livewire\Student\MySchedules;

use Livewire\Component;

class MySchedules extends Component
{
    public $title = "My Schedules";

    public $route = "my-schedules";
    public function render()
    {
        return view('livewire.student.my-schedules.my-schedules')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
