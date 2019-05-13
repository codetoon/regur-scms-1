@extends('layouts.app')

@section('content')
 <form method="post" action="">
     @csrf
    
<div class="prefixes_flex_container">
   
    <div>
        
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="purchase_order_prefix" value="po_prefix">{{ $prefixKeys["po_prefix"] }}</label>
            <input type="text" id="purchase_order_prefix" class="form-control col-sm-6" name="po_prefix" autofocus >
           
        </div>
       
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_purchase_order_num" value="next_po_num" >{{ $prefixKeys["next_po_num"] }}</label>
           
                <input type="text" id="next_purchase_order_num" class="form-control col-sm-6" name="next_po_num"  autofocus >
          
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="supplier_return_prefix" value="sr_prefix">{{ $prefixKeys["sr_prefix"] }}</label>
            
                <input type="text" id="supplier_return_prefix" class="form-control col-sm-6" name="sr_prefix" value="{{ old('sr_prefix')}}" autofocus >
          
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_supplier_return_num" value="next_sr_num">{{ $prefixKeys["next_sr_num"] }}</label>
           
                <input type="text" id="next_supplier_return_num" class="form-control col-sm-6" name="next_sr_num" value="{{ old('next_sr_num')}}" autofocus >
         
        </div>
    </div>
    
    <div >
        <div class="form-group row">
                <label class="col-sm-6 prefixes_label" for="stock_adjustment_prefix" value="sa_prefix">{{ $prefixKeys["sa_prefix"] }}</label>
                
                    <input type="text" id="stock_adjustment_prefix" class="form-control col-sm-6" name="sa_prefix" value="{{ old('sa_prefix')}}" autofocus >
               
            </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_stock_adjustment_num" value="next_sa_num">{{ $prefixKeys["next_sa_num"] }}</label>
            
                <input type="text" id="next_stock_adjustment_num" class="form-control col-sm-6" name="next_sa_num" value="{{ old('next_sa_num')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="stock_take_prefix" value="st_prefix">{{ $prefixKeys["st_prefix"] }}</label>
           
                <input type="text" id="stock_take_prefix" class="form-control col-sm-6" name="st_prefix" value="{{ old('st_prefix')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_stock_take_number" value="next_st_num">{{ $prefixKeys["next_st_num"] }}</label>
            
                <input type="text" id="next_stock_take_number" class="form-control col-sm-6" name="next_st_num" value="{{ old('next_st_num')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="transfer_order_prefix">{{ $prefixKeys["to_prefix"] }}</label>
           
                <input type="text" id="transfer_order_prefix" class="form-control col-sm-6" name="transfer_order_prefix" value="{{ old('transfer_order_prefix')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_transfer_order_num" value="next_to_num">{{ $prefixKeys["next_to_num"] }}</label>
            
                <input type="text" id="next_transfer_order_num" class="form-control col-sm-6" name="to_prefix" value="{{ old('next_to_num')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="assembly_prefix" value="assem_prefix">{{ $prefixKeys["assem_prefix"] }}</label>
           
                <input type="text" id="assembly_prefix" class="form-control col-sm-6" name="assem_prefix" value="{{ old('assembly_prefix')}}" autofocus >
           
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_assembly_number" value="next_assem_prefix">{{ $prefixKeys["next_assem_prefix"] }}</label>
           
                <input type="text" id="next_assembly_number" class="form-control col-sm-6" name="next_assem_prefix" value="{{ old('next_assem_prefix')}}" autofocus >
          
        </div>
        <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="disassembly_prefix" value="dissem_prefix">{{ $prefixKeys["dissem_prefix"] }}</label>
            
                <input type="text" id="disassembly_prefix" class="form-control col-sm-6" name="dissem_prefix" value="{{ old('dissem_prefix')}}" autofocus >
           
        </div>
 
        
    </div>
    <div>
    <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="sales_quote_prefix" value="sales_quote_prefix">{{ $prefixKeys["sq_prefix"] }}</label>
           
                <input type="text" id="sales_quote_prefix" class="form-control col-sm-6" name="sq_prefix" value="{{ old('sales_quote_prefix')}}" autofocus >
           
    </div>
    <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_sales_quote_number" value="next_sq_num">{{ $prefixKeys["next_sq_num"] }}</label>
           
                <input type="text" id="next_sales_quote_number" class="form-control col-sm-6" name="next_sq_num" value="{{ old('next_sq_num')}}" autofocus >
            
    </div>
    <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="sales_order_prefix" value="so_prefix">{{ $prefixKeys["so_prefix"] }}</label>
         
                <input type="text" id="sales_order_prefix" class="form-control col-sm-6" name="so_prefix" value="{{ old('so_prefix')}}" autofocus >
          
     </div>
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_sales_order_num" value="next_so_num">{{ $prefixKeys["next_so_num"] }}</label>
            
                <input type="text" id="next_sales_order_num" class="form-control col-sm-6" name="next_so_num" value="{{ old('next_so_num')}}" autofocus >
           
     </div>
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="sales_shipment_prefix" value="ss_prefix">{{ $prefixKeys["ss_prefix"] }}</label>
            
                <input type="text" id="sales_shipment_prefix" class="form-control col-sm-6" name="ss_prefix" value="{{ old('ss_prefix')}}" autofocus >
           
        </div>
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="sales_invoice_prefix" value="si_prefix">{{ $prefixKeys["si_prefix"] }}</label>
           
                <input type="text" id="sales_invoice_prefix" class="form-control col-sm-6" name="si_prefix" value="{{ old('si_prefix')}}" autofocus >
            
    </div>
    <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="credit_note_prefix" value="cn_prefix">{{ $prefixKeys["cn_prefix"] }}</label>
            
                <input type="text" id="credit_note_prefix" class="form-control col-sm-6" name="cn_prefix" value="{{ old('cn_prefix')}}" autofocus >
            </div>
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="next_credit_note_number" value="next_cn_num">{{ $prefixKeys["next_cn_num"] }}</label>
           
                <input type="text" id="next_credit_note_number" class="form-control col-sm-6" name="next_cn_num" value="{{ old('next_cn_num')}}" autofocus >
            
    </div> 
     <div class="form-group row">
            <label class="col-sm-6 prefixes_label" for="product_batch_prefix" value="pb_prefix">{{ $prefixKeys["pb_prefix"] }}</label>
            
                <input type="text" id="product_batch_prefix" class="form-control col-sm-6" name="pb_prefix" value="{{ old('pb_prefix')}}" autofocus >
         
        </div>
    </div>
   <div class="form-group">
                <button type="submit" class="btn btn-success" style="float: right; margin-right: -700px;">
                    Save
                </button>
            </div>  
      
    </div>
    
  </form>
 

@endsection