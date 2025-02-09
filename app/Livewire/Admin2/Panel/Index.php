<?php

namespace App\Livewire\Admin2\Panel;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    #[Layout('admin2.master')]
    public function render()
    {
        return view('livewire.admin2.panel.index');
    }
}
