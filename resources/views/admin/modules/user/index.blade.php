@extends('admin.master')

@section('module', 'User')
@section('action', 'List')

@push('css')
<link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-responsive/css/responsive.bootstrap4.min.css ') }}">
<link rel="stylesheet" href="{{ asset('administrator/plugins/datatables-buttons/css/buttons.bootstrap4.min.css ') }}">
@endpush

@push('js')
<script src="{{ asset('administrator/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('administrator/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endpush

@push('handlejs')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
    function confirmDelete (module) {
      return confirm(`bạn có muốn xóa không this ${module} ?`)
    }
  </script>
@endpush
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">User list</h3>

        <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
        </button>
        </div>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Create At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->level == 1 && $user->id == 1)
                            <span class="right badge badge-danger">Super Admin</span>
                        @elseif($user->level == 1)
                            <span class="right badge badge-info">Admin</span>
                        @else
                            <span class="right badge badge-dark">Member</span>
                        @endif
                    </td>
                    <td>
                        @if($user->status == 1)
                            <span class="right badge badge-success">Hiển thị</span>
                        @else
                            <span class="right badge badge-danger">Ẩn</span>
                        @endif
                    </td>
                  
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ date('d/m/Y - H:m:i', strtotime($user->created_at)) }}</td>
                    <td><a href="{{ route('admin.user.edit', ['id' =>$user->id]) }}">Edit</a></td>
                    <td><a onclick="return confirmDelete ('user')" href="{{ route('admin.user.destroy', ['id' =>$user->id]) }}">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Fullname</th>
                    <th>Phone</th>
                    <th>Create At</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- /.card -->


@endsection
