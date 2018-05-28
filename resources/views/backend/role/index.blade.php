@extends('backend.layouts.master')

@section('content')
    <div class="padding-md">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
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
                                              <input type="checkbox">
                                              <span class="custom-checkbox"></span>
                                              Is_admin
                                          </label>
                                      </div><!-- /form-group -->
                                  </div>
                                  <div class="col-md-2 text-right">
                                      <button type="submit" class="btn btn-success btn-sm ">Save</button>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="role-name">Name</label>
                                <input type="text" class="form-control input-sm" id="role-name" placeholder="Role Name">
                            </div><!-- /form-group -->

                        </form>
                    </div>
                    <div class="panel-heading">Permission</div>
                    <div class="panel-body">
                        <div class="row">
                            @foreach(config('constant.permission') as $key=>$item)
                            <div class="col-md-3">
                                <div class="form-group text-left">
                                    <label class="label-checkbox">
                                        <input type="checkbox" name=permission[$key][] data-key="{{$key}}" value="{{$key
                                        }}">
                                        <span class="custom-checkbox"></span>
                                        {{$item['title']}}
                                    </label>
                                </div><!-- /form-group -->
                                <div class="role-child" style="margin-left:50px">
                                @foreach($item['child'] as $k=>$v)
                                <div class="form-group">
                                    <label class="label-checkbox">
                                        <input type="checkbox" class="{{$key}}-child" data-count="{{count($item['child'])}}" name="permission[$key][]" value="{{$k}}">
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
    </div>
@stop