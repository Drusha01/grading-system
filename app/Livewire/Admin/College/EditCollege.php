<?php

namespace App\Livewire\Admin\College;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class EditCollege extends Component
{
    public $title = "College";
    public $route = 'college';

    public function render()
    {
        return view('livewire.admin.college.edit-college')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
