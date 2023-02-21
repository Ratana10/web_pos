<!-- Add New Modal -->
<div class="modal fade" id="addNewSupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">ADD SUPPLIER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route('supplier.addNew')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label>Supplier Name</label>
                            <input type="text" name="supplier_name" id="" class="form-control" autofocus>
                        </div>
                        <div class="form-group mb-2">
                            <label>Address</label>
                            <input type="text" name="address" id="" class="form-control" autofocus>
                        </div>
                        <div class="form-group mb-2">
                            <label>Phone</label>
                            <input type="text" name="phone" id="" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="email" name="email" id="" class="form-control">
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
