<!-- Edit Modal -->
<div class="modal fade" id="editSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">EDIT SUPPLIER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('supplier.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <input type="hidden" name="id" id="edit_id" class="form-control" autofocus>

                    <div class="form-group mb-2">
                        <label>Supplier Name</label>
                        <input type="text" name="supplier_name" id="edit_supplier_name" class="form-control"
                            autofocus>
                    </div>
                    <div class="form-group mb-2">
                        <label>Address</label>
                        <input type="text" name="address" id="edit_address" class="form-control" autofocus>
                    </div>
                    <div class="form-group mb-2">
                        <label>Phone</label>
                        <input type="text" name="phone" id="edit_phone" class="form-control">
                    </div>
                    <div class="form-group mb-2">
                        <label>Email</label>
                        <input type="text" name="email" id="edit_email" class="form-control">
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

{{-- End Edit Modal --}}
