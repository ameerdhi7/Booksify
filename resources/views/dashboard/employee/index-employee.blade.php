<!-- ================ categories INDEX ============ -->
@extends("layouts.master")
@section("content")
    <link rel="stylesheet" href="https://www.cssscript.com/demo/animated-customizable-range-slider-pure-javascript-rslider-js/css/rSlider.min.css">
    <div class="row justify-content-center mt-5" id="app">
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
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td class="text-center">{{$employee->id}}</td>
                                <td>{{$employee->name}}</td>
                                <td class="td-actions text-right">
                                   <button class="btn btn-info" @click="setId({{$employee->id}})">
                                       + add attendance
                                      </button>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="/dashboard/employees/{{$employee->id}}/edit" class="btn btn-info"> <i
                                                class="material-icons">edit</i>
                                        </a>
                                        <form action="/dashboard/employees/" METHOD="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn-danger btn"><i
                                                    class="material-icons">close</i></button>
                                        </form>
                                        <a href="/dashboard/employees/{{$employee->id}}/" class="btn ml-1 btn-success"> attendance showcase
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add a attendance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <form action=/dashboard/attendance/ id="attendance" method="post">
                            @csrf
                            <input value="09:00"    type="time" id="checkIN"  name="check_in" class="form-control " >
                            <label for="checkIN">check in</label>
                            <input value="04:00"   id="checkOut" type="time" valu name="check_out" class="form-control " >
                            <label for="checkOut">check out</label>
                            <input type="date"  name="attendance_day" class="form-control mt-3" required>
                            <label >attendance day</label>
                            <input  value="2020:12:12" type="number" hidden :value="currentId" name="employee_id" class="form-control" >
                            <input type="number" value="0"  name="late" class="form-control mt-3" hidden>
                        @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger mt-0" role="alert">
                                        <ul>
                                            <li>{{$error}}</li>
                                        </ul>
                                    </div>
                                @endforeach
                            @endif
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button form="attendance" type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("scripts")
    <script>
        let vue = new Vue({
            el: "#app",
            data: {
                currentId: null,
            },
            methods: {
                setId(id) {
                    this.currentId=id;
                    $('#exampleModal').modal('show');
                },
            },
            mounted:function () {
                @if($errors->any())
                this.setId({{session()->get("id")}});
                 @endif
            }

        });
    </script>


@endsection

