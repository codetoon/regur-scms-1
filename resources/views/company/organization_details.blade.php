@extends('layouts.app')

@section('content')

	<div class="container" style="width: 100%">
		<ul class="nav nav-tabs nav-justified org-tabs">
			<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details">Details</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#configuration">Configuration</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address">Address</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#contact">Contact</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Images</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Invoicing</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Purchasing</a></li>
		</ul>
		  <form method="POST" action="">
            @csrf
		      <div class="tab-content">
			     <div id="details" class="container tab-pane active">
                    <div class="tab-flex-container">
                        <div>
                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="company-name">Company Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="company_name" class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name', $organization[0]->company_name) }}"  autofocus >
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="trading_name">Trading Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="trading_company_name" class="form-control{{ $errors->has('trading_name') ? ' is-invalid' : '' }}" name="trading_name" value="{{ old('trading_name', $organization[0]->trading_name) }}"  autofocus>
                              </div>
                            </div>
                           
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="trading_name_purchase">Trading Name(for purchasing):</label>
                              <div class="col-sm-8">
                                  <input type="text" id="trading_name_purchase" class="form-control{{ $errors->has('trading_name_purchase') ? ' is-invalid' : '' }}" name="trading_name_purchase" value="{{ old('trading_name_purchase', $organization[0]->trading_name_purchase) }}"  autofocus>
                              </div>
                            </div>
                           
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="industry">Industry:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="industry_id" id="industry" value="{{ old('industry_id', $organization[0]->industry_name)}}">
                                  @foreach($industries as $industry) 
									<option value= "{{ $industry->id }}">{{ $industry->industry_name }}</option>
                                  @endforeach
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="organization_type">Organization Type:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="organization_type" id="organization_type" value="{{ old('organization_type')}}">
                                    @foreach($organizationTypes as $key=> $organizationType)
                                  <option value= "{{ $key }}">{{ $organizationType }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="base_currency">Base Currency:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="base_currency" class="form-control{{ $errors->has('base_currency') ? ' is-invalid' : '' }}" name="base_currency" value="{{ old('base_currency', $organization[0]->base_currency) }}"  autofocus>
                              </div>
                            </div>
                            
                        </div>
                        <div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="dashboard_data_source">Dashboard Data Source:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="dashboard_data_source" id="dashboard_data_source" value="{{ old('dashboard_data_source')}}">
                                    @foreach($dashboardDataSources as $key=>$dashboardDataSource)
                                  <option value= "{{ $key }}">{{ $dashboardDataSource }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="gst_vat_number">GST/ VAT Number:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="gst_vat_number" class="form-control{{ $errors->has('gst_vat_number') ? ' is-invalid' : '' }}" name="gst_vat_number" value="{{ old('gst_vat_number', $organization[0]->gst_vat_number) }}"  autofocus>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="website">Website:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="website" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website', $organization[0]->website) }}"  autofocus>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="timezone_id">Timezone:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="timezone_id" id="timezone_id" value="{{ old('timezone_id', $organization[0]->timezone_id)}}">
                                    @foreach($timezones as $timezone)
                                  <option value= "{{ $timezone->id }}">{{ $timezone->timezone }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="financial_year_end">Financial Year End:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="financial_year_end" id="financial_year_end" value="{{ old('financial_year_end')}}">
                                    @foreach($financialYearEndings as $key=> $financialYearEnding)
                                    <option value= "{{ $key }}">{{ $financialYearEnding }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="unit_of_measure">Measurement Unit:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="unit_of_measure" id="unit_of_measure" value="{{ old('unit_of_measure')}}">
                                  @foreach($measurementUnits as $key=> $measurementUnit)
                                      <option value= "{{ $key }}">{{ $measurementUnit }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="date_format">Date Format:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="date_format" id="date_format" value="{{ old('date_format')}}">
                                    @foreach($dateFormats as $key=> $dateFormat)
                                        <option value= "{{ $key }}">{{ $dateFormat }}</option>
                                    @endforeach
                                  </select>
                              </div>
                            </div>
                        </div>
                     </div>
               
               
			</div>
		
			<div id="address" class="container tab-pane fade">
                <div class="tab-flex-container">
                    <div>
                        <h3>Postal Address</h3>
                        
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="postal_address_name">Address Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="postal_address_name" class="form-control {{ $errors->has('postal_address_name') ? ' is-invalid' : '' }}" name="postal_address_name" value="{{ old('postal_address_name', $organization[0]->postal_address_name) }}"   autofocus >
                              </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="postal_address_line_1">Address Line 1:</label>
                            <div class="col-sm-8">
                                 <input type="text" id="postal_address_line_1" class="form-control {{ $errors->has('postal_address_line_1') ? ' is-invalid' : '' }}" name="postal_address_line_1" value="{{ old('postal_address_line_1', $organization[0]->postal_address_line_1) }}"   autofocus >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="postal_address_line_2">Address Line 2:</label>
                            <div class="col-sm-8">
                                 <input type="text" id="postal_address_line_2" class="form-control {{ $errors->has('postal_address_line_2') ? ' is-invalid' : '' }}" name="postal_address_line_2" value="{{ old('postal_address_line_2', $organization[0]->postal_address_line_2) }}"   autofocus >
                             </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="postal_suburb">Suburb:</label>
                            <div class="col-sm-8">
                                <input type="text" id="postal_suburb" class="form-control {{ $errors->has('postal_suburb') ? ' is-invalid' : '' }}" name="postal_suburb" value="{{ old('postal_suburb', $organization[0]->postal_suburb) }}"   autofocus >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="postal_city">City:</label>
                            <div class="col-sm-8">
                                <input type="text" id="postal_city" class="form-control {{ $errors->has('postal_city') ? ' is-invalid' : '' }}" name="postal_city" value="{{ old('postal_city', $organization[0]->postal_city) }}"   autofocus >
                            </div>
                        </div>
                        
                    	<div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="postal_state_region">State/ Region:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="postal_state_region" class="form-control {{ $errors->has('postal_state_region') ? ' is-invalid' : '' }}" name="postal_state_region" value="{{ old('postal_state_region', $organization[0]->postal_state_region) }}"   autofocus >
                              </div>
                            </div>
                        
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="postal_postal_code">Postal Code:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="postal_postal_code" class="form-control {{ $errors->has('postal_postal_code') ? ' is-invalid' : '' }}" name="postal_postal_code" value="{{ old('postal_postal_code', $organization[0]->postal_postal_code) }}"   autofocus >
                              </div>
                        </div>
                        
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="country">Country:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="postal_country_id" id="country" value="{{ old('postal_country_id', $organization[0]->postal_country_name)}}">
                                  @foreach($countries as $country) 
									<option value= "{{ $country->id }}">{{ $country->country_name }}</option>
                                  @endforeach
                                  </select>
                              </div>
                            </div>
                            
                    </div>
                    
                    <div>
                        <h3>Physical Address</h3>
                        
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="physical_address_name">Address Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="physical_address_name" class="form-control {{ $errors->has('physical_address_name') ? ' is-invalid' : '' }}" name="physical_address_name" value="{{ old('physical_address_name', $organization[0]->physical_address_name) }}"   autofocus >
                              </div>
                            </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="physical_address_line_1">Address Line 1:</label>
                            <div class="col-sm-8">
                                <input type="text" id="physical_address_line_1" class="form-control {{ $errors->has('physical_address_line_1') ? ' is-invalid' : '' }}" name="physical_address_line_1" value="{{ old('physical_address_line_1', $organization[0]->physical_address_line_1) }}"   autofocus >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="physical_address_line_2">Address Line 2:</label>
                            <div class="col-sm-8">
                                <input type="text" id="physical_address_line_2" class="form-control {{ $errors->has('physical_address_line_2') ? ' is-invalid' : '' }}" name="physical_address_line_2" value="{{ old('physical_address_line_2', $organization[0]->physical_address_line_2) }}"   autofocus >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="physical_suburb">Suburb:</label>
                            <div class="col-sm-8">
                                <input type="text" id="physical_suburb" class="form-control {{ $errors->has('physical_suburb') ? ' is-invalid' : '' }}" name="physical_suburb" value="{{ old('physical_suburb', $organization[0]->physical_suburb) }}"   autofocus >
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label" for="physical_city">City:</label>
                            <div class="col-sm-8">
                                <input type="text" id="physical_city" class="form-control {{ $errors->has('physical_city') ? ' is-invalid' : '' }}" name="physical_city" value="{{ old('physical_city', $organization[0]->physical_city) }}"   autofocus >
                            </div>
                        </div>
                        
                    	<div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="physical_state_region">State/ Region:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="physical_state_region" class="form-control {{ $errors->has('physical_state_region') ? ' is-invalid' : '' }}" name="physical_state_region" value="{{ old('physical_state_region', $organization[0]->physical_state_region) }}"   autofocus >
                              </div>
                            </div>
                        
                    	<div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="physical_postal_code">Postal Code:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="physical_postal_code" class="form-control {{ $errors->has('physical_postal_code') ? ' is-invalid' : '' }}" name="physical_postal_code" value="{{ old('physical_postal_code', $organization[0]->physical_postal_code) }}"   autofocus >
                              </div>
                            </div>
                        
                      <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="country">Country:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="physical_country_id" id="country" value="{{ old('physical_country_id', $organization[0]->physical_country_name)}}">
                                  @foreach($countries as $country) 
									<option value= "{{ $country->id }}">{{ $country->country_name }}</option>
                                  @endforeach
                                  </select>
                              </div>
                            </div>
                    </div>
                </div>
			</div>
            
            <div id="configuration" class="container tab-pane fade">
            </div>
            
            <div id="contact" class="container tab-pane fade">
                <div class="tab-flex-container">
                    <div>
                       <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="telephone_number">Telephone Number:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="telephone_number" class="form-control {{ $errors->has('telephone_number') ? ' is-invalid' : '' }}" name="telephone_number" value="{{ old('telephone_number', $organization[0]->telephone_number) }}"   autofocus >
                              </div>
                         </div>
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="ddi">DDI:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="ddi" class="form-control {{ $errors->has('ddi') ? ' is-invalid' : '' }}" name="ddi" value="{{ old('ddi', $organization[0]->ddi) }}"   autofocus >
                              </div>
                            </div>
                           
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="tollfree_number">Tollfree Number:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="tollfree_number" class="form-control {{ $errors->has('tollfree_number') ? ' is-invalid' : '' }}" name="tollfree_number" value="{{ old('tollfree_number', $organization[0]->tollfree_number) }}"   autofocus >
                              </div>
                            </div>
                           
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="purchase_email">Purchase Email:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="purchase_email" class="form-control {{ $errors->has('purchase_email') ? ' is-invalid' : '' }}" name="purchase_email" value="{{ old('purchase_email', $organization[0]->purchase_email) }}"   autofocus >
                              </div>
                            </div>
                           
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="sales_email">Sales Email:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="sales_email" class="form-control {{ $errors->has('sales_email') ? ' is-invalid' : '' }}" name="sales_email" value="{{ old('sales_email', $organization[0]->sales_email) }}"   autofocus >
                              </div>
                            </div>
                           
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="fax_number">Fax Number:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="fax_number" class="form-control {{ $errors->has('fax_number') ? ' is-invalid' : '' }}" name="fax_number" value="{{ old('fax_number', $organization[0]->fax_number) }}"   autofocus >
                              </div>
                        </div>
                           
                        
                        
                    </div>
                </div>
            </div>
             <div class="form-group">
                <button type="submit" class="btn btn-primary" style="float: right; margin-bottom: 20px">
                    {{ __('Save') }}
                </button>
            </div>      
		</div>
    </form>
</div>

	
@endsection