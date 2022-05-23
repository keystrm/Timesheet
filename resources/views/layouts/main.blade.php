<!DOCTYPE html>
<html lang="en">
    <head>
        @include('layouts.head');
    </head>
<body>
    <div class="container">
        <header class="row">
            @include('layouts.header')
        </header>
        <div id="main" class="row">
                @yield('content')
        </div>
        <footer class="row">
            @include('layouts.footer')
        </footer>
        </div>
</div>
    
</body>
</html>