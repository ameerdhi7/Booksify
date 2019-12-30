<!-- ================ categories INDEX ============ -->
@extends("layouts.master")
@section("content")

    <div class="row justify-content-center mt-5">
        <div class="col-9">
            <div class="card">
                <div class="card-header blue-gradient-rgba m-0 text-white">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"><h4>Employees Table</h4></div>
                        <div class="col-auto"><a href="/dashboard/employees/create" class="btn btn-info blue-gradient-rgba btn-sm btn-round blue-gradient"><i class="material-icons"> add</i></a></div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Name</th>
                            <th class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td class="text-center">{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td class="td-actions text-right">
                                   <button onclick="setDate()"  class="btn btn-info">
                                          <i class="material-icons">clock</i>
                                      </button>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/dashboard/employees/{{$employee->id}}/edit" class="btn btn-info"> <i
                                                class="material-icons">edit</i>
                                        </a>
                                        <form action="/dashboard/employees/{{$employee->id}}" METHOD="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-danger btn"><i
                                                    class="material-icons">close</i></button>
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
@endsection
@section("scripts")
    <script>


     async function setDate(id) {

       }
    </script>
@endsection

