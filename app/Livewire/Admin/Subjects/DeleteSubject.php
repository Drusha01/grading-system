<?php

namespace App\Livewire\Admin\Subjects;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class DeleteSubject extends Component
{
    public $title = "Subject";

    public function render()
    {
        return view('livewire.admin.subjects.delete-subject')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
