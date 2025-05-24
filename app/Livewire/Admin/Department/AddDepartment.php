<?php

namespace App\Livewire\Admin\Department;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class AddDepartment extends Component
{
    public $title = "Department";

    public function render()
    {
        return view('livewire.admin.department.add-department')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
