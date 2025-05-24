<?php

namespace App\Livewire\Admin\Student;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ViewStudent extends Component
{
    public $title = "Student";

    public function render()
    {
        return view('livewire.admin.student.view-student')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
