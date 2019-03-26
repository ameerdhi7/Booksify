<nav class="navbar navbar-expand-lg bg-light  bg-info  blue-gradient-rgba">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/admins/" class="btn btn-lg"><i class="material-icons">dashboard
                        </i>Admins</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="/"><i class="material-icons">home</i>site home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/books/">Books <i class="material-icons">books</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/categories/">categories<i
                                class="material-icons">category</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/users/">Users <i class="material-icons">people</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard/orders/">orders <i class="material-icons">people</i></a>
                </li>
                {{--<li class="nav-item">--}}
                {{--<h5 class="btn btn-instagram btn-round">{{auth("admin")->admin()->name}} </h5>--}}
                {{--</li>--}}
                <li class="nav-item  ">
                    <form action="/admin/logout" method="post">
                        @csrf
                        <button type="submit" class="btn blue-gradient-rgba btn-sm btn-round btn-info ">
                            logout
                            <i class="material-icons"> logout</i>
                        </button>

                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>


