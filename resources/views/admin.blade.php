@include('partials._header')

<body>

@include('partials._adminNavbar')


@include('partials._adminSidebar')

@yield('content')

@include('partials._javascript')

@yield('scripts')

</body>
</html>

