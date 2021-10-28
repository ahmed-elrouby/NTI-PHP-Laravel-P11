@extends('layouts.layout')
@section('title','All Products')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
@include('messages.message')
<div class="col-12">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 0
            @endphp
            @foreach($products as $product)
            <tr>
                @php
                $i +=1
                @endphp
                <td>{{$i}}</td>
                <td>{{$product->name_en}}</td>
                <td>{{$product->price}}</td>
                @if ($product->quantity == 0)
                <td class="text-danger">
                    {{$product->quantity}}
                </td>
                @elseif($product->quantity > 0 AND $product->quantity <= 5) <td class="text-warning">
                    {{$product->quantity}}
                    </td>
                    @else
                    <td class="text-success">
                        {{$product->quantity}}
                    </td>
                    @endif
                    <td>@if($product->status=='1')
                        {{"Active"}}
                        @else
                        {{"Not-Active"}}
                        @endif
                    </td>
                    <td>{{$product->created_at}}</td>
                    <td>
                        <div class="row">
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary rounded">
                                <!-- <?php echo route('products.edit', $product->id) ?> -->
                                <!-- <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary rounded"> -->
                                Edit
                            </a>
                            <form action="{{route('products.delete',$product->id)}}" method="post" class="col">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger rounded">Delete</button>
                            </form>
                        </div>
                    </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
