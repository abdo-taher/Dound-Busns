<!DOCTYPE html>
<html lang="en">
<head>
@include('layouts.website.head')
</head>
<body>
   @include('layouts.website.header') 
   @yield('content')

   @include('layouts.website.footer') 
    @include('layouts.website.scripts') 
</body>
</html>