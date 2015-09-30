<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="#page-top">Vn English</a> -->
            <a href="#page-top"><img style="height:70px" src="{{ asset('/assets/img/vnenglish.png') }}" alt=""></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="#portfolio">Portfolio</a>
                </li>
                <li class="page-scroll">
                    <a href="#about">About</a>
                </li>
                <li class="page-scroll">
                    <a href="#contact">Contact</a>
                </li>
                @unless (Auth::check())
                <li>
                    <a href="" style="color:#3F92D9" data-toggle="modal" data-target="#login">Login</a>
                </li>
                @endunless
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>


<!-- Login -->

<div class="modal fade bs-example-modal-sm" id="login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <form id="login" action="/auth/login" method="POST" role="form">
                <div class="modal-body">

                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="remember"> Remember Me
                        <a href="#register" data-toggle="modal" data-dismiss="modal" title="Don't have account">Don't have account</a>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Register -->

<div class="modal fade" id="register">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Register</h4>
            </div>
            <form id="register" action="/auth/register" method="POST" role="form">
                <div class="modal-body">

                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" value="" class="form-control">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>