<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <title>Monitor</title>

    <!-- Behavioral Meta Data -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <!-- Core Meta Data -->
    <meta name="author" content="Monitor Danyllophp">
    <meta name="description" content="api orientation of a smart device">
    <meta name="keywords" content="php Laravel">

    <!-- Open Graph Meta Data -->
    <meta property="og:description" content="php Laravel">
    <meta property="og:image" content="http://wagerfield.github.io/parallax/assets/images/thumbnail.png">
    <meta property="og:site_name" content="Monitor Mangue3">
    <meta property="og:title" content="Monitor">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">

    <!-- Humans -->
    <link rel="author" href="" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/styles/css/styles.css') !!}"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{!! public_path('/favicon.ico') !!}" type="image/x-icon">
    <link rel="shortcut icon" href="{!! public_path('/favicon.png') !!}" type="image/png">
    <link rel="shortcut icon" href="http://wagerfield.github.io/parallax/favicon.png" type="image/png">

    <!-- Apple Touch Icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{!! public_path('apple-touch-icon-144x144-precomposed.png') !!}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{!! public_path('apple-touch-icon-114x114-precomposed.png') !!}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"   href="{!! public_path('apple-touch-icon-72x72-precomposed.png') !!}">
    <link rel="apple-touch-icon-precomposed" sizes="57x57"   href="{!! public_path('apple-touch-icon-57x57-precomposed.png') !!}">

    <!-- Apple Startup Images -->
    <link rel="apple-touch-startup-image" href="{!! public_path('apple-touch-startup-image-320x460.png') !!}" media="(device-width: 320px)">
    <link rel="apple-touch-startup-image" href="{!! public_path('apple-touch-startup-image-640x920.png') !!}" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)">
    <link rel="apple-touch-startup-image" href="{!! public_path('apple-touch-startup-image-768x1004.png') !!}" media="(device-width: 768px) and (orientation: portrait)">
    <link rel="apple-touch-startup-image" href="{!! public_path('apple-touch-startup-image-748x1024.png') !!}" media="(device-width: 768px) and (orientation: landscape)">
    <link rel="apple-touch-startup-image" href="{!! public_path('apple-touch-startup-image-1536x2008.png') !!}" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)">
    <link rel="apple-touch-startup-image" href="{!! public_path('apple-touch-startup-image-2048x1496.png') !!}" media="(device-width: 1536px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)">
</head>
<body>

<div id="fb-root"></div>

<div id="container" class="wrapper">
    <ul id="scene" class="scene unselectable"
        data-friction-x="0.1"
        data-friction-y="0.1"
        data-scalar-x="25"
        data-scalar-y="15">
        <li class="layer" data-depth="0.00"></li>
        <li class="layer" data-depth="0.10"><div class="background"></div></li>
        <li class="layer" data-depth="0.10"><div class="light orange b phase-4"></div></li>
        <li class="layer" data-depth="0.10"><div class="light purple c phase-5"></div></li>
        <li class="layer" data-depth="0.10"><div class="light orange d phase-3"></div></li>
        <li class="layer" data-depth="0.15">
            <ul class="rope depth-10">
                <li><img src="{!! asset('assets/images/rope.png') !!}" alt="Rope"></li>
                <li class="hanger position-2">
                    <div class="board cloud-2 swing-1"></div>
                </li>
                <li class="hanger position-4">
                    <div class="board cloud-1 swing-3"></div>
                </li>
                <li class="hanger position-8">
                    <div class="board birds swing-5"></div>
                </li>
            </ul>
        </li>
        <li class="layer" data-depth="0.20"><h1 class="title">ApiService<em>.Laravel 5.5</em></h1></li>
        <li class="layer" data-depth="0.30">
            <ul class="rope depth-30">
                <li><img src="{!! asset('assets/images/rope.png') !!}" alt="Rope"></li>
                <li class="hanger position-1">
                    <div class="board cloud-1 swing-3"></div>
                </li>
                <li class="hanger position-5">
                    <div class="board cloud-4 swing-1"></div>
                </li>
            </ul>
        </li>
        <li class="layer" data-depth="0.30"><div class="wave paint depth-30"></div></li>
        <li class="layer" data-depth="0.40"><div class="wave plain depth-40"></div></li>
        <li class="layer" data-depth="0.50"><div class="wave paint depth-50"></div></li>
        <li class="layer" data-depth="0.60"><div class="lighthouse depth-60"></div></li>
        <li class="layer" data-depth="0.60">
            <ul class="rope depth-60">
                <li><img src="{!! asset('assets/images/rope.png') !!}" alt="Rope"></li>
                <li class="hanger position-3">
                    <div class="board birds swing-5"></div>
                </li>
                <li class="hanger position-6">
                    <div class="board cloud-2 swing-2"></div>
                </li>
                <li class="hanger position-8">
                    <div class="board cloud-3 swing-4"></div>
                </li>
            </ul>
        </li>
        <li class="layer" data-depth="0.60"><div class="wave plain depth-60"></div></li>
        <li class="layer" data-depth="0.80"><div class="wave plain depth-80"></div></li>
        <li class="layer" data-depth="1.00"><div class="wave paint depth-100"></div></li>
    </ul>
    <section id="about" class="wrapper about hide accelerate">
        <div class="cell accelerate">
            <div class="cables center accelerate">
                <div class="panel accelerate">
                    <header>
                        <h1>Api<em> Serviçe</em></h1>
                    </header>
                    <p>Desenvolvida por <strong>Danyllo</strong> essa Api será responsavel por analisar manipular e apresentar dados gerenciais e performaticos</p>

                    <ul class="links">
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <button id="toggle" class="toggle i">
        <div class="cross">
            <div class="x"></div>
            <div class="y"></div>
        </div>
    </button>
    <div id="prompt" class="wrapper prompt hide accelerate">
        <div class="cell accelerate">
            <div class="panel center unselectable accelerate">
                <button id="dismiss" class="dismiss">
                    <div class="cross">
                        <div class="x"></div>
                        <div class="y"></div>
                    </div>
                </button>
                <div class="tilt-scene">
                    <img class="tilt" src="{!! asset('assets/images/tilt.png') !!}">
                </div>
                <h2>Tilting is fun!</h2>
                <p>For the best experience, check out this site on a mobile or tablet equipped with a gyroscope</p>
                <p>(iPads are the coolest)</p>
            </div>
        </div>
    </div>
    <footer>
    </footer>
</div>

<!-- Scripts -->
<script src="{!! asset('assets/scripts/js/libraries.min.js') !!}"></script>
<script src="{!! asset('deploy/jquery.parallax.js') !!}"></script>
<script>

    // jQuery Selections
    var $html = $('html'),
            $container = $('#container'),
            $prompt = $('#prompt'),
            $toggle = $('#toggle'),
            $about = $('#about'),
            $scene = $('#scene');

    // Hide browser menu.
    (function() {
        setTimeout(function(){window.scrollTo(0,0);},0);
    })();

    // Setup FastClick.
    FastClick.attach(document.body);

    // Add touch functionality.
    if (Hammer.HAS_TOUCHEVENTS) {
        $container.hammer({drag_lock_to_axis: true});
        _.tap($html, 'a,button,[data-tap]');
    }

    // Add touch or mouse class to html element.
    $html.addClass(Hammer.HAS_TOUCHEVENTS ? 'touch' : 'mouse');

    // Resize handler.
    (resize = function() {
        $scene[0].style.width = window.innerWidth + 'px';
        $scene[0].style.height = window.innerHeight + 'px';
        if (!$prompt.hasClass('hide')) {
            if (window.innerWidth < 600) {
                $toggle.addClass('hide');
            } else {
                $toggle.removeClass('hide');
            }
        }
    })();

    // Attach window listeners.
    window.onresize = _.debounce(resize, 200);
    window.onscroll = _.debounce(resize, 200);

    function showDetails() {
        $about.removeClass('hide');
        $toggle.removeClass('i');
    }

    function hideDetails() {
        $about.addClass('hide');
        $toggle.addClass('i');
    }

    // Listen for toggle click event.
    $toggle.on('click', function(event) {
        $toggle.hasClass('i') ? showDetails() : hideDetails();
    });

    // Pretty simple huh?
    $scene.parallax();

    // Check for orientation support.
    setTimeout(function() {
        if ($scene.data('mode') === 'cursor') {
            $prompt.removeClass('hide');
            if (window.innerWidth < 600) $toggle.addClass('hide');
            $prompt.on('click', function(event) {
                $prompt.addClass('hide');
                if (window.innerWidth < 600) {
                    setTimeout(function() {
                        $toggle.removeClass('hide');
                    },1200);
                }
            });
        }
    },1000);

    // Twitter stuff.
    !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');

    // Facebook stuff.
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=709933052350821";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>
