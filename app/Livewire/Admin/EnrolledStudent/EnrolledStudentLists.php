<?php

namespace App\Livewire\Admin\EnrolledStudent;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class EnrolledStudentLists extends Component
{
    public $title = "Enrolled-student";

    public $route = "enrolled-student";
    
    public $college;

    public $students;

    public $departments;

    public $school_years;

    public $semesters;

    public $subjects;

    public $schedules;
    public function render()
    {
        return view('livewire.admin.enrolled-student.enrolled-student-lists')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
