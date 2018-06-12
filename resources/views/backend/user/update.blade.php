@extends('backend.layouts.master')

@section('content')
    <div class="padding-md">

        <form method="post" action="{{URL::route('user.update-post', $dataUserEdit->user_id)}}">
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
                                    Edit new user
                                </div>

                            </div>
                        </div>
                        <div class="panel-body">
                            <h4><strong>Login information</strong></h4>
                            <div class="row">
                                <div class="col-md-6 {{($errors->has('username'))?'has-error':''}}">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control input-sm" disabled name="username" id="username" value="{{old('username')?old('username'):$dataUserEdit->username}}" placeholder="Username">
                                        <p class="text-danger"> {{$errors->first('username')}}</p>
                                    </div><!-- /form-group -->
                                </div>
                                <div class="col-md-6 {{($errors->has('email'))?'has-error':''}}">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control input-sm" disabled name="email" id="email" value="{{old('email')?old('email'):$dataUserEdit->email}}" placeholder="Email">
                                        <p class="text-danger">{{$errors->first('email')}}</p>
                                    </div><!-- /form-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 {{($errors->has('password'))?'has-error':''}}">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control input-sm" name="password" id="password" value="{{old('pasword')}}" placeholder="Password">
                                        <p class="text-danger">{{$errors->first('password')}}</p>
                                    </div><!-- /form-group -->
                                </div>
                                <div class="col-md-6 {{($errors->has('confirm_password'))?'has-error':''}}">
                                    <div class="form-group">
                                        <label for="c_password">Confirm password</label>
                                        <input type="password" class="form-control input-sm" name="confirm_password" id="c_password" value="{{old('confirm_password')}}" placeholder="Confirm password">
                                        <p class="text-danger"> {{$errors->first('confirm_password')}}</p>
                                    </div><!-- /form-group -->
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h4><strong>User information</strong></h4>
                            <div class="row">
                                <div class="col-md-6 {{($errors->has('role'))?'has-error':''}}">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" class="form-control" id="role">
                                            <option value="-1">--Choose--</option>
                                            @forelse($dataRole as $item)
                                                <option value="{{$item->id}}" {{($item->id==$dataUserEdit->role_id)?"selected":""}}>{{$item->name}}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                        <p class="text-danger">{{$errors->first('role')}}</p>
                                    </div><!-- /form-group -->
                                </div>
                                <div class="col-md-6 {{($errors->has('fullname'))?'has-error':''}}">
                                    <div class="form-group">
                                        <label for="fullname">Fullname</label>
                                        <input type="text" class="form-control input-sm" name="fullname" id="fullname" value="{{old('fullname')?old('fullname'):$dataUserEdit->fullname}}" placeholder="Fullname">
                                        <p class="text-danger">{{$errors->first('fullname')}}</p>
                                    </div><!-- /form-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control input-sm" name="phone" id="phone" value="{{old('phone')?old('phone'):$dataUserEdit->phone}}" placeholder="phone">
                                    </div><!-- /form-group -->
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control input-sm" name="address" id="address" value="{{old('address')?old('address'):$dataUserEdit->address}}" placeholder="Address">
                                    </div><!-- /form-group -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success btn-sm "> <i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
                            </div>
                        </div>
                    </div><!-- /panel -->
                </div><!-- /.col -->
            </div>
        </form>
    </div>
@stop
