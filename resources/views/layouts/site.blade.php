<!DOCTYPE html>
<html>
<title>ArVa</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/theme-blue-grey.css') }}">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script type="text/javascript" src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-filestyle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/addAlbum.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/scaleThePhoto.js') }}"></script>
<body class="theme-l5">

<!-- Navbar -->
<div class="top">
    <div class="bar theme-d2 left-align large">
        <a class="bar-item button hide-medium hide-large right padding-large hover-white large theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <a href="{{ route('home') }}" class="bar-item button padding-large theme-d4"><i class="fa fa-home margin-right"></i>ArVa</a>
        <a href="{{ route('news') }}" class="bar-item button hide-small padding-large hover-white" title="News"><i class="fa fa-globe"></i></a>
        <a href="{{ route('settings') }}" class="bar-item button hide-small padding-large hover-white" title="Account Settings"><i class="fa fa-user"></i></a>
        <a href="{{ route('messages') }}" class="bar-item button hide-small padding-large hover-white" title="Messages"><i class="fa fa-envelope"></i></a>
        <a href="{{ route('friends') }}" class="bar-item button hide-small padding-large hover-white" title="Friends"><i class="fa fa-users"></i></a>
        <div class="dropdown-hover hide-small">
            <button class="button padding-large" title="Notifications"><i class="fa fa-bell"></i><span class="badge right small green">3</span></button>
            <div class="dropdown-content card-4 bar-block" style="width:300px">
                <a href="#" class="bar-item button">One new friend request</a>
                <a href="#" class="bar-item button">John Doe posted on your wall</a>
                <a href="#" class="bar-item button">Jane likes your post</a>
            </div>
        </div>
        <a href="{{ route('logout') }}" class="bar-item button hide-small right padding-large hover-white" title="Logout"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
        <a href="#" class="bar-item button hide-small right padding-large hover-white" title="My Account"><img src="{{ asset('img/avatar2.png') }}" class="circle" style="height:25px;width:25px" alt="Avatar"></a>

    </div>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="bar-block theme-d2 hide hide-large hide-medium large">
    <a href="#" class="bar-item button padding-large">Link 1</a>
    <a href="#" class="bar-item button padding-large">Link 2</a>
    <a href="#" class="bar-item button padding-large">Link 3</a>
    <a href="#" class="bar-item button padding-large">My Profile</a>
</div>

<!-- Page Container -->
<div class="container content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="row">
        <!-- Left Column -->
        @yield('left_column')
        <!-- End Left Column -->

        <!-- Middle Column -->
        @yield('middle_column')
        <!-- End Middle Column -->

        <!-- Right Column -->
        @yield('right_column')
        <!-- End Right Column -->
    </div>
    <!-- End Grid -->

    <!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="container theme-d3 padding-16">
    <h5>Footer</h5>
</footer>

<script>
    // Accordion
    function myFunction(id) {
        var x = document.getElementById(id);
        if (x.className.indexOf("show") == -1) {
            x.className += " show";
            x.previousElementSibling.className += " theme-d1";
        } else {
            x.className = x.className.replace("show", "");
            x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" theme-d1", "");
        }
    }

    // Used to toggle the menu on smaller screens when clicking on the menu button
    function openNav() {
        var x = document.getElementById("navDemo");
        if (x.className.indexOf("show") == -1) {
            x.className += " show";
        } else {
            x.className = x.className.replace(" show", "");
        }
    }
</script>

</body>
</html>