<!DOCTYPE html>

<html>
    <head>
        @include('layout.head')
    </head>
    <body>
        <div class="container">
            <div class="row">
                @include('layout.menu')
                <div id="wrapper" class="col-sm-9">
                    @if(!empty(session('message')))
                        <div class="alert alert-info" role="alert">{{session('message')}}</div>
                    @endif
                    <div id="container">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>