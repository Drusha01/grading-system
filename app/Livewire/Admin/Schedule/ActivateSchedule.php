<?php

namespace App\Livewire\Admin\Schedule;

use Livewire\Component;

class ActivateSchedule extends Component
{
    public $title = "Schedule";

    public $route = "schedule";
    public function render()
    {
        return view('livewire.admin.schedule.activate-schedule');
    }
}
