<?php

namespace App\Livewire\Admin\EnrolledStudent;

use Livewire\Component;

class ActivateEnrolledStudent extends Component
{
    public $title = "Enrolled-student";

    public $route = "enrolled-student";
    public function render()
    {
        return view('livewire.admin.enrolled-student.activate-enrolled-student');
    }
}
