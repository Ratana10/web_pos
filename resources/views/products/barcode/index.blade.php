@extends('layouts.app')
@section('title', 'Barcode')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left">PRODUCT BARCODE</h4>

                    </div>
                    <div class="card-body">
                        <div class="print">
                            <div class="row">
                                @foreach ($products_barcode as $item)
                                    <div class="col-lg-3 col-md-4 col-sm-12 mt-3 text-center">
                                        <div class="card">
                                            <div class="card-body">
                                                {!! $item->barcode !!}
                                                <div class="h4 text-center p-1 mt-2">{{ $item->product_code }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>



@endsection
