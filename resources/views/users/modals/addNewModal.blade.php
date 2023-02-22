<!-- Add New Modal -->
<div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD USER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route('user.addNew')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label>Name</label>
                            <input type="text" name="name"  class="form-control" autofocus>
                        </div>
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="text" name="email"  class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label>Password</label>
                            <input type="password" name="password"  class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password"  class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label>Role</label>
                            <select name="is_admin" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">Cashier</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Close">
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add New Modal --}}
