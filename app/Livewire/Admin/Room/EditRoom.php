<?php

namespace App\Livewire\Admin\Room;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;

class EditRoom extends Component
{
    public $title = "Room";

    public function render()
    {
        return view('livewire.admin.room.edit-room')
        ->layout('components.layouts.admin-app',[
            'title'=>$this->title
        ]);
    }
}
