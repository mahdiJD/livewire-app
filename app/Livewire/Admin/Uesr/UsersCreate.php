<?php

namespace App\Livewire\Admin\Uesr;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UsersCreate extends Component
{
    #[Layout('admin.master')]
    public function render()
    {
        return view('livewire.admin.uesr.users-create');
    }
}
