<!-- header -->
@include('layouts.header')

<!-- content -->
@hasSection('content')
    @yield('content')
@else
    @include('layouts.default_content')
@endif

<!-- footer -->
@include('layouts.footer')
