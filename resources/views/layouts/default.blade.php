<!doctype html>
<html>
<head>
   @include('includes.head')
</head>
<body>
    <div class="container-fluid">
        <div id="main" class="mt-2">
            @yield('content')
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>