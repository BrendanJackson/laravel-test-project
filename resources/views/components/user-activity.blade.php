

@if ($user->id)
    <div class="table-responsive">
        <table class="table table-striped dataTable">
            <thead>
            <tr>
                <x-sortable-header sort_by="severity" :sorted_column="$sorted_column" :sorted_direction="$sorted_direction">
                    <x-slot name="title">Severity</x-slot>
                </x-sortable-header>
                <x-sortable-header sort_by="created_at" :sorted_column="$sorted_column" :sorted_direction="$sorted_direction">
                    <x-slot name="title">Date</x-slot>
                </x-sortable-header>
                <x-sortable-header sort_by="title" :sorted_column="$sorted_column" :sorted_direction="$sorted_direction">
                    <x-slot name="title">Action</x-slot>
                </x-sortable-header>
                <x-sortable-header :sort_by="false">
                    <x-slot name="title">Details</x-slot>
                </x-sortable-header>
            </tr>
            </thead>
            <tbody>
            @foreach($user_activity as $userAction)
                <tr>
                    <td class="text-center" style="width:100px;">
                        @switch($userAction->severity)
                            @case('success')
                                @php
                                    $colorClass = 'success';
                                    $severityClass = 'check-circle';
                                @endphp
                                @break
                            @case('warning')
                                @php
                                    $colorClass = 'warning';
                                    $severityClass = 'exclamation-triangle';
                                @endphp
                                @break
                            @case('error')
                                @php
                                    $colorClass = 'danger';
                                    $severityClass = 'exclamation-circle';
                                @endphp
                                @break
                            @case('info')
                            @default
                                @php
                                    $colorClass = 'primary';
                                    $severityClass = 'info-circle';
                                @endphp
                                @break
                        @endswitch
                        <span class="text-{{$colorClass}}" title="{{$userAction->severity}}">
                            <i class="fas fa-{{$severityClass}}"></i>
                        </span>
                    </td>
                    <td>{{$userAction->created_at->format("m/d/Y h:m:s a")}}</td>
                    <td>{{$userAction->title}}</td>
                    <td>{{$userAction->description}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $user_activity->links() }}
    </div>
@else
    <p>User not found.</p>
@endif
