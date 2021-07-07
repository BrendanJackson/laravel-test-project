
<x-app-layout>
    <x-slot name="header">
        Users
    </x-slot>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>User Count: {{count($users)}}</div>
            <div class="ml-auto">
                <a href="{{route('admin.users.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> New User</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped dataTable border">
                    <thead>
                        <tr>
                            <x-sortable-header sort_by="id" :sorted_column="$sorted_column" :sorted_direction="$sorted_direction">
                                ID
                            </x-sortable-header>
                            <x-sortable-header sort_by="created_at" :sorted_column="$sorted_column" :sorted_direction="$sorted_direction">
                                Created
                            </x-sortable-header>
                            <x-sortable-header sort_by="name" :sorted_column="$sorted_column" :sorted_direction="$sorted_direction">
                                Name
                            </x-sortable-header>
                            <x-sortable-header sort_by="email" :sorted_column="$sorted_column" :sorted_direction="$sorted_direction">
                                Email
                            </x-sortable-header>
                            <x-sortable-header :sort_by="false">
                                &nbsp;
                            </x-sortable-header>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td style="width:50px;">
                                {{ $user->id }}
                            </td>
                            <td>{{ $user->created_at->format('m/d/y h:i a') }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                <a href="mailto:{{ $user->email }}" target="_blank" title="Send email to {{ $user->email }}">
                                    {{ $user->email }}
                                </a>
                            </td>
                            <td class="text-right">
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-primary" title="Edit User">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{ route('admin.users.show', ['id' => $user->id]) }}" class="btn btn-success" title="Deactivate User">
                                        <i class="fa fa-power-off"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
