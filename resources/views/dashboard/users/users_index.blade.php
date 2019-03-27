<!-- ================ USERS INDEX ============ -->
@extends("layouts.master")
@section("content")

    <div class="row justify-content-center mt-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header blue-gradient-rgba m-0 text-white">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"><h4>Users Table</h4></div>
                        <div class="col-auto"><a class="btn btn-success btn-round btn-sm blue-gradient-rgba"
                                                 href="/dashboard/users/create"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>User Name</th>
                                <th> Email</th>
                                <th> City</th>
                                <th> Region</th>
                                <th class="text-center">Image</th>
                                <th class="text-center"> Registered Date</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($users as $user)
                                <tr>

                                    <td class="text-center">{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->city}}</td>
                                    <td>{{$user->region}}</td>
                                    <td class="text-center"><img class="user_img" src="/{{$user->image}}" alt=""></td>
                                    <td class="text-center">{{$user->created_at}}</td>
                                    <td class="td-actions text-right">

                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/dashboard/users/{{$user->id}}/edit" class="btn btn-info"> <i
                                                        class="material-icons">edit</i>
                                            </a>

                                            <form action="/dashboard/users/{{$user->id}}" METHOD="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn-danger btn"><i class="material-icons">close</i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection

