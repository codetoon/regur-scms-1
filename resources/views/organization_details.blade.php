@extends('layouts.app')

@section('content')

	<div class="container" style="width: 100%">
		<ul class="nav nav-tabs nav-justified org-tabs">
			<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#details">Details</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#configuration">Configuration</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#address">Address</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Contact</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Address</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Images</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Invoicing</a></li>
			<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#">Purchasing</a></li>
		</ul>
		
		<div class="tab-content">
			<div id="details" class="container tab-pane active">
                <form method="POST" action="">
                    @csrf
                    <div class="tab-flex-container">
                        <div>
                           <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="company-name">Company Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="company_name" class="form-control {{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name', $organization[0]->company_name) }}" required autofocus >
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="trading_name">Trading Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="trading_company_name" class="form-control{{ $errors->has('trading_name') ? ' is-invalid' : '' }}" name="trading_name" value="{{ old('trading_name', $organization[0]->trading_name) }}" required autofocus>
                              </div>
                            </div>
                           
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="trading_name_purchase">Trading Name(for purchasing):</label>
                              <div class="col-sm-8">
                                  <input type="text" id="trading_name_purchase" class="form-control{{ $errors->has('trading_name_purchase') ? ' is-invalid' : '' }}" name="trading_name_purchase" value="{{ old('trading_name_purchase', $organization[0]->trading_name_purchase) }}" required autofocus>
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
                                  <option>1</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="base_currency">Base Currency:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="base_currency" id="base_currency" value="{{ old('base_currency')}}">
                                  <option>1</option>
                                  </select>
                              </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="dashboard_data_source">Dashboard Data Source:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="dashboard_data_source" id="dashboard_data_source" value="{{ old('dashboard_data_source')}}">
                                  <option>1</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="gst_vat_number">GST/ VAT Number:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="gst_vat_number" class="form-control{{ $errors->has('gst_vat_number') ? ' is-invalid' : '' }}" name="gst_vat_number" value="{{ old('gst_vat_number', $organization[0]->gst_vat_number) }}" required autofocus>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="website">Website:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="website" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website', $organization[0]->website) }}" required autofocus>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="timezone">Timezone:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="timezone" id="timezone" value="{{ old('timezone')}}">
                                  <option>1</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="financial_year_end">Financial Year End:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="financial_year_end" id="financial_year_end" value="{{ old('financial_year_end')}}">
                                  <option>1</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="unit_of_measure">Measurement Unit:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="unit_of_measure" id="unit_of_measure" value="{{ old('unit_of_measure')}}">
                                  <option>1</option>
                                  </select>
                              </div>
                            </div>
                            
                            <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="date_format">Date Format:</label>
                              <div class="col-sm-8">
                                  <select class="form-control" name="date_format" id="date_format" value="{{ old('date_format')}}">
                                  <option>1</option>
                                  </select>
                              </div>
                            </div>
                        </div>
                     </div>
                </form>
               
			</div>
		
			<div id="address" class="container tab-pane fade">
                <div class="tab-flex-container">
                    <div>
                        <h3>Postal Address</h3>
                        
                        <div class="form-group row">
                              <label class="col-sm-4 col-form-label" for="postal_address_name">Address Name:</label>
                              <div class="col-sm-8">
                                  <input type="text" id="postal_address_name" class="form-control {{ $errors->has('postal_address_name') ? ' is-invalid' : '' }}" name="postal_address_name" value="{{ old('postal_address_name', $organization[0]->postal_address_name) }}" required autofocus >
                              </div>
                            </div>
                    </div>
                    
                    <div>
                        <h3>Physical Address</h3>
                    </div>
                </div>
			</div>
		</div>
	</div>

	
@endsection