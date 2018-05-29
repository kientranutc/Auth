@extends('backend.layouts.master')

@section('content')
    <div class="padding-md">

        <form method="post" action="{{URL::route('role.add-post')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                            <a href="{{URL::route('role.index')}}" class="btn btn-success"><i class="fa fa-reply fa-lg"></i> Go Back</a>
                        </div><!-- /page-title -->
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    Add new role
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-3 col-md-offset-7" >
                                            <div class="form-group text-right">
                                                <label class="label-checkbox">
                                                    <input type="checkbox" id="check-all">
                                                    <span class="custom-checkbox"></span>
                                                    Administrator
                                                </label>
                                            </div><!-- /form-group -->
                                        </div>
                                        <div class="col-md-2 text-right">
                                            <button type="submit" class="btn btn-success btn-sm "> <i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="role-name">Name</label>
                                <input type="text" class="form-control input-sm" name="name" id="role-name" placeholder="Role Name">
                            </div><!-- /form-group -->
                        </div>
                        <div class="panel-heading">Permission</div>
                        <div class="panel-body">

                        </div>
                    </div><!-- /panel -->
                </div><!-- /.col -->
            </div>
        </form>
    </div>
@stop
@section('script')
    <script src="{{asset('backend/js/role/checkbox.js')}}"></script>
@stop