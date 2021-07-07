
<x-app-layout>
    <x-slot name="header">
        Users
    </x-slot>
    <div class="card">

        <div class="card-header d-flex">
            <h3 class="m-0">
                New User
            </h3>
            <div class="ml-auto btn-group">
                <a href="{{route('admin.users.list')}}" class="btn btn-outline-danger">Cancel</a>
            </div>
        </div><!-- /.card-header -->

        <form method="POST" action="{{route('admin.users.store')}}">
            @csrf

            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <div class="custom-control custom-checkbox">
                            <input id="active" type="checkbox" class="custom-control-input" name="active" checked />
                            <label for="active" class="custom-control-label">Account Active</label>
                        </div>
                    </div>
                    <div class="col-sm-6 form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" :value="old('email')" name="email" id="email" />
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-6 form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" :value="old('first_name')">
                    </div>
                    <div class="col-sm-6">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" :value="old('last_name')">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-6 form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" :value="">
                    </div>
                    <div class="col-sm-6">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                </div>

            </div><!-- ./card-body -->

            <div class="card-footer text-right">
                <div class="btn-group">
                    <button class="btn btn-success" type="submit">
                        Save
                    </button>
                    <a href="{{route('admin.users.list')}}" class="btn btn-danger">Cancel</a>
                </div>
            </div><!-- /.card-footer -->

        </form>

    </div><!-- /.card -->
</x-app-layout>
