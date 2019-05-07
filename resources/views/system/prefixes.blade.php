@extends('layouts.app')

@section('content')
<div class="prefixes_flex_container">
    <div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="purchase_order_prefix" style="text-align: right">Purchase Order Prefix</label>
            <input type="text" id="purchase_order_prefix" class="form-control col-sm-6" name="purchase_order_prefix" value="{{ old('purchase_order_prefix')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="net_purchase_order_num">Net Purchase Order Number</label>
           
                <input type="text" id="net_purchase_order_num" class="form-control col-sm-6" name="net_purchase_order_num" value="{{ old('net_purchase_order_num')}}" autofocus >
          
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="supplier_return_prefix">Supplier Return Prefix</label>
            <div class="col-sm-6">
                <input type="text" id="supplier_return_prefix" class="form-control" name="supplier_return_prefix" value="{{ old('supplier_return_prefix')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 prefixes_label" for="net_supplier_return_num">Net Supplier Return Number</label>
            <div class="col-sm-7">
                <input type="text" id="net_supplier_return_num" class="form-control" name="net_supplier_return_num" value="{{ old('net_supplier_return_num')}}" autofocus >
            </div>
        </div>
    </div>
    
    <div >
        <div class="form-group row">
                <label class="col-sm-5 prefixes_label" for="stock_adjustment_prefix">Stock Adjustment Prefix</label>
                <div class="col-sm-7">
                    <input type="text" id="stock_adjustment_prefix" class="form-control" name="stock_adjustment_prefix" value="{{ old('stock_adjustment_prefix')}}" autofocus >
                </div>
            </div>
        <div class="form-group row">
            <label class="col-sm-5 prefixes_label" for="next_stock_adjustment_num">Next Stock Adjustment Number</label>
            <div class="col-sm-7">
                <input type="text" id="next_stock_adjustment_num" class="form-control" name="next_stock_adjustment_num" value="{{ old('next_stock_adjustment_num')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 prefixes_label" for="stock_take_prefix">Stock Take Prefix</label>
            <div class="col-sm-7">
                <input type="text" id="stock_take_prefix" class="form-control" name="stock_take_prefix" value="{{ old('stock_take_prefix')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="next_stock_take_number">Net Purchase Order Number</label>
            <div class="col-sm-7">
                <input type="text" id="next_stock_take_number" class="form-control" name="next_stock_take_number" value="{{ old('next_stock_take_number')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="transfer_order_prefix">Transfer Order Prefix</label>
            <div class="col-sm-7">
                <input type="text" id="transfer_order_prefix" class="form-control" name="transfer_order_prefix" value="{{ old('transfer_order_prefix')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="next_transfer_order_num">Next Transfer Order Number</label>
            <div class="col-sm-7">
                <input type="text" id="next_transfer_order_num" class="form-control" name="next_transfer_order_num" value="{{ old('next_transfer_order_num')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="assembly_prefix">Assembly Prefix</label>
            <div class="col-sm-7">
                <input type="text" id="assembly_prefix" class="form-control" name="assembly_prefix" value="{{ old('assembly_prefix')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="next_assembly_number">Next Assembly Number</label>
            <div class="col-sm-7">
                <input type="text" id="next_assembly_number" class="form-control" name="next_assembly_number" value="{{ old('next_assembly_number')}}" autofocus >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="disassembly_prefix">Disassembly Prefix</label>
            <div class="col-sm-7">
                <input type="text" id="disassembly_prefix" class="form-control" name="disassembly_prefix" value="{{ old('disassembly_prefix')}}" autofocus >
            </div>
        </div>
 
        
    </div>
    <div>
    <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="sales_quote_prefix">Sales Quote Prefix</label>
            <div class="col-sm-7">
                <input type="text" id="sales_quote_prefix" class="form-control" name="sales_quote_prefix" value="{{ old('sales_quote_prefix')}}" autofocus >
            </div>
    </div>
    <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="next_sales_quote_number">Next Sales Quote Number</label>
            <div class="col-sm-7">
                <input type="text" id="next_sales_quote_number" class="form-control" name="next_sales_quote_number" value="{{ old('next_sales_quote_number')}}" autofocus >
            </div>
    </div>
    <div class="form-group row">
            <label class="col-sm-5 col-form-label" for="sales_order_prefix">Sales Order Prefix</label>
            <div class="col-sm-7">
                <input type="text" id="sales_order_prefix" class="form-control" name="sales_order_prefix" value="{{ old('sales_order_prefix')}}" autofocus >
            </div>
        </div>
    
    </div>
</div>


@endsection