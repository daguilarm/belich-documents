<li>
    @if ($url = is_string($item) ? $item : $item->url)
        @php
            $url = str_replace('_location_', $page->locale, $url);
        @endphp
        {{-- Menu item with URL--}}
        <a href="{{ $page->url($url) }}"
            class="level-base {{ 'level-' . $level }} {{ $page->isActive($url) ? 'active' : '' }} hover:text-blue-500"
        >
            {{ $label }}
        </a>
    @else
        {{-- Menu item without URL--}}
        <p class="level-base {{ 'level-' . $level }}">{{ $label }}</p>
    @endif

    @if (! is_string($item) && $item->children)
        {{-- Recursively handle children --}}
        @include('_nav.menu', ['items' => $item->children, 'level' => ++$level])
    @endif
</li>
