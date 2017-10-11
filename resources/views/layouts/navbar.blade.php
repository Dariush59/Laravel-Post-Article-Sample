<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact Us</a>
                </li>
            </ul>

            @if(Auth::check())
                <div class="nav navbar-left" style="margin-top: 15px">
                    <form action="{{ route('logout') }}" method="post">
                        {!! csrf_field() !!}

                        <button class="btn btn-xs btn-warning">Logout</button>
                    </form>
                </div>

            @else
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="/login">Login</a>
                    </li>
                    <li>
                        <a href="/register">SignUp</a>
                    </li>
                </ul>
            @endif
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
