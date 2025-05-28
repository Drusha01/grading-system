<?php

namespace App\Livewire\Admin\EnrolledStudent;

use Livewire\Component;

class ViewEnrolledStudent extends Component
{
    public $title = "Enrolled-student";

    public $route = "enrolled-student";
    public function render()
    {
        return view('livewire.admin.enrolled-student.view-enrolled-student');
    }
}
