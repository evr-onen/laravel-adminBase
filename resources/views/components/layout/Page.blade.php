<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset='utf-8' />
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <title>{{ $title ?? 'VRISTO - Multipurpose Tailwind Dashboard Template' }}</title>

    <meta name='viewport' content='width=device-width, initial-scale=1' />
    <link rel="icon" type="image/svg" href="/assets/images/favicon.svg" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="{{ asset('/assets/js/perfect-scrollbar.min.js') }}"></script>
    <script defer src="/assets/js/popper.min.js"></script>
    <script defer src="/assets/js/tippy-bundle.umd.min.js"></script>
    <script defer src="/assets/js/sweetalert.min.js"></script>
    @vite(['resources/css/app.css'])
    <!-- Font Awesome Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@100;400;700&family=Poppins:wght@100;400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
</head>

<body x-data="main" class="antialiased relative font-nunito text-sm font-normal overflow-x-hidden">

    @if (request()->is('/'))
        <x-common.mainPageHeader />
    @else
        <x-common.pageHeader />
    @endif


    <div class=" animate__animated" :class="[$store.app.animation]">
        {{ $slot }}
    </div>

    <x-common.pageFooter />

    {{-- <script src="/assets/js/alpine-collaspe.min.js"></script> --}}
    <script src="/assets/js/alpine-persist.min.js"></script>
    {{-- <script defer src="/assets/js/alpine-ui.min.js"></script> --}}
    {{-- <script defer src="/assets/js/alpine-focus.min.js"></script> --}}
    <script defer src="/assets/js/alpine.min.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    @vite('resources/js/app.js')
</body>

</html>
