@extends('backend.layouts.master')
@section('title', 'User')
@section('breadcrumb')
    User
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <a href="{{URL::route('user.add')}}" class="btn btn-success">Add New</a>
        </div><!-- /page-title -->
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                <h4 class="text-danger">User</h4>
            </div>
            <div class="padding-md clearfix">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th width="5%" class="text-center">ID</th>
                            <th width="10%" class="text-center">username</th>
                            <th width="10%" class="text-center">Image</th>
                            <th width="10%" class="text-center">Email</th>
                            <th width="10%" class="text-center">Role</th>
                            <th width="10%" class="text-center">fullname</th>
                            <th width="10%" class="text-center">phone</th>
                            <th width="10%" class="text-center">address</th>
                            <th width="10%" class="text-center">Last login</th>
                            <th width="10%" class="text-center">Created date</th>
                            <th width="10%" class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $dataUser as $item)
                            <tr>
                            <td class="text-center"> {{++$stt}}</td>
                            <td class="text-center"> <strong>{{$item->username}}</strong></td>
                                <td class="text-center"><img src="{{($item->image != '')?$item->image:asset('backend/img/avatar-not-found.png')}}" width="100px" height="70px"  alt=""></td>
                                <td class="text-center"> {{$item->email}}</td>
                                <td class="text-center"><span class="label-success">{{$item->role_name}}</span></td>
                            <td class="text-center"> {{$item->fullname}}</td>
                            <td class="text-center"> {{$item->phone}}</td>
                            <td class="text-center"> {{$item->address}}</td>
                            <td class="text-center"> {{date('Y-m-d h:s:i', strtotime($item->last_login))}}</td>
                            <td class="text-center"> {{date('Y-m-d h:s:i', strtotime($item->created_at))}}</td>
                            <td class="text-center">
                                <a class="btn btn-success" title="Edit" href="{{URL::route('user.update', $item->user_id)}}"><i class="fa fa-edit fa-lg"></i> </a>
                                @if ($item->user_id!=1)
                                <a class="btn btn-danger" title="Delete" onclick="return confirm('Do you want to delete item?')" href="{{URL::route('user.delete',$item->user_id)}}"><i class="fa fa-trash-o fa-lg"></i> </a>
                                @endif
                            </td>
                            </tr>
                            @empty
                        @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.padding-md -->
        </div>
        <!-- /panel -->
    </div>
@stop
@section('script')
    <script>
        $(function() {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                //edit name pagination
                // "language": {
                //     "paginate": {
                //         "first":"Đầu",
                //         "previous": "Trước",
                //         "next":"Tiếp",
                //         "last":"cuối"
                //     },
                //     "sLengthMenu": "Xem _MENU_ bản ghi",
                //     "sInfo":         "Đang xem _START_ đến _END_ trong tổng số _TOTAL_ mục",
                //     "sInfoFiltered": "(được lọc từ _MAX_ mục)",
                //     "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
                //     'sSearchPlaceholder':'Tìm kiếm'
                // },
                "columnDefs": [ {
                    "targets": 10,
                    "orderable": false
                } ]
            });
        });
    </script>
@stop