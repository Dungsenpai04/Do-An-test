@extends('admin.master')

@section('module', 'Category')
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
    <div class="container">
        <header>
            <input type="text" id="searchInput" class="search-bar" placeholder="Tìm kiếm sản phẩm...">
        </header>
        
        <section class="table-wrapper">
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Create At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 0 , "", ) }} VND</td>
                    <td>{{ $product->product}}</td>
                    <td><span class="right badge badge-{{ $product->status == 1 ? 'success' : 'dark' }}">{{ $product->status == 1 ?'Show' : 'Hidde' }}</span></td>
                    <td><span class="right badge badge-{{ $product->featured == 1 ? 'danger' : 'info' }}">{{ $product->featured == 1 ?'Featured' : 'UnFeatured' }}</span></td>
                        <td>2024-11-30</td>
                        <td class="action-cell">
                            <button class="action-btn">...</button>
                            <div class="action-menu">
                                <button class="edit-btn"><a href="{{ route('admin.product.edit', ['id' =>$product->id]) }}">Edit</a></button>
                                <button class="delete-btn"><a onclick="return confirmDelete ('product')" href="{{ route('admin.product.destroy', ['id' =>$product->id]) }}">Delete</a></button>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </section>
        
        <footer>
            <div id="pagination"></div>
        </footer>
    </div>
<link rel="stylesheet" href="{{ asset('administrator/dist/css/style.css ') }}">
<link rel="stylesheet" href="{{ asset('administrator/dist/css/slylecategory.css ') }}">
<link rel="stylesheet" href="{{ asset('administrator/dist/css/stylefom.css ') }}">
</div>

<!-- /.card -->


@endsection
