<!DOCTYPE html>
<html lang="<?php echo e($page->locale ?? 'en'); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo e($page->locale === 'es' ? 'Gestor de contenidos para Laravel' : $page->siteName); ?><?php echo e($page->title ? ' | ' . $page->title : ''); ?></title>
        <meta name="description" content="<?php echo e($page->locale === 'es' ? 'Gestor de contenidos Belich' : 'Belich dashboard'); ?>. <?php echo e($page->description ?? $page->siteDescription); ?>">

        <meta property="og:site_name" content="<?php echo e($page->siteName); ?>"/>
        <meta property="og:title" content="<?php echo e($page->title ?  $page->title . ' | ' : ''); ?><?php echo e($page->siteName); ?>"/>
        <meta property="og:description" content="<?php echo e($page->description ?? $page->siteDescription); ?>"/>
        <meta property="og:url" content="<?php echo e($page->getUrl()); ?>"/>
        <meta property="og:image" content="/assets/img/logo.png"/>
        <meta property="og:type" content="website"/>

        <meta name="twitter:image:alt" content="<?php echo e($page->siteName); ?>">
        <meta name="twitter:card" content="summary_large_image">

        <?php if($page->docsearchApiKey && $page->docsearchIndexName): ?>
            <meta name="generator" content="tighten_jigsaw_doc">
        <?php endif; ?>

        <link rel="home" href="<?php echo e($page->baseUrl); ?>">
        <link rel="icon" href="/favicon.ico">

        <?php echo $__env->yieldPushContent('meta'); ?>

        <?php if($page->production): ?>
            <!-- Insert analytics code here -->
        <?php endif; ?>

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(mix('css/main.css', 'assets/build')); ?>">
        <?php if($page->docsearchApiKey && $page->docsearchIndexName): ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        <?php endif; ?>
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 leading-normal font-sans">
        <header class="flex items-center shadow bg-white border-b h-24 mb-8 py-4" role="banner">
            <div class="container max-w-8xl mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between">
                    <a href="/" title="<?php echo e($page->siteName); ?> home" class="inline-flex items-center">
                        <h1 class="text-lg md:text-2xl text-blue-900 font-semibold hover:text-blue-600 my-0 pr-4"><?php echo e($page->locate === 'en' ? 'Belich: documents' : 'Belich: documentación'); ?></h1>
                    </a>
                    <div class="flex w-auto">
                        <div class="dropdown">
                            <button onclick="javascript:dropdown('github-container');" class="dropdown-click outline-none focus:outline-none">
                                <div class="flex items-center h-10 p-4 rounded border border-gray-400 bg-gray-100 dropdown-click">
                                    <img src="../../../../assets/img/icons/github.svg" alt="Github logo" class="dropdown-click"> <i class="arrow-down"></i>
                                </div>
                            </button>
                            <div id="github-container" class="dropdown-content">
                                <a href="https://github.com/daguilarm/belich" class="flex-1 p-2">Belich</a>
                                <a href="https://github.com/daguilarm/belich-documents" class="flex-1 p-2"><?php echo e($page->locate === 'en' ? 'Documents' : 'Documentos'); ?></a>
                                <a href="https://github.com/daguilarm/belich-dashboard" class="flex-1 p-2"><?php echo e($page->locate === 'en' ? 'Examples' : 'Ejemplos'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-1 justify-end items-center text-right md:pl-10">
                    <?php if($page->docsearchApiKey && $page->docsearchIndexName): ?>
                        <?php echo $__env->make('_nav.search-input', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                </div>
            </div>

            <?php echo $__env->yieldContent('nav-toggle'); ?>
        </header>

        <main role="main" class="w-full flex-auto">
            <?php echo $__env->yieldContent('body'); ?>
        </main>

        <script src="<?php echo e(mix('js/main.js', 'assets/build')); ?>"></script>
        <?php echo $__env->yieldPushContent('scripts'); ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var linksTargetBlank = document.querySelectorAll('.link-out');
                for (var i = 0; i < linksTargetBlank.length; i++) {
                    linksTargetBlank[i].target = "_blank";
                }
            }, false);

            function dropdown(id) {
                document.getElementById(id).classList.toggle('show');
            }

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
        <footer class="bg-white text-center text-sm mt-12 py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-center">
                <li class="md:mr-2">
                    &copy; <a href="https://www.daguilar.dev" title="Damián Aguilar">Damián Aguilar</a> <?php echo e(date('Y')); ?>.
                </li>

                <li>
                    <?php echo e($page->locale === 'es' ? 'Creado con' : 'Built with'); ?> <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    <?php echo e($page->locale === 'es' ? 'y' : 'and'); ?> <a href="https://tailwindcss.com" title="Tailwind CSS - CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
        </footer>
    </body>
</html>
<?php /**PATH /Users/daguilarm/Sites/belich-documents/source/_layouts/master.blade.php ENDPATH**/ ?>