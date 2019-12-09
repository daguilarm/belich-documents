<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ $page->locale === 'es' ? 'Gestor de contenidos para Laravel' : $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>
        <meta name="description" content="{{ $page->locale === 'es' ? 'Gestor de contenidos Belich' : 'Belich dashboard' }}. {{ $page->description ?? $page->siteDescription }}">

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
        <link rel="icon" href="/favicon.ico">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 leading-normal font-sans">
        <header class="flex items-center shadow bg-white border-b h-24 mb-8 py-4" role="banner">
            <div class="container max-w-8xl mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        <h1 class="text-lg md:text-2xl text-blue-900 font-semibold hover:text-blue-600 my-0 pr-4">{{ $page->locate === 'en' ? 'Belich: documents' : 'Belich: documentación' }}</h1>
                    </a>
                    <div class="flex w-auto">
                        <img src="../../../../assets/img/icons/github.svg" alt="Github logo" class="flex flex-1 mr-3">
                        <a href="https://github.com/daguilarm/belich" class="flex-1 mr-2">Belich</a> <span class="mx-2">/</span>
                        <a href="https://github.com/daguilarm/belich-documents" class="flex-1 mr-2">{{ $page->locate === 'en' ? 'Documents' : 'Documentos' }}</a> <span class="mx-2">/</span>
                        <a href="https://github.com/daguilarm/belich-dashboard" class="flex-1 mr-2">{{ $page->locate === 'en' ? 'Examples' : 'Ejemplos' }}</a>
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

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
        @stack('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var linksTargetBlank = document.querySelectorAll('.link-out');
                for (var i = 0; i < linksTargetBlank.length; i++) {
                    linksTargetBlank[i].target = "_blank";
                }
            }, false);
        </script>
        <footer class="bg-white text-center text-sm mt-12 py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-center">
                <li class="md:mr-2">
                    &copy; <a href="https://www.daguilar.dev" title="Damián Aguilar">Damián Aguilar</a> {{ date('Y') }}.
                </li>

                <li>
                    {{ $page->locale === 'es' ? 'Creado con' : 'Built with' }} <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    {{ $page->locale === 'es' ? 'y' : 'and' }} <a href="https://tailwindcss.com" title="Tailwind CSS - CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
        </footer>
    </body>
</html>
