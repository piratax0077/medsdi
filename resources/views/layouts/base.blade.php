<!DOCTYPE html>
<html lang="es">
@include('include.header')
@yield('page-styles')
<body>    
    @yield('content')   
    @yield('page-script')  
</body>
@include('include.script')
</html>