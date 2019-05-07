@extends('layouts.app')

@section('content')
<div class="prefixes_flex_container">
    <div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="purchase_order_prefix" style="text-align: right">Purchase Order Prefix</label>
            <input type="text" id="purchase_order_prefix" class="form-control col-sm-6" name="purchase_order_prefix" value="{{ old('purchase_order_prefix')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_purchase_order_num">Next Purchase Order Number</label>
           
                <input type="text" id="next_purchase_order_num" class="form-control col-sm-6" name="next_purchase_order_num" value="{{ old('next_purchase_order_num')}}" autofocus >
          
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="supplier_return_prefix">Supplier Return Prefix</label>
            
                <input type="text" id="supplier_return_prefix" class="form-control col-sm-6" name="supplier_return_prefix" value="{{ old('supplier_return_prefix')}}" autofocus >
          
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_supplier_return_num">Next Supplier Return Number</label>
           
                <input type="text" id="next_supplier_return_num" class="form-control col-sm-6" name="next_supplier_return_num" value="{{ old('next_supplier_return_num')}}" autofocus >
         
        </div>
    </div>
    
    <div >
        <div class="form-group row">
                <label class="col-sm-6 prefixes_label" for="stock_adjustment_prefix">Stock Adjustment Prefix</label>
                
                    <input type="text" id="stock_adjustment_prefix" class="form-control col-sm-6" name="stock_adjustment_prefix" value="{{ old('stock_adjustment_prefix')}}" autofocus >
               
            </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_stock_adjustment_num">Next Stock Adjustment Number</label>
            
                <input type="text" id="next_stock_adjustment_num" class="form-control col-sm-6" name="next_stock_adjustment_num" value="{{ old('next_stock_adjustment_num')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="stock_take_prefix">Stock Take Prefix</label>
           
                <input type="text" id="stock_take_prefix" class="form-control col-sm-6" name="stock_take_prefix" value="{{ old('stock_take_prefix')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_stock_take_number">Next Stock Take Number</label>
            
                <input type="text" id="next_stock_take_number" class="form-control col-sm-6" name="next_stock_take_number" value="{{ old('next_stock_take_number')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="transfer_order_prefix">Transfer Order Prefix</label>
           
                <input type="text" id="transfer_order_prefix" class="form-control col-sm-6" name="transfer_order_prefix" value="{{ old('transfer_order_prefix')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_transfer_order_num">Next Transfer Order Number</label>
            
                <input type="text" id="next_transfer_order_num" class="form-control col-sm-6" name="next_transfer_order_num" value="{{ old('next_transfer_order_num')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="assembly_prefix">Assembly Prefix</label>
           
                <input type="text" id="assembly_prefix" class="form-control col-sm-6" name="assembly_prefix" value="{{ old('assembly_prefix')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_assembly_number">Next Assembly Number</label>
           
                <input type="text" id="next_assembly_number" class="form-control col-sm-6" name="next_assembly_number" value="{{ old('next_assembly_number')}}" autofocus >
          
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="disassembly_prefix">Disassembly Prefix</label>
            
                <input type="text" id="disassembly_prefix" class="form-control col-sm-6" name="disassembly_prefix" value="{{ old('disassembly_prefix')}}" autofocus >
           
        </div>
 
        
    </div>
    <div>
    <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="sales_quote_prefix">Sales Quote Prefix</label>
           
                <input type="text" id="sales_quote_prefix" class="form-control col-sm-6" name="sales_quote_prefix" value="{{ old('sales_quote_prefix')}}" autofocus >
           
    </div>
    <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_sales_quote_number">Next Sales Quote Number</label>
           
                <input type="text" id="next_sales_quote_number" class="form-control col-sm-6" name="next_sales_quote_number" value="{{ old('next_sales_quote_number')}}" autofocus >
            
    </div>
    <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="sales_order_prefix">Sales Order Prefix</label>
         
                <input type="text" id="sales_order_prefix" class="form-control col-sm-6" name="sales_order_prefix" value="{{ old('sales_order_prefix')}}" autofocus >
          
     </div>
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_sales_order_num">Next Sales Order Number</label>
            
                <input type="text" id="next_sales_order_num" class="form-control col-sm-6" name="next_sales_order_num" value="{{ old('next_sales_order_num')}}" autofocus >
           
     </div>
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="sales_shipment_prefix">Sales Shipment Prefix</label>
            
                <input type="text" id="sales_shipment_prefix" class="form-control col-sm-6" name="sales_shipment_prefix" value="{{ old('sales_shipment_prefix')}}" autofocus >
           
        </div>
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="sales_invoice_prefix">Sales Invoice Prefix</label>
           
                <input type="text" id="sales_invoice_prefix" class="form-control col-sm-6" name="sales_invoice_prefix" value="{{ old('sales_invoice_prefix')}}" autofocus >
            
    </div>
    <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="credit_note_prefix">Credit Note Prefix</label>
            
                <input type="text" id="credit_note_prefix" class="form-control col-sm-6" name="credit_note_prefix" value="{{ old('credit_note_prefix')}}" autofocus >
            </div>
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_credit_note_number">Next Credit Note Number</label>
           
                <input type="text" id="next_credit_note_number" class="form-control col-sm-6" name="next_credit_note_number" value="{{ old('next_credit_note_number')}}" autofocus >
            
    </div> 
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="product_batch_prefix">Product Batch Prefix</label>
            
                <input type="text" id="product_batch_prefix" class="form-control col-sm-6" name="product_batch_prefix" value="{{ old('product_batch_prefix')}}" autofocus >
         
        </div>
    </div>
   
    </div>
</div>


@endsection