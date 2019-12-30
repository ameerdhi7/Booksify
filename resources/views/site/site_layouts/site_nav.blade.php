<nav class="navbar navbar-expand-lg bg-light black fixed-top">
    <div class="container-fluid ">
        <div class="navbar-translate">
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse">
            <a class="btn btn-round black text-white " href="/"><i class="material-icons">home</i>Home</a>

            <ul class="navbar-nav ml-auto">

                <li><a class="btn btn-round  btn-sm mr-2 mt-2  black "
                       href="/dashboard/books/"><i class="material-icons">dashboard</i>Dashboard</a>
                </li>
                @auth
                <li>
                    <a href="/books/carts/" class="btn btn-sm mt-2 mr-2 black btn-round">
                        <i class="material-icons">shopping_basket
                        </i> in cart
                    </a>
                </li>
                @else
                    <li>
                        <a href="/login" class="btn btn-sm mt-2 mr-2 black btn-round">
                            <i class="material-icons">shopping_basket
                            </i> in cart
                        </a>
                @endauth

                <li><a class="btn btn-round  btn-sm mr-2 mt-2 black "
                       href="https://github.com/2AMEERDHIAA/Booksify#booksify-rest-api-"><i class="material-icons">rss_feed
                        </i>api</a></li>
                @auth
                    <li class="nav-item active">
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button type="submit" class="btn mt-2 btn-sm mr-2  black  btn-round ">

                                logout <i class="material-icons">logout</i>
                            </button>
                        </form>
                    </li>
                    <li>
                        <a href="#" class="btn btn-sm mt-2 mr-2 black btn-round ">
                            {{auth()->user()->name}} <img class=" img-circle  user_img "
                                                          src="/{{auth()->user()->image}}" alt="">
                        </a>
                    </li>
                @else
                    <li>
                        <a href="/register/" class="btn btn-sm mt-2 mr-2  black btn-round "> sign up
                            <i class="material-icons">add</i>
                        </a>
                    </li>
                    <li>
                        <a href="/login/" class="btn mt-2 btn-sm mr-2 black btn-round "> login
                            <i class="material-icons">account_circle</i>
                        </a>
                    </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>
