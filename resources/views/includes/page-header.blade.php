@if (isset($header))
    <div {{ $attributes->class(['d-sm-flex','align-items-center','justify-content-between', 'mb-2' => isset($description), 'mb-4' => !isset($description)])}}>
        <h1 class="h3 mb-0 text-gray-800">{{ $header }}</h1>
    </div>
@endif
@if (isset($description))
    <p class="mb-4">
        {{ $description }}
    </p>
@endif
