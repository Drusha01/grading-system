<?php

namespace App\Livewire\Admin\EnrolledStudent;

use Livewire\Component;

class EnrolledStudentLists extends Component
{
    public $title = "Enrolled-student";

    public $route = "enrolled-student";
    public function render()
    {
        return view('livewire.admin.enrolled-student.enrolled-student-lists')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
