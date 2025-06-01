<?php

namespace App\Livewire\Admin\SideNav;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SideNav extends Component
{
    public function render()
    {

        $userId = Session::get('user_id');


        $user = DB::table('users')
        ->where('id','=',$userId)
        ->first();
       
        return view('livewire.admin.side-nav.side-nav',[
            'user'=>$user
        ]);
    }
}
