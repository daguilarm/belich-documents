@php $level = $level ?? 0 @endphp

<ul class="my-0">
    @foreach ($items as $label => $item)
        @php
            $labelLocale = explode('||', $label);
            $label = $page->locate === 'en' ? $labelLocale[0] : $labelLocale[1];
        @endphp
        @include('_nav.menu-item')
    @endforeach
</ul>
