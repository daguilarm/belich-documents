<!DOCTYPE html>
<html lang="{{ $page->locale === 'es' ? 'es' : 'en' }}">
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#FFFFFF"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $page->locale === 'es' ? 'Gestor de contenidos para Laravel' : $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>
        <meta name="description" content="{{ $page->locale === 'es' ? 'Gestor de contenidos Belich' : 'Belich dashboard' }}. {{ $page->description ?? $page->siteDescription }}">
        <link rel="alternate" hreflang="en" href="{{ str_replace('/es/', '/en/', $page->getUrl()) }}" />
        <link rel="alternate" hreflang="es" href="{{ str_replace('/en/', '/es/', $page->getUrl()) }}" />
        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:image" content="/assets/img/logo.png"/>
        <meta property="og:type" content="website"/>

        <meta name="twitter:image:alt" content="{{ $page->siteName }}">
        <meta name="twitter:card" content="summary_large_image">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <meta name="generator" content="tighten_jigsaw_doc">
        @endif

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="apple-touch-icon" sizes="57x57" href="/assets/images/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/images/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="/assets/images/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="/assets/images/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="/assets/images/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="/assets/images/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon/favicon-16x16.png">
        <link rel="manifest" href="/assets/images/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/assets/images/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="preconnect" href="//fonts.googleapis.com" crossorigin>
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 leading-normal font-sans">
        <header class="flex items-center shadow bg-white border-b h-24 py-4" role="banner">
            <div class="container max-w-8xl mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        <div class="text-lg md:text-2xl text-blue-900 font-semibold hover:text-blue-600 my-0 pr-4"><img src="../../../../assets/images/logo/logo.svg" alt="Belich" class="bg-transparent dropdown-click shadow-none float-left"></div>
                    </a>
                    <div class="flex w-auto">
                        <div class="dropdown">
                            <button onclick="javascript:dropdown('github-container');" class="dropdown-click outline-none focus:outline-none">
                                <div class="flex items-center h-10 p-4 rounded border border-gray-400 bg-gray-100 dropdown-click">
                                    <img src="../../../../assets/img/icons/github.svg" alt="Github logo" class="dropdown-click"> <i class="arrow-down"></i>
                                </div>
                            </button>
                            <div id="github-container" class="dropdown-content border border-gray-400 mt-1">
                                <a href="https://github.com/daguilarm/belich" class="flex-1 p-2">Belich</a>
                                <a href="https://github.com/daguilarm/belich-documents" class="flex-1 p-2">{{ $page->locale === 'en' ? 'Documents' : 'Documentos' }}</a>
                                <a href="https://github.com/daguilarm/belich-dashboard" class="flex-1 p-2">{{ $page->locale === 'en' ? 'Examples' : 'Ejemplos' }}</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-1 justify-end items-center text-right md:pl-10">
                    @if ($page->docsearchApiKey && $page->docsearchIndexName)
                        @include('_nav.search-input')
                    @endif
                </div>
            </div>

            @yield('nav-toggle')
        </header>

        <main role="main" class="w-full flex-auto">
            @yield('body')
        </main>
        <footer class="bg-white text-center text-sm sm:mt-8 py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-center">
                <li class="md:mr-2">
                    &copy; <a href="https://www.daguilar.dev" title="Damián Aguilar">Damián Aguilar</a> {{ date('Y') }}.
                </li>

                <li>
                    {{ $page->locale === 'es' ? 'Creado con' : 'Built with' }} <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    {{ $page->locale === 'es' ? 'y' : 'and' }} <a href="https://tailwindcss.com" title="Tailwind CSS - CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
            {{-- Scripts --}}
            <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
            @stack('scripts')
            <script>
                function dropdown(id) {
                    document.getElementById(id).classList.toggle('show');
                }

                document.addEventListener('DOMContentLoaded', function() {
                    var linksTargetBlank = document.querySelectorAll('.link-out');
                    for (var i = 0; i < linksTargetBlank.length; i++) {
                        linksTargetBlank[i].target = "_blank";
                        linksTargetBlank[i].rel = "noopener";
                    }
                    var lazyImages = document.getElementsByTagName('img');
                    for (var i = 0; i < lazyImages.length; i++) {
                        lazyImages[i].setAttribute('loading', 'lazy');
                    }
                }, false);

                window.onclick = function(event) {
                    if (!event.target.matches('.dropdown-click')) {
                        var sharedowns = document.getElementsByClassName('dropdown-content');
                        var i;
                        for (i = 0; i < sharedowns.length; i++) {
                            var openSharedown = sharedowns[i];
                            if (openSharedown.classList.contains('show')) {
                                openSharedown.classList.remove('show');
                            }
                        }
                    }
                }
            </script>
        </footer>
    </body>
</html>
