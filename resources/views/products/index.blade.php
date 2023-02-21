@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Product List</h4>
                        <a href="#" class="btn btn-primary" style="float: right" data-bs-toggle="modal" data-bs-target="#addNewProduct">
                            <i class="fa fa-plus"></i>
                            Add New Product
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->brand }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>
                                        @if ($item->quantity <= $item->alert_stock)
                                            <span class="badge bg-danger">Low Stock</span>
                                        @else
                                            <span class="badge bg-success ">{{ $item->alert_stock }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary btnEdit" data-url=" {{ route('product.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-danger btnDelete" data-url='{{ route('user.delete', $item->id) }}'>
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">DashBoard</div>
                    <div class="card-body">DashBoard</div>
                </div>
            </div>
        </div>

        @include('products.modals.addNewModal')
        @include('products.modals.editModal')
        @include('products.modals.deleteModal')

    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.btnEdit', function(){
                var editUrl = $(this).data('url');
                $('#editProduct').modal('show');
                $.ajax({
                    type: 'GET',
                    url: editUrl,
                    success: function(respose){
                        $('#edit_id').val(respose.id);
                        $('#edit_product_name').val(respose.product_name);
                        $('#edit_description').val(respose.description);
                        $('#edit_brand').val(respose.brand);
                        $('#edit_price').val(respose.price);
                        $('#edit_quantity').val(respose.quantity);
                        $('#edit_alert_stock').val(respose.alert_stock);
                    }
                });
            });
            $(document).on('click', '.btnDelete', function(){
                const userUrl = $(this).data('url');
                const response = confirm("Are you sure you want to do that?");
                if(response){
                    var id = $(this).val();
                    $.ajax({
                        type: 'GET',
                        url: userUrl,
                        success: function(respose){
                            console.log('success');
                        }
                    });
                }

            });
        });
    </script>

@endsection
