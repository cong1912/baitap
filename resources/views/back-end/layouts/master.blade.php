<!DOCTYPE html>
<html lang="en">

<head>
    @include('back-end.inc.header')
    @yield('css')
</head>

<body class="sidebar-noneoverflow">
    @include('back-end.inc.navbar')
    @include('back-end.inc.siderbar')
    @yield('content')

    @include('back-end.inc.footer')
    @yield('script')
</body>
</html>



