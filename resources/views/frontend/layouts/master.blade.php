<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title','Laravel Ecommerce Project')
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('frontend.partials.styles')
</head>

<body>
    <div class="wrapper">
    {{-- Navbar --}}
    @include('frontend.partials.navbar')

        
        {{-- include messages file --}}
        @include('Frontend.partials.messagess')

        {{-- sidebar & content --}}

        @yield('content')

    {{-- footer --}}
    @include('frontend.partials.footer')


    </div>

    @include('frontend.partials.scripts')
    @yield('scripts')
</body>

</html>