@extends('layouts.app')
@section('title', 'Product')
@section('content')
    <div class="container">
        <form action="{{ route('order.addNew')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header" style="background-color: royalblue; color: white" >
                            <h4 style="float: left; ">ORDER PRODUCT</h4>

                        </div>

                        <div class="card-body">
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
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <select name="product_id[]" id="product_id" class="form-control product_id">
                                                <option value="">Selected Item</option>
                                                @foreach ($products as $item)
                                                    <option data-price="{{ $item->price }}" value="{{ $item->id}}">{{ $item->product_name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                                        </td>
                                        <td>
                                            <input type="number" name="price[]" id="price" class="form-control price">
                                        </td>
                                        <td>
                                            <input type="number" name="discount[]" id="discount" class="form-control discount">
                                        </td>
                                        <td>
                                            <input type="number" name="total[]" id="total" class="form-control total">
                                        </td>
                                        <td>
                                            <a class="btn btn-danger btn-sm btnDelete"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
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
                                <input type="hidden" name="total_amount1" class="total_amount1">
                                <span class="total_amount" name="total_amount">0.00</span>
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
                                <button type="submit" class="btn btn-success" type="button">Save</button>
                                <button class="btn btn-primary" type="button">Calcuate</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="modals">
            <div id="print">
                @include('reports.receipt')
            </div>
        </div>

    </div>

    <script>
        $(document).ready(function(){

            $(document).on('click', '.btnAdd', function(){
                var numberOfRow = ($('.tableOrder tr').length - 0) + 1;
                var tr = `
                <tr>
                    <td>
                        ${numberOfRow}
                    </td>
                    <td>
                        <select name="product_id[]" id="product_id" class="form-control product_id">
                            <option value="">Selected Item</option>
                            @foreach ($products as $item)
                                <option data-price="{{ $item->price }}" value="{{ $item->id}}">{{ $item->product_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="quantity[]" id="quantity" class="form-control quantity">
                    </td>
                    <td>
                        <input type="number" name="price[]" id="price" class="form-control price">
                    </td>
                    <td>
                        <input type="number" name="discount[]" id="discount" class="form-control discount">
                    </td>
                    <td>
                        <input type="number" name="total[]" id="total" class="form-control total">
                    </td>
                    <td>
                        <a class="btn btn-danger btn-sm btnDelete"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                `;
                $(".tableOrder").append(tr);

            });
            $(document).on('click', '.btnDelete', function(){
                $(this).parent().parent().remove();

            });
            function totalAmount(){
                var total_amount = 0;
                $('.total').each(function(i, e){
                    var amount = $(this).val() - 0;
                    total_amount += amount;
                });
                $('.total_amount').html(total_amount);
                $('.total_amount1').val(total_amount);
            };
            $(document).on('change', '.product_id', function(){
                var tr = $(this).parent().parent();
                var price = tr.find('.product_id option:selected').attr('data-price');
                tr.find('.price').val(price);

                var qty = tr.find('.quantity').val() - 0;
                var dis = tr.find('.discount').val() - 0;
                var price = tr.find('.price').val() - 0;
                var total = (qty * price) - ((qty*price*dis)/100);
                tr.find('.total').val(total);

                totalAmount();


            });

            $(document).on('keyup', '.quantity',  function(){
                var tr = $(this).parent().parent();
                var price = tr.find('.product_id option:selected').attr('data-price');
                tr.find('.price').val(price);

                var qty = tr.find('.quantity').val() - 0;
                var dis = tr.find('.discount').val() - 0;
                var price = tr.find('.price').val() - 0;
                var total = (qty * price) - ((qty*price*dis)/100);
                tr.find('.total').val(total);

                totalAmount();
            });

            $(document).on('keyup', '.discount', function(){
                var tr = $(this).parent().parent();
                var price = tr.find('.product_id option:selected').attr('data-price');
                tr.find('.price').val(price);

                var qty = tr.find('.quantity').val() - 0;
                var dis = tr.find('.discount').val() - 0;
                var price = tr.find('.price').val() - 0;
                var total = (qty * price) - ((qty*price*dis)/100);
                tr.find('.total').val(total);

                totalAmount();
            });

            $(document).on('keyup', '.payment', function(){
                var total_amount = $('.total_amount').html();
                var payment = $(this).val();
                var cash_return = payment - total_amount;
                $('.cash_return').val(cash_return);

            });



        });
        function printReceiptContent(el){
                var data = `
                    <input type="button" id="printPageButton" class="printPageButton" style="display: block; width: 100%; border: none; background-color: #008B8B; color: #fff;
                    padding: 14px 20px; font-size: 16px; cursor: pointer; text-align: center" value="Print Receipt" onclick="window.print()">
                `;
                data += document.getElementById(el).innerHTML;
                myReceipt = window.open("", "myWin", "left=150, top=130, width=400, height=500");
                myReceipt.screnX = 0;
                myReceipt.screnY = 0;
                myReceipt.document.write(data);
                myReceipt.document.title = "Print Receipt";
                myReceipt.focus();
                setTimeout(() => {
                    myReceipt.close();
                }, 8000);

            }
    </script>

@endsection
