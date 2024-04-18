<div class="{{ $cardClasses }} relative">
    @if ($header)
        {{ $header }}
    @elseif ($title || $action)
        <div class="{{ $headerClasses }}">
            <h3 class="font-medium whitespace-normal text-md text-secondary-700 dark:text-secondary-400">{{ $title }}</h3>

            @if ($action)
                {{ $action }}
            @endif
        </div>
    @endif

    <div class="absolute top-0 bottom-0 left-0 right-0 h-12 text-white bg-blue-400">
        <h1 class="mt-3 ml-4 text-lg">
            {{ $title ? $title : 'Default Title' }}
        </h1>
    </div>

    <div {{ $attributes->merge(['class' => "{$padding} text-secondary-700 rounded-b-xl grow dark:text-secondary-400"]) }}>
        {{ $slot }}
    </div>

    @if ($footer)
        <div class="{{ $footerClasses }}">
            {{ $footer }}
        </div>
    @endif
</div>
