	<main class="main-content">
		<div class="card">
            <div class="card-body">
				<div class="table overflow-auto" tabindex="8">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">عنوان جستجو</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control text-left" dir="rtl" wire:model.live="search">
                        </div>
                    </div>
                    <div >
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{session('message')}}
                        </div>
                        @endif
                        <h6 class="card-title">ایجاد کاربر</h6>
                        <form wire:submit="saveUser" >
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">نام و نام خانوادگی</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control text-left"  dir="rtl" wire:model="name">
                                            @error('name')
                                            <span class="text-danger">{{session('message')}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label  class="col-sm-2 col-form-label">ایمیل</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control text-left" dir="rtl" wire:model.blur="email" >
                                            @error('email')
                                            <span class="text-danger">{{session('message')}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">موبایل</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control text-left"  dir="rtl" wire:model="mobile">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label  class="col-sm-3 col-form-label">پسورد</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control text-left" dir="rtl" wire:model="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="file"> آپلود عکس </label>
                                        <input  class="col-sm-8" type="file" class="form-control-file" id="file" wire:model="image">
                                        @if ($image)
                                        <figure class="avatar avatar col-sm-2">
                                            <img src="{{$image->temporaryUrl()}}" class="rounded-circle" alt="image">
                                        </figure>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        @if ($editUserIndex==null)
                                        <button type="submit" class="btn btn-success btn-uppercase">
                                            <i class="ti-check-box m-r-5"></i> ایجاد
                                        </button>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center align-middle text-primary">ردیف</th>
                                <th class="text-center align-middle text-primary">عکس</th>
                                <th class="text-center align-middle text-primary">نام و نام خانوادگی</th>
                                <th class="text-center align-middle text-primary">ایمیل</th>
                                <th class="text-center align-middle text-primary">موبایل</th>
                                <th class="text-center align-middle text-primary">نقش های کاربر</th>
                                <th class="text-center align-middle text-primary"> وضعیت</th>
                                <th class="text-center align-middle text-primary">ویرایش</th>
                                <th class="text-center align-middle text-primary">تاریخ ایجاد</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index=>$user)
                            <tr>
                                <td class="text-center align-middle">{{$users->firstItem()+$index}}</td>
                                <td class="text-center align-middle">
                                    <figure class="avatar avatar">
                                        <img src="/photos/{{$user->image}}" class="rounded-circle" alt="image">
                                    </figure>
                                </td>
                                <td class="text-center align-middle">{{$user->name}}</td>
                                <td class="text-center align-middle">{{$user->email}}</td>
                                <td class="text-center align-middle">{{$user->mobile}}</td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-outline-info" href="#">
                                        نقش های کاربر
                                    </a>
                                </td>
                                <td class="text-center align-middle">
                                        <span class="cursor-pointer badge badge-success">فعال</span>
                                </td>
                                <td class="text-center align-middle">
                                    @if ($editUserIndex==$user->id)
                                    <a class="btn btn-outline-info" href="#" wire:click='updateRow({{$user->id}})'>
                                        ذخیره
                                    </a>
                                    @else
                                    <a class="btn btn-outline-info" href="#" wire:click='editRow({{$user->id}})'>
                                        ویرایش
                                    </a>
                                    @endif

                                </td>
                                <td class="text-center align-middle">{{$user->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                    <div style="margin: 40px !important;"
                         class="pagination pagination-rounded pagination-sm d-flex justify-content-center">
                         {{$users->links()}}
                    </div>
                </div>

            </div>
        </div>

	</main>

