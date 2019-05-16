@extends('layouts.app')

@section('content')

<form method="post" action="" @submit.prevent= "onSubmit">
        @csrf
        <div class="row form-group">
            <div class="col-md-2">
                <label class="curr_label" for="base_curr"><sup>*</sup>Base Currency</label></div>
             <div class="col-md-3">
                    <select class="form-control" onchange="displayBaseCurr(this)" autofocus>
                             <option disabled value="">Select Base Currency</option>
                            <option value= "">INR</option>
                        <option value= "">CDF</option>
                        
                    </select>
                </div>
            <div class="col-md-3">
                    <input type="text" id="selected_base_curr" class="form-control" value="">
                </div>
            </div>
    
    <div class="row form-group">
            <div class="col-md-2">
                <label class="curr_label" for="foreign_curr">Currency Selection</label></div>
             <div class="col-md-3">
                    <select class="form-control" onchange="displayForeignCurr(this)"  id="foreign_curr" autofocus>
                             <option disabled value="">Currency Selection</option>
                            <option value= "">INR</option>
                        <option value= "">CDF</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" id="selected_foreign_curr"  class="form-control" value="">
                </div>
            </div>
    
    <div class="row form-group">
            <div class="col-md-2">
                <label class="curr_label" for="buy_rate"><sup>*</sup>Buy Rate</label></div>
             <div class="col-md-3">
                    <input id="buy_rate" class="form-control" type="text" autofocus>
                </div>
            </div>
    
    <div class="row form-group">
            <div class="col-md-2">
                <label class="curr_label" for="sell_rate"><sup>*</sup>Sell Rate</label></div>
             <div class="col-md-3">
                    <input id="sell_rate" class="form-control" type="text" autofocus>
                </div>
            </div>
</form>

<table class="table">
    <thead class="thead-light">
        <th>Base Currency</th>
        <th>Foreign Currency</th>
        <th>Default Rate</th>
        <th>Sell Rate</th>
    </thead>

</table>

@endsection

@push('js-script')
<script type="text/javascript">
        function displayBaseCurr(opt){
        var selectedOption= opt.options[opt.selectedIndex].text;
        document.getElementById('selected_base_curr').value= selectedOption;
        }
    
        function displayForeignCurr(curr){
            var foreignCurr= curr.options[curr.selectedIndex].text;
            document.getElementById('selected_foreign_curr').value= foreignCurr;
        }
</script>
    
   <!-- document.getElementsByClassName("displayOption").onchange= function(){
        var sel= this.options[this.selectedIndex].text;
        alert(sel);
    }-->
@endpush