<?php

namespace App\Livewire\Admin\Uesr;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    #[Rule('required')]
    public $name;
    #[Rule('required|unique:users')]
    public $email;
    #[Rule('required')]
    public $mobile;
    #[Rule('required|min:6')]
    public $password;
    public $salt = '+#%*&.,//~salt-for-livewire+#%$^*&.,/~';
    #[Rule('nullable')]
    public $image;
    public $search;

    public function saveUser(){
        $this->validate();
        User::query()->create([
            'name'     => $this->name,
            'email'    => $this->email,
            'mobile'   => $this->mobile,
            'password' => Hash::make($this->password),
            'image'    => ''// $this->image,
        ]);
        $this->reset('name','email','mobile','password','image');
        session()->flash('message','کاربر جدید ایجاد شد');
    }
    #[Layout('admin.master')]
    public function render()
    {
        $users = User::query()
        ->where('name','like','%'.$this->search.'%')
        ->orWhere('email','like','%'.$this->search.'%')
        ->orWhere('mobile','like','%'.$this->search.'%')
        ->paginate(1);
        return view('livewire.admin.uesr.users-list',compact(['users']));
    }
}
