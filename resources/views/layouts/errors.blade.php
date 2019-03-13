<!--==========ERRORS FILE TO USE IN FORM ALERTING THE USERS INPUT MISTAKES=======-->
@if($errors->any())
    @foreach($errors->all() as $error)
<div class="alert alert-danger mt-0" role="alert">
<ul>
    <li>{{$error}}</li>
</ul>
</div>
@endforeach
@endif