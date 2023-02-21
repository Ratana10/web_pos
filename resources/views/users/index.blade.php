@extends('layouts.app')
@section('title', 'User')
@section('content')
    <div class="containe">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">User</h4>
                        <a href="#" class="btn btn-primary" style="float: right" data-bs-toggle="modal" data-bs-target="#addNewUser">
                            <i class="fa fa-plus"></i>
                            Add New User
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->is_admin ==1 ? 'admin': 'cashier' }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button value="{{ $item->id }}" class="btn btn-primary btnEdit">
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

        @include('users.modals.addNewModal')
        @include('users.modals.editModal')
        @include('users.modals.deleteModal')

    </div>

    <script>
        $(document).ready(function(){
            $(document).on('click', '.btnEdit', function(){
                var id = $(this).val();
                $('#editUser').modal('show');
                $.ajax({
                    type: 'GET',
                    url: '/user/edit/' + id,
                    success: function(respose){
                        $('#edit_id').val(respose.id);
                        $('#edit_name').val(respose.name);
                        $('#edit_email').val(respose.email);
                        $('#edit_password').val(respose.password);
                        $('#edit_is_admin').val(respose.is_admin);
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
