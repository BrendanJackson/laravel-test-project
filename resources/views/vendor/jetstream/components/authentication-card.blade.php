

        <div class="p-5">
            @if (isset($title))
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1>
            </div>
            @endif
            {{ $slot }}
        </div>
