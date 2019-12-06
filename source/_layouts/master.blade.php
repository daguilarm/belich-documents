<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

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

        <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        <style>
            .nav-menu__item{margin-top:0.25rem !important;margin-bottom:0.25rem !important; font-weight: 900 !important;}
            p.nav-menu__item{color:black;}
            ul li{list-style: square;margin-top:0.50rem !important;margin-bottom:0.50rem !important;padding-left: 0.25rem !important; margin-left: 0.25rem;}
            ul li ul li {list-style: none; margin-left: 1rem;}
            .DocSearch-content > ul li{margin: 1rem;}
            .DocSearch-content > ul{margin: 1.5rem;}
            img#custom{border:1px dotted #CCCCCC; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);padding:12px;border-radius:.25rem;width:90%;display: block;margin-left:auto;margin-right:auto;margin-top:2rem;}
            p,pre{margin-top:1.5rem !important;margin-bottom:1.5rem !important;}
            :not(pre)>code{background-color:white !important;box-shadow:0 4px 6px -1px rgba(0, 0, 0, 0.1),0 2px 4px -1px rgba(0, 0, 0, 0.06);}
            #legend{text-align:center;width:100%;margin-top:-0.5rem !important;font-style:italic;}
            .tip{margin: 1.5rem 1rem; background-color: #fff;  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); padding: 2rem;}
            .alert{margin: 1.5rem 1rem; padding:1rem; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);border-radius:.25rem;}
            .alert:before{opacity: 0.9;display: block;content: ' ';float: left;background-size: 24px 24px;height: 24px;width: 24px;margin-right: 10px;}
            .alert.info{background-color: #63b3ed; color: #fff;}
            .alert.info:before{background-image: url('../../assets/img/icons/info.svg');}
            .alert.warning{background-color: #f6e05e; color: #333;}
            .alert.warning:before{background-image: url('../../assets/img/icons/warning.svg');}
            .alert.danger{background-color: #f56565; color: #fff;}
            .alert.danger:before{background-image: url('../../assets/img/icons/danger.svg');}
            .alert.success{background-color: #68d391; color: #fff;}
            .alert.success:before{background-image: url('../../assets/img/icons/success.svg');}
        </style>
        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 leading-normal font-sans">
        <header class="flex items-center shadow bg-white border-b h-24 mb-8 py-4" role="banner">
            <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        <h1 class="text-lg md:text-2xl text-blue-900 font-semibold hover:text-blue-600 my-0 pr-4">{{ $page->siteName }}</h1>
                    </a>
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

        <footer class="bg-white text-center text-sm mt-12 py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-center">
                <li class="md:mr-2">
                    &copy; <a href="https://tighten.co" title="Tighten website">Tighten</a> {{ date('Y') }}.
                </li>

                <li>
                    Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
        </footer>
    </body>
</html>
