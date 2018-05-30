@extends('backend.layouts.master')

@section('content')
    <div class="padding-md">
        <form method="post" action="{{URL::route('role.update-post',[$arrRole['id']])}}">
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
                                    Update Role
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
                                <input type="text" class="form-control input-sm" name="name" value="{{(old('name'))?old('name'):$arrRole['name']}}" id="role-name" placeholder="Role Name">
                            </div><!-- /form-group -->
                        </div>
                        <div class="panel-heading">Permission</div>
                        <div class="panel-body">
                            <div class="row">
                                @foreach(config('constant.permission') as $key=>$item)
                                    <div class="col-md-3">
                                        <div class="form-group text-left">
                                            <label class="label-checkbox" style="color: darkgreen; font-weight: bold">
                                                <input type="checkbox" name="permission[]" {{(!empty($arrRole['permission']) && in_array($key,$arrRole['permission']))?"checked":""}}  class="check-role-all" id="role-{{$key}}" data-key="{{$key}}"value="{{$key}}">
                                                <span class="custom-checkbox"></span>
                                                {{$item['title']}}
                                            </label>
                                        </div><!-- /form-group -->
                                        <div class="role-child" style="margin-left:50px">
                                            @foreach($item['child'] as $k=>$v)
                                                <div class="form-group">
                                                    <label class="label-checkbox">
                                                        <input type="checkbox"  {{(!empty($arrRole['permission']) && in_array($k,$arrRole['permission']))?"checked":""}}  class="role-child {{$key}}-permission-child"  data-key="{{$key}}" data-count="{{count($item['child'])}}" name="permission[]" value="{{$k}}">
                                                        <span class="custom-checkbox"></span>
                                                        {{$v}}
                                                    </label>
                                                </div><!-- /form-group -->
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
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