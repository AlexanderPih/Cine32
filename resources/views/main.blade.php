@include('partials._header')

<body>

<div class="container">

@include('partials._nav')

@yield('content')

</div> <!-- end of container -->

@include('partials._footer')

@include('partials._javascript')

@yield('scripts')

</body>
</html>