<?php

namespace App\Livewire\Admin\Department;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ViewDepartment extends Component
{
    public $title = "Department";

    public $colleges = [];

    public function render()
    {
        $this->colleges = DB::table('colleges')
            ->where('is_active','=',1)
            ->get()
            ->toArray();

        return view('livewire.admin.department.view-department')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
