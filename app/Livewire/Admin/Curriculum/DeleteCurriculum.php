<?php

namespace App\Livewire\Admin\Curriculum;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class DeleteCurriculum extends Component
{
    public $title = "Curriculum";

    public $route = "curriculum";
    public function render()
    {
        return view('livewire.admin.curriculum.delete-curriculum');
    }
}
