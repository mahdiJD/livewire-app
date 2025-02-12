<?php

namespace App\Livewire\Admin\Uesr;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination, WithFileUploads;
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
    public $editUserIndex = null;
    public function editRow($user_id){
        $user = User::query()->find($user_id);

        $this->editUserIndex = $user_id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->image = $user->image;

    }

    public function updateRow($user_id){
        $user = User::query()->find($user_id);
        $this->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email'.$user_id,
            'mobile'   => 'unique:users,mobile'.$user_id,
        ]);
        if($this->image){
            $name = time().'.'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('photos',$name,'public');
        }else $name = $user->image;

        $user->update([
            'name'     => $this->name,
            'email'    => $this->email,
            'mobile'   => $this->mobile,
            'password' => $this->password ? Hash::make($this->password) : $user->password,
            'image'    => $name,
        ]);
        $this->reset('name','email','mobile','password','image');
        $this->editUserIndex = null;
        session()->flash('message','کاربر ویرایش شد');

    }

    public function saveUser(){
        $this->validate();
        if($this->image){
            $name = time().'.'.$this->image->getClientOriginalExtension();
            $this->image->storeAs('photos',$name,'public');
        }else $name = null;
        User::query()->create([
            'name'     => $this->name,
            'email'    => $this->email,
            'mobile'   => $this->mobile,
            'password' => Hash::make($this->password),
            'image'    => $name,
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
