@extends('backend.layouts.master')
@section('title', 'Contact')
@section('breadcrumb')
    Contact
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
            <a href="{{URL::route('role.add')}}" class="btn btn-success">Add New</a>
        </div><!-- /page-title -->
        <div class="panel panel-default table-responsive">
            <div class="panel-heading">
                <h4 class="text-danger">Role</h4>
            </div>
            <div class="padding-md clearfix">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th width="5%" class="text-center">ID</th>
                            <th width="15%" class="text-center">Name</th>
                            <th width="15%" class="text-center">User create</th>
                            <th width="10%" class="text-center">Create date</th>
                            <th width="10%" class="text-center"></th>
                        </tr>
                        </thead>
                        <tbody>

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
                    "targets": 4,
                    "orderable": false
                } ]
            });
        });
    </script>
@stop