<?php

namespace App\Livewire\Admin\Schedule;

use Livewire\Component;

class DeleteSchedule extends Component
{
    public $title = "Schedule";

    public $route = "schedule";
    public function render()
    {
        return view('livewire.admin.schedule.delete-schedule');
    }
}
