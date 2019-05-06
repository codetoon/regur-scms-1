@extends('layouts.app')

@section('content')
<div class="prefixes_flex_container">
    <div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="purchase_order_prefix">Purchase Order Prefix</label>
            <div class="col-sm-7">
                <input type="text" id="purchase_order_prefix" class="form-control" name="purchase_order_prefix" value="{{ old('purchase_order_prefix')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="net_purchase_order_num">Net Purchase Order Number</label>
            <div class="col-sm-8">
                <input type="text" id="net_purchase_order_num" class="form-control" name="net_purchase_order_num" value="{{ old('net_purchase_order_num')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="supplier_return_prefix">Supplier Return Prefix</label>
            <div class="col-sm-8">
                <input type="text" id="supplier_return_prefix" class="form-control" name="supplier_return_prefix" value="{{ old('supplier_return_prefix')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="net_supplier_return_num">Net Supplier Return Number</label>
            <div class="col-sm-8">
                <input type="text" id="net_supplier_return_num" class="form-control" name="net_supplier_return_num" value="{{ old('net_supplier_return_num')}}" autofocus >
            </div>
        </div>
    </div>
    
    <div >
        <div class="form-group row">
                <label class="col-sm-5 col-form-label" for="stock_adjustment_prefix">Stock Adjustment Prefix</label>
                <div class="col-sm-7">
                    <input type="text" id="stock_adjustment_prefix" class="form-control" name="stock_adjustment_prefix" value="{{ old('stock_adjustment_prefix')}}" autofocus >
                </div>
            </div>
    </div>
    <div style="background-color: blue">
    
    </div>
</div>


@endsection