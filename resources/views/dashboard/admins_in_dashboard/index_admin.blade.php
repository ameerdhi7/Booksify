<!-- ================ ADMINS INDEX ============ -->
@extends("layouts.master")
@section("content")
    <div class="row justify-content-center mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header blue-gradient-rgba m-0 text-white">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"><h4>Admins Table</h4></div>
                        <div class="col-auto"><a class="btn btn-success btn-round btn-sm blue-gradient-rgba"
                                                 href="/admins/create"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>admin name</th>
                                <th> admin Email</th>
                                <th class="text-right">Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($admins as $admin)
                                <tr>

                                    <td class="text-center">{{$admin->id}}</td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td class="td-actions text-right">

                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <a href="/admins/{{$admin->id}}/edit" class="btn btn-info"> <i
                                                        class="material-icons">edit</i>
                                            </a>

                                            <form action="/admins/{{$admin->id}}" METHOD="post">
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

