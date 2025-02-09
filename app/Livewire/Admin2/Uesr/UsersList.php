<?php

namespace App\Livewire\Admin2\Uesr;

use Livewire\Attributes\Layout;
use Livewire\Component;

class UsersList extends Component
{
    #[Layout('admin2.master')]
    public function render()
    {
        return view('livewire.admin2.uesr.users-list');
    }
}
