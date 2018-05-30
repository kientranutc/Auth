@if(session()->has('success'))
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" style="margin-right: 25px;" aria-label="close">&times;</a>
        <strong>Success!</strong> {{session()->get('success')}}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" style="margin-right: 25px;" aria-label="close">&times;</a>
        <strong>Error!</strong> {{$errors->first()}}
    </div>
@endif