<!DOCTYPE html>
<html lang="en">
    @include('backend.layouts.head')
    <body>



        <div id="wrapper">

            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                @include('backend.layouts.header')
                @include('backend.layouts.sidebar')
            </nav>



            <div id="page-wrapper">
                <div class="main-content-inner">

                    @yield('content')

                </div>
            </div>

        </div>
        @include('backend.layouts.footer')
    </body>

</html>
