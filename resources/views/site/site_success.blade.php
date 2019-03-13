@extends("site.site_layouts.site_master")
@section("content")
    <div class="container">
        <div class="row justify-content-center mt-5">
<div class="col-auto mt-5">
    <h3 class="title text-white mt-5">{{auth()->user()->name}} {{" "}}your Order have been placed successfully</h3>
</div>
        </div>
        <div class="row justify-content-center mt-0">
            <div class="col-auto">
                <a href="/" class="btn btn-round btn-instagram">continue shopping</a>
            </div>
        </div>
    </div>
    @endsection
