<!-- Edit Modal -->
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">EDIT USER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route('user.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <input type="hidden" name="id" id="edit_id" class="form-control">

                        <div class="form-group mb-2">
                            <label>Name</label>
                            <input type="text" name="name" id="edit_name" class="form-control" autofocus>
                        </div>
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="text" name="email" id="edit_email" class="form-control">
                        </div>

                        <div class="form-group mb-2">
                            <label>Password</label>
                            <input type="password" name="password" id="edit_password" class="form-control">
                        </div>

                        <div class="form-group mb-2">
                            <label>Role</label>
                            <select name="is_admin" id="edit_is_admin" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Cashier</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Close">
                        <input type="submit" class="btn btn-success" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Edit Modal --}}
