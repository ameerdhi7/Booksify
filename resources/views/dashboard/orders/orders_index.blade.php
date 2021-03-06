<!-- ================ OREDERS INDEX ============ -->
@extends("layouts.master")
@section("content")

    <div class="row justify-content-center mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header blue-gradient-rgba text-white m-0">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-auto"><h4>Orders Table</h4></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>user name</th>
                                <th>phone number</th>
                                <th>region</th>
                                <th>city</th>
                                <th>Date</th>
                                <th class="text-center">actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($orders as $order)
                                <tr>

                                    <td class="text-center">{{$order->id}}</td>
                                    <td>{{$order->user->name}}</td>
                                    <td>{{$order->phone_number}}</td>
                                    <td>{{$order->region}}</td>
                                    <td>{{$order->city}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td class="text-center">
                                        <a href="/dashboard/orders/{{$order->id}}"
                                           class="btn-sm btn  btn-round btn-info">
                                            view items <i class="material-icons">
                                                person </i>

                                        </a>
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

    </div>
    </div>
@endsection

