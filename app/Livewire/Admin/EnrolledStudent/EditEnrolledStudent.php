<?php

namespace App\Livewire\Admin\EnrolledStudent;

use Livewire\Component;

class EditEnrolledStudent extends Component
{
    public $title = "Enrolled-student";

    public $route = "enrolled-student";
    public function render()
    {
        return view('livewire.admin.enrolled-student.edit-enrolled-student');
    }
}
