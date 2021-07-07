<th class="p-0">
    @if ($sort_by)
    <a href="{{ $sort_link }}" class="p-3 pr-5 d-inline-block {{ $sorting_classes }}">
        <span class="text-black">
            @if (isset($title))
            {{ $title }}
            @else
            {{ $slot }}
            @endif
        </span>
    </a>
    @else
    <span class="p-3 d-inline-block text-black">
        @if (isset($title))
        {{ $title }}
        @else
        {{ $slot }}
        @endif
    </span>
    @endif
</th>

@once
    @push('stylesheets')
        <link rel="stylesheet" href="/vendor/datatables/dataTables.bootstrap4.css">
    @endpush
@endonce
