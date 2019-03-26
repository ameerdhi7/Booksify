@extends("site.site_layouts.site_master")
@section("content")
    <div class="container" id="books">
        <div class="row justify-content-between  mt-5">
            <div class="col-lg-5 col-sm-auto">
                <a href="http://ameerdhiaa.codelab.camp"><h1 class="title text-white">
                        Booksify</h1></a>
            </div>
            <div class="col-lg-7  col-sm-5"><h3 class="text-white ml-3 wow slideInLeft" data-wow-delay="0.3"
                                                data-wow-duration="1s">
                    Scientific Books , Philosophical, Novels...Filter And Find Your Best Book By It's Title or Price
                    Quickly !
                </h3></div>
        </div>
        <div class="text-white  row mt-0 justify-content-center align-items-center">

            <div class="col-lg-3 col-sm-12 ">
                <div class="form-group no-border form-inline ml-auto wow slideInRight" data-wow-duration="1.5s"
                     data-wow-delay="0.3s">
                    <!-- the visiter can search and filter on keyup-->
                    <input v-model="term" @keyup="search" type="text" id="search" class="form-control text-white"
                           placeholder="Search">
                    <i class="material-icons btn btn-just-icon btn-instagram btn-round">search</i>
                </div>

            </div>
        </div>
        <div class="row  justify-content-center align-items-center mt-0 ">
            <div v-for="book in books" class="col-lg-3 col-sm-10">

                <div class="card card-profile wow slideInDown ml-auto mr-auto" data-wow-duration="1.5s"
                     data-wow-delay="0.5">
                    <div class="card-header card-header-image">
                        <div class="animate">
                            <img class="img  img_height " :src="`/${book.poster}`">
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <h4 class="card-title"> @{{book.title}}</h4>
                            </div>
                            <div class="col-auto">
                                <h4 class="card-title">
                                    @{{book.price}} &dollar;
                                </h4>
                            </div>
                        </div>
                        <div class="row justify-content-around align-items-center mt-0">
                            <div class="col-lg-4  col-sm-auto" v-for="categories in book.categories">
                                <span class="badge-default badge pick-size">@{{ categories.type }}</span>
                            </div>
                        </div>
                        <div class="row justify-content-center align-items-center">
                            <div class="col-auto ">
                                <h5 class="card-category text-gray"> @{{book.author}}
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer justify-content-center align-items-center">

                        {{--<form action="/books/carts" method="post">--}}
                        @csrf
                        <input name="books[]" :value=" book.id " type="hidden">
                        @auth
                            <input name="user_id" value="{{auth()->user()->id}}" type="hidden">
                        @endauth
                        @auth
                            <button @click="addToCart(book.id)" type="submit" class="btn btn-round special"><i
                                        class="material-icons">add_shopping_cart</i>Cart
                            </button>
                            <a :href="`/books/orders/${book.id}`"
                               class="btn btn-outline-light special btn-md btn-round"><i
                                        class="material-icons">shop</i>Buy
                            </a>
                        @else
                            <a class="btn text-white tip btn-round special"><i
                                        class="material-icons">add_shopping_cart</i>cart<span>login or register</span>
                            </a>
                            <a
                                    class="btn tip text-white btn-outline-light special btn-md btn-round"><i
                                        class="material-icons">shop</i>Buy <span>login or register</span>
                            </a>
                        @endauth

                        {{--</form>--}}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section("scripts")
    <script>
        let vue = new Vue({
            el: "#books",
            data: {
                term: "",
                books: [],
                pagination: [],
            },
            methods: {
                addToCart(bookId) {
                    axios.post(`/books/carts/add/${bookId}`).then(response => {
                        alert("Book Added To Cart Successfully")
                    })
                },
                getAllBooks: function () {
                    axios.get("/books/").then(response => {
                        this.books = response.data.books.data;
                        this.pagination = response.data.books;


                    })
                },
                search: function () {     // The search work and filter by price and books title on key up the axios gonna send an api request on the char.

                    axios.get("/booksbysearch/", {
                        params: {
                            term: this.term
                        }
                    }).then(response => {
                        this.books = response.data.books;
                    })
                },
                order: function () {
                    axios.get("/books/orders/", {
                        params: {
                            term: "",
                        }
                    })
                }
            },

            mounted() {

                this.getAllBooks()
            }

        });
    </script>
    @include("site.site_layouts.site_footer")

@endsection


