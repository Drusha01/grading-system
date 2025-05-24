<?php

namespace App\Livewire\Admin\Faculty;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class ViewFaculty extends Component
{
    public $title = "Faculty";
    public function render()
    {
        return view('livewire.admin.faculty.view-faculty')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
