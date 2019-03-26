<!-- ================ CARTS INDEX ============ -->
@extends("site.site_layouts.site_master")
@section("content")
    <div class="container" id="carts">


        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header special blue-gradient-rgba text-white m-0">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto "><h4 class="title">IN CART</h4></div>
                            <div class="col-auto">
                                <a :href="`/books/orders/${books[0].id}`"
                                   class="btn title btn-round  btn-info blue-gradient-rgba ">
                                    CHECK OUT  <i
                                            class="material-icons">shopping_basket
                                    </i> </a>
                            </div>

                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Poster</th>
                                    <th>Book Title</th>
                                    <th>Book Price</th>
                                    <th>Author</th>
                                    <th>Edition Year</th>
                                    <th class="text-center">Remove </th>

                                </tr>
                                </thead>

                                <tbody v-for="book in books">


                                <tr>
                                    <td class="text-center">@{{book.id}}</td>
                                    <td><img class="img_cart" :src="`/${book.poster}`" alt=""></td>
                                    <td>@{{ book.title }}</td>
                                    <td>@{{ book.price }} &dollar;</td>
                                    <td> @{{ book.author }}</td>
                                    <td>@{{ book.edition_number }}</td>
                                    <td class="td-actions text-center ">
                                        <form :action="`/books/carts/${book.id}`" METHOD="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-danger   btn"><i
                                                        class="material-icons">remove_shopping_cart</i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>

                            </table>

                        </div>
                        <div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@section("scripts")

    <script>
        let vue = new Vue({
            el: "#carts",
            data: {


                books: [],
                test: false

            },
            methods: {

                getUserCarts: function () {

                    axios.get("/books/carts/cart").then(response => {
                        this.books = response.data.books;
                        this.text = true;


                    })

                }


            },
            mounted() {
                this.getUserCarts()
            }


        })
    </script>



@endsection

