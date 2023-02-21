{{-- <form action="{{ route('order.addNew')}}" method="post"> --}}
    {{-- @csrf --}}
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" style="background-color: royalblue; color: white" >
                    <h4 style="float: left; ">ORDER PRODUCT</h4>

                </div>

                <div class="card-body">
                    <div class="mt-3">
                        <form wire:submit.prevent="insertIntoCart">
                            
                            <input type="text" wire:model="product_id" class="form form-control" placeholder="Enter Product Code">
                        </form>
                        <div class="alert alert-success">{{ $message }}</div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th style="width: 30%">Product Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Dis</th>
                                <th>Total</th>
                                <th><a  class="btn btn-success btn-sm btnAdd"><i class="fa fa-plus"></i></a></th>
                            </tr>
                        </thead>
                        <tbody class="tableOrder">
                            @foreach ($carts as $item)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <input type="text" name="product_name[]" id="product_name" class="form-control quantity" value="{{ $item->product->product_name }}">
                                    </td>
                                    <td width="15%">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="btn btn-group">
                                                    <button class="btn btn-sm btn-danger" wire:click.prevent="decreaseQty({{ $item->id }})">-</button>
                                                    <label class="form form-control" >{{ $item->product_qty }}</label>
                                                    <button class="btn btn-sm btn-success" wire:click.prevent="increaseQty({{ $item->id }})">+</button>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <input type="text" name="price[]" id="price" class="form-control price" readonly value="{{ number_format($item->product->price, 2) }}">
                                    </td>
                                    <td>
                                        <input type="number" name="discount[]" id="discount" class="form-control discount" value="">
                                    </td>
                                    <td>
                                        <input type="text" name="total[]" id="total" class="form-control total" value="{{ number_format($item->product_price, 2) }}">
                                    </td>
                                    <td>
                                        <a class="btn btn-danger btn-sm btnDelete" wire:click="removeCart({{ $item->id }})"><i class="fa fa-times"></i></a>
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
                <div class="card-header">
                    <h4>
                        Total :
                        <span class="total_amount" name="total_amount">$ {{ number_format($carts->sum('product_price'), 2) }}</span>
                    </h4>
                </div>
                <div class="card-body">
                   <div class="btn-group-sm mb-3">
                        <button type="button" class="btn btn-dark " onclick="printReceiptContent('print')">
                            <i class="fa fa-print"></i>
                            Print
                        </button>
                        <button type="button" class="btn btn-primary" onclick="PrintReceiptContent('print')">
                            <i class="fa fa-print"></i>
                            History
                        </button>
                        <button type="button" class="btn btn-danger" onclick="PrintReceiptContent('print')">
                            <i class="fa fa-print"></i>
                            Receipt
                        </button>
                   </div>
                    <div class="form-group">
                        <label >Customer Name</label>
                        <input type="text" name="customer_name" id="" class="form-control">
                        <label >Customer Phone</label>
                        <input type="text" name="customer_phone" id="" class="form-control">

                    </div>
                    <div class="form-group">
                        <label >Payment</label>
                        <input type="number" name="payment" id="" class="form-control payment">
                    </div>
                    <div class="form-group">
                        <label >Cash Return</label>
                        <input type="number" name="cash_return" id="" class="form-control cash_return" readonly>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="button" class="btn btn-success" type="button">Save</button>
                        <button class="btn btn-primary" type="button">Calcuate</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
{{-- </form> --}}

