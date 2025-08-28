<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
    <title>@yield('title', 'DevDiaries')</title>
</head>

<body class="preload-wrapper">
    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>

    <div id="wrapper">
        @yield('content')
    </div>

    @yield('models')

    @include('app.partials.scripts')
</body>
</html>
