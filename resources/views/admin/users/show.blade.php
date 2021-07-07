
<x-app-layout>
    <x-slot name="header">
        Users
    </x-slot>

    <div class="card">
        <div class="card-header d-flex">
            <h3 class="m-0">
                {{$user->name}}
            </h3>
            <div class="ml-auto btn-group">
                <a href="{{route('admin.users.list')}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Back</a>
                <a href="{{route('admin.users.edit', ['id' => $user->id])}}" class="btn btn-outline-primary"><i class="fa fa-edit"></i> Edit</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col">
                    Account: {{$user->active ? 'Active' : 'Inactive'}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-md-6">
                    Email:
                    @if ($user->email_verified_at)
                        <i class="fa fa-check-circle text-success" title="Verified"></i>
                    @else
                        <i class="fa fa-exclamation-triangle text-warning" title="Not Verified"></i>
                    @endif
                    {{$user->email}}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col col-md-6">
                    Two Factor Authentication: {{$user->two_factor_secret ? 'Enabled' : 'Disabled'}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
