@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Organization Details') }}</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company name') }}</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" name="company_name" value="{{ old('company_name') }}" required autofocus>

                                @if ($errors->has('company_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="trading_name" class="col-md-4 col-form-label text-md-right">{{ __('Trading name') }}</label>

                            <div class="col-md-6">
                                <input id="trading_name" type="text" class="form-control{{ $errors->has('trading_name') ? ' is-invalid' : '' }}" name="trading_name" value="{{ old('trading_name', $organization->trading_name) }}" required autofocus>

                                @if ($errors->has('trading_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('trading_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="trading_name_purchase" class="col-md-4 col-form-label text-md-right">{{ __('Trading Name (for purchasing)') }}</label>

                            <div class="col-md-6">
                                <input id="trading_name_purchase" type="text" class="form-control{{ $errors->has('trading_name_purchase') ? ' is-invalid' : '' }}" name="trading_name_purchase" value="{{ old('trading_name_purchase', $organization->trading_name_purchase) }}" required autofocus>

                                @if ($errors->has('trading_name_purchase'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('trading_name_purchase') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="industry" class="col-md-4 col-form-label text-md-right">{{ __('Industry') }}</label>

                            <div class="col-md-6">
                                <input id="industry" type="text" class="form-control{{ $errors->has('industry') ? ' is-invalid' : '' }}" name="industry" value="{{ old('industry') }}" required autofocus>

                                @if ($errors->has('industry'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('industry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="organization_type" class="col-md-4 col-form-label text-md-right">{{ __('Organization Type') }}</label>

                            <div class="col-md-6">
                                <input id="organization_type" type="text" class="form-control{{ $errors->has('organization_type') ? ' is-invalid' : '' }}" name="organization_type" value="{{ old('organization_type', $organization->organization_type) }}" required autofocus>

                                @if ($errors->has('organization_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('organization_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="base_currency" class="col-md-4 col-form-label text-md-right">{{ __('Base Currency') }}</label>

                            <div class="col-md-6">
                                <input id="base_currency" type="text" class="form-control{{ $errors->has('base_currency') ? ' is-invalid' : '' }}" name="base_currency" value="{{ old('base_currency', $organization->base_currency) }}" required autofocus>

                                @if ($errors->has('base_currency'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('base_currency') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="dashboard_data_source" class="col-md-4 col-form-label text-md-right">{{ __('Dashboard Data Source') }}</label>

                            <div class="col-md-6">
                                <input id="dashboard_data_source" type="text" class="form-control{{ $errors->has('dashboard_data_source') ? ' is-invalid' : '' }}" name="dashboard_data_source" value="{{ old('dashboard_data_source', $organization->dashboard_data_source) }}" required autofocus>

                                @if ($errors->has('dashboard_data_source'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dashboard_data_source') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="gst_vat_number" class="col-md-4 col-form-label text-md-right">{{ __('GST / VAT number') }}</label>

                            <div class="col-md-6">
                                <input id="gst_vat_number" type="text" class="form-control{{ $errors->has('gst_vat_number') ? ' is-invalid' : '' }}" name="gst_vat_number" value="{{ old('gst_vat_number', $organization->gst_vat_number) }}" required autofocus>

                                @if ($errors->has('gst_vat_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gst_vat_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="website" class="col-md-4 col-form-label text-md-right">{{ __('Website') }}</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website', $organization->website) }}" required autofocus>

                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group-row">
							<label for="timezone" class="col-form-label text-md-right">{{ __('Timezone') }}</label>
							
								<select class="form-control" name="timezone_id" id="timezone" value="{{ old('timezone_id', $organization->timezone_id)}}">
								@foreach($timezones as $timezone) 
									<option value= "{{ $timezone->id }}">{{ $timezone->timezone }}</option>
								@endforeach
								</select>
							
						</div>
                        
                         <div class="form-group row">
                            <label for="financial_year_end" class="col-md-4 col-form-label text-md-right">{{ __('Financial Year End') }}</label>

                            <div class="col-md-6">
                                <input id="financial_year_end" type="text" class="form-control{{ $errors->has('financial_year_end') ? ' is-invalid' : '' }}" name="financial_year_end" value="{{ old('financial_year_end'), $organization->financial_year_end }}" required autofocus>

                                @if ($errors->has('financial_year_end'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('financial_year_end') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="unit_of_measure" class="col-md-4 col-form-label text-md-right">{{ __('Measurement Units') }}</label>

                            <div class="col-md-6">
                                <input id="unit_of_measure" type="text" class="form-control{{ $errors->has('unit_of_measure') ? ' is-invalid' : '' }}" name="unit_of_measure" value="{{ old('unit_of_measure', $organization->unit_of_measure) }}" required autofocus>

                                @if ($errors->has('unit_of_measure'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('unit_of_measure') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="date_format" class="col-md-4 col-form-label text-md-right">{{ __('Date Format') }}</label>

                            <div class="col-md-6">
                                <input id="date_format" type="text" class="form-control{{ $errors->has('date_format') ? ' is-invalid' : '' }}" name="date_format" value="{{ old('date_format', $organization->date_format) }}" required autofocus>

                                @if ($errors->has('date_format'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_format') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="telephone_number" class="col-md-4 col-form-label text-md-right">{{ __('Telephone Number') }}</label>

                            <div class="col-md-6">
                                <input id="telephone_number" type="text" class="form-control{{ $errors->has('telephone_number') ? ' is-invalid' : '' }}" name="telephone_number" value="{{ old('telephone_number', $organization->telephone_number) }}" required autofocus>

                                @if ($errors->has('telephone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="ddi" class="col-md-4 col-form-label text-md-right">{{ __(' DDI ') }}</label>

                            <div class="col-md-6">
                                <input id="ddi" type="text" class="form-control{{ $errors->has('ddi') ? ' is-invalid' : '' }}" name="ddi" value="{{ old('ddi'), $organization->ddi }}" required autofocus>

                                @if ($errors->has('ddi'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ddi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tollfree_number" class="col-md-4 col-form-label text-md-right">{{ __(' Tollfree number ') }}</label>

                            <div class="col-md-6">
                                <input id="tollfree_number" type="text" class="form-control{{ $errors->has('tollfree_number') ? ' is-invalid' : '' }}" name="tollfree_number" value="{{ old('tollfree_number'), $organization->tollfree_number }}" required autofocus>

                                @if ($errors->has('tollfree_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tollfree_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="purchase_email" class="col-md-4 col-form-label text-md-right">{{ __(' Purchase Email ') }}</label>

                            <div class="col-md-6">
                                <input id="purchase_email" type="text" class="form-control{{ $errors->has('purchase_email') ? ' is-invalid' : '' }}" name="purchase_email" value="{{ old('purchase_email'), $organization->purchase_email }}" required autofocus>

                                @if ($errors->has('purchase_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('purchase_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="sales_email" class="col-md-4 col-form-label text-md-right">{{ __(' Sales Email ') }}</label>

                            <div class="col-md-6">
                                <input id="sales_email" type="text" class="form-control{{ $errors->has('sales_email') ? ' is-invalid' : '' }}" name="sales_email" value="{{ old('sales_email'), $organization->sales_email }}" required autofocus>

                                @if ($errors->has('sales_email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sales_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fax_number" class="col-md-4 col-form-label text-md-right">{{ __('Fax Number') }}</label>

                            <div class="col-md-6">
                                <input id="fax_number" type="text" class="form-control{{ $errors->has('fax_number') ? ' is-invalid' : '' }}" name="fax_number" value="{{ old('fax_number'), $organization->fax_number }}" required autofocus>

                                @if ($errors->has('fax_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fax_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div><h5>Physical Address</h5></div>
                        
                        <div class="form-group row">
                            <label for="physical_address_name" class="col-md-4 col-form-label text-md-right">{{ __('Address Name') }}</label>

                            <div class="col-md-6">
                                <input id="physical_address_name" type="text" class="form-control{{ $errors->has('physical_address_name') ? ' is-invalid' : '' }}" name="physical_address_name" value="{{ old('physical_address_name'), $organization->physical_address_name }}" required autofocus>

                                @if ($errors->has('physical_address_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physical_address_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>	
                        
                        <div class="form-group row">
                            <label for="physical_address_line_1" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 1') }}</label>

                            <div class="col-md-6">
                                <input id="physical_address_line_1" type="text" class="form-control{{ $errors->has('physical_address_line_1') ? ' is-invalid' : '' }}" name="physical_address_line_1" value="{{ old('physical_address_line_1'), $organization->physical_address_line_1 }}" required autofocus>

                                @if ($errors->has('physical_address_line_1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physical_address_line_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="physical_address_line_2" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 2') }}</label>

                            <div class="col-md-6">
                                <input id="physical_address_line_2" type="text" class="form-control{{ $errors->has('physical_address_line_2') ? ' is-invalid' : '' }}" name="physical_address_line_2" value="{{ old('physical_address_line_2'), $organization->physical_address_line_2 }}" required autofocus>

                                @if ($errors->has('physical_address_line_2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physical_address_line_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="physical_suburb" class="col-md-4 col-form-label text-md-right">{{ __('physical_suburb') }}</label>

                            <div class="col-md-6">
                                <input id="physical_suburb" type="text" class="form-control{{ $errors->has('physical_suburb') ? ' is-invalid' : '' }}" name="physical_suburb" value="{{ old('physical_suburb', $organization->physical_suburb) }}" required autofocus>

                                @if ($errors->has('physical_suburb'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physical_suburb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="physical_city" class="col-md-4 col-form-label text-md-right">{{ __('physical_city') }}</label>

                            <div class="col-md-6">
                                <input id="physical_city" type="text" class="form-control{{ $errors->has('physical_city') ? ' is-invalid' : '' }}" name="physical_city" value="{{ old('physical_city', $organization->physical_city) }}" required autofocus>

                                @if ($errors->has('physical_city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physical_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="physical_state_region" class="col-md-4 col-form-label text-md-right">{{ __('State/ Region') }}</label>

                            <div class="col-md-6">
                                <input id="physical_state_region" type="text" class="form-control{{ $errors->has('physical_state_region') ? ' is-invalid' : '' }}" name="physical_state_region" value="{{ old('physical_state_region'), $organization->physical_state_region }}" required autofocus>

                                @if ($errors->has('physical_state_region'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physical_state_region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group-row">
							<label for="country" class="col-form-label text-md-right">Country</label>
							
								<select class="form-control" name="physical_country_id" id="country">
								@foreach($countries as $country) 
									<option value= "{{ $country->id }}">{{ $country->country_name }}</option>
								@endforeach
								</select>
							
						</div>
                        
                        
                         <div class="form-group row">
                            <label for="physical_postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}</label>

                            <div class="col-md-6">
                                <input id="physical_postal_code" type="text" class="form-control{{ $errors->has('physical_postal_code') ? ' is-invalid' : '' }}" name="physical_postal_code" value="{{ old('physical_postal_code'), $organization->physical_postal_code }}" required autofocus>

                                @if ($errors->has('physical_postal_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('physical_postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        
                        <div><h5>Postal Address</h5></div>
                         <div class="form-group row">
                            <label for="postal_address_name" class="col-md-4 col-form-label text-md-right">{{ __('Address Name') }}</label>

                            <div class="col-md-6">
                                <input id="postal_address_name" type="text" class="form-control{{ $errors->has('postal_address_name') ? ' is-invalid' : '' }}" name="postal_address_name" value="{{ old('postal_address_name'), $organization->postal_address_name }}" required autofocus>

                                @if ($errors->has('postal_address_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_address_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>	
                        
                        <div class="form-group row">
                            <label for="postal_address_line_1" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 1') }}</label>

                            <div class="col-md-6">
                                <input id="postal_address_line_1" type="text" class="form-control{{ $errors->has('postal_address_line_1') ? ' is-invalid' : '' }}" name="postal_address_line_1" value="{{ old('postal_address_line_1'), $organization->postal_address_line_1 }}" required autofocus>

                                @if ($errors->has('postal_address_line_1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_address_line_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="postal_address_line_2" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 2') }}</label>

                            <div class="col-md-6">
                                <input id="postal_address_line_2" type="text" class="form-control{{ $errors->has('postal_address_line_2') ? ' is-invalid' : '' }}" name="postal_address_line_2" value="{{ old('postal_address_line_2'), $organization->postal_address_line_2 }}" required autofocus>

                                @if ($errors->has('postal_address_line_2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_address_line_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="postal_suburb" class="col-md-4 col-form-label text-md-right">{{ __('Suburb') }}</label>

                            <div class="col-md-6">
                                <input id="postal_suburb" type="text" class="form-control{{ $errors->has('postal_suburb') ? ' is-invalid' : '' }}" name="postal_suburb" value="{{ old('postal_suburb'), $organization->postal_suburb }}" required autofocus>

                                @if ($errors->has('postal_suburb'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_suburb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="postal_city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="postal_city" type="text" class="form-control{{ $errors->has('postal_city') ? ' is-invalid' : '' }}" name="postal_city" value="{{ old('postal_city'), $organization->postal_city }}" required autofocus>

                                @if ($errors->has('postal_city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="postal_state_region" class="col-md-4 col-form-label text-md-right">{{ __('State/ Region') }}</label>

                            <div class="col-md-6">
                                <input id="postal_state_region" type="text" class="form-control{{ $errors->has('postal_state_region') ? ' is-invalid' : '' }}" name="postal_state_region" value="{{ old('postal_state_region'), $organization->postal_state_region }}" required autofocus>

                                @if ($errors->has('postal_state_region'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_state_region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group-row">
							<label for="country" class="col-form-label text-md-right">{{ __('Country') }}</label>
							
								<select class="form-control" name="postal_country_id" id="country" value="{{ old('postal_country_id'), $organization->postal_country_id}}">
								@foreach($countries as $country) 
									<option value= "{{ $country->id }}">{{ $country->country_name }}</option>
								@endforeach
								</select>
							
						</div>
                        
                        
                          <div class="form-group row">
                            <label for="postal_postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}</label>

                            <div class="col-md-6">
                                <input id="postal_postal_code" type="text" class="form-control{{ $errors->has('postal_postal_code') ? ' is-invalid' : '' }}" name="physical_postal_code" value="{{ old('physical_postal_code'), $organization->physical_postal_code }}" required autofocus>

                                @if ($errors->has('postal_postal_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                         </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
