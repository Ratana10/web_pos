<!-- Add New Modal -->
<div class="modal fade" id="print" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Invoice
                <strong>01/01/01/2018</strong>
                <span class="float-right"> <strong>Status:</strong> Pending</span>
            </div>

            <div class="modal-body">

                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="mb-3">From:</h6>
                        <div>
                            <strong>Webz Poland</strong>
                        </div>
                        <div>Customer Name: unknow</div>
                        <div>Phone: +00000000</div>
                    </div>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Item</th>
                                <th> price</th>
                                <th> Qty</th>
                                <th> dis</th>
                                <th> Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order_receipt as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product->product_name }}</td>
                                    <td>{{ number_format($item->unitprice, 2) }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->discount==null ? 0:$item->discount }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <td>
                                    --------------------------
                                </td>
                                <tr>
                                    <td class="left">
                                        <strong>Subtotal</strong>
                                    </td>
                                    <td class="right">{{ number_format($order_receipt->sum('amount')) }}</td>
                                </tr>
                                <tr>
                                    <td class="left">
                                        <strong>Total</strong>
                                    </td>
                                    <td class="right">
                                        <strong>$ {{ number_format($order_receipt->sum('amount'), 2) }}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>


            </div>



        </div>
    </div>
</div>
</div>
{{-- End Add New Modal --}}
