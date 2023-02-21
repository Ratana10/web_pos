<!-- Edit Modal -->
<div class="modal fade" id="editProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">EDIT PRODUCT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ route('product.update')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <input type="text" name="id" id="edit_id" class="form-control" autofocus>

                        <div class="form-group mb-2">
                            <label>Product Name</label>
                            <input type="text" name="product_name" id="edit_product_name" class="form-control" autofocus>
                        </div>
                        <div class="form-group mb-2">
                            <label>Description</label>
                            <input type="text" name="description" id="edit_description" class="form-control" autofocus>
                        </div>
                        <div class="form-group mb-2">
                            <label>Brand</label>
                            <input type="text" name="brand" id="edit_brand" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label>Price</label>
                            <input type="number" name="price" id="edit_price" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label>Quantity</label>
                            <input type="number" name="quantity" id="edit_quantity" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label>Alert Stock</label>
                            <input type="number" name="alert_stock" id="edit_alert_stock" class="form-control">
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
{{-- End Edit Modal --}}
