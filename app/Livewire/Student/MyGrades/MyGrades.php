<?php

namespace App\Livewire\Student\MyGrades;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Carbon\Carbon;

class MyGrades extends Component
{
    use WithPagination;
    public $title = "My Grades";
    public $route = "my-grades";

    public function render()
    {
        return view('livewire.student.my-grades.my-grades')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
