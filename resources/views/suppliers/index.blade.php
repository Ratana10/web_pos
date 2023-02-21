@extends('layouts.app')
@section('title', 'Supplier')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">Supplier List</h4>
                        <a href="#" class="btn btn-primary" style="float: right" data-bs-toggle="modal" data-bs-target="#addNewSupplier">
                            <i class="fa fa-plus"></i>
                            Add New Supplier
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Supplier Name</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->supplier_name }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary btnEdit" data-url=" {{ route('supplier.edit', $item->id) }}">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-danger btnDelete" data-url='{{ route('supplier.delete', $item->id) }}'>
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

        @include('suppliers.modals.addNewModal')
        @include('suppliers.modals.editModal')
        @include('suppliers.modals.deleteModal')

    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.btnEdit', function(){
                var editUrl = $(this).data('url');
                $('#editSupplier').modal('show');
                $.ajax({
                    type: 'GET',
                    url: editUrl,
                    success: function(respose){
                        $('#edit_id').val(respose.id);
                        $('#edit_supplier_name').val(respose.supplier_name);
                        $('#edit_address').val(respose.address);
                        $('#edit_phone').val(respose.phone);
                        $('#edit_email').val(respose.email);
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
