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
                                <input id="trading_name" type="text" class="form-control{{ $errors->has('trading_name') ? ' is-invalid' : '' }}" name="trading_name" value="{{ old('trading_name') }}" required autofocus>

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
                                <input id="trading_name_purchase" type="text" class="form-control{{ $errors->has('trading_name_purchase') ? ' is-invalid' : '' }}" name="trading_name_purchase" value="{{ old('trading_name_purchase') }}" required autofocus>

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
                                <input id="organization_type" type="text" class="form-control{{ $errors->has('organization_type') ? ' is-invalid' : '' }}" name="organization_type" value="{{ old('organization_type') }}" required autofocus>

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
                                <input id="base_currency" type="text" class="form-control{{ $errors->has('base_currency') ? ' is-invalid' : '' }}" name="base_currency" value="{{ old('base_currency') }}" required autofocus>

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
                                <input id="dashboard_data_source" type="text" class="form-control{{ $errors->has('dashboard_data_source') ? ' is-invalid' : '' }}" name="dashboard_data_source" value="{{ old('dashboard_data_source') }}" required autofocus>

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
                                <input id="gst_vat_number" type="text" class="form-control{{ $errors->has('gst_vat_number') ? ' is-invalid' : '' }}" name="gst_vat_number" value="{{ old('gst_vat_number') }}" required autofocus>

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
                                <input id="website" type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website') }}" required autofocus>

                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="timezone" class="col-md-4 col-form-label text-md-right">{{ __('Timezone') }}</label>

                            <div class="col-md-6">
                                <input id="timezone" type="text" class="form-control{{ $errors->has('timezone') ? ' is-invalid' : '' }}" name="timezone" value="{{ old('timezone') }}" required autofocus>

                                @if ($errors->has('timezone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('timezone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group row">
                            <label for="financial_year_end" class="col-md-4 col-form-label text-md-right">{{ __('Financial Year End') }}</label>

                            <div class="col-md-6">
                                <input id="financial_year_end" type="text" class="form-control{{ $errors->has('financial_year_end') ? ' is-invalid' : '' }}" name="financial_year_end" value="{{ old('financial_year_end') }}" required autofocus>

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
                                <input id="unit_of_measure" type="text" class="form-control{{ $errors->has('unit_of_measure') ? ' is-invalid' : '' }}" name="unit_of_measure" value="{{ old('unit_of_measure') }}" required autofocus>

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
                                <input id="date_format" type="text" class="form-control{{ $errors->has('date_format') ? ' is-invalid' : '' }}" name="date_format" value="{{ old('date_format') }}" required autofocus>

                                @if ($errors->has('date_format'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date_format') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="address_name" class="col-md-4 col-form-label text-md-right">{{ __('Address Name') }}</label>

                            <div class="col-md-6">
                                <input id="address_name" type="text" class="form-control{{ $errors->has('address_name') ? ' is-invalid' : '' }}" name="address_name" value="{{ old('address_name') }}" required autofocus>

                                @if ($errors->has('address_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>	
                        
                        <div class="form-group row">
                            <label for="address_line_1" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 1') }}</label>

                            <div class="col-md-6">
                                <input id="address_line_1" type="text" class="form-control{{ $errors->has('address_line_1') ? ' is-invalid' : '' }}" name="address_line_1" value="{{ old('address_line_1') }}" required autofocus>

                                @if ($errors->has('address_line_1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="address_line_2" class="col-md-4 col-form-label text-md-right">{{ __('Address Line 2') }}</label>

                            <div class="col-md-6">
                                <input id="address_line_2" type="text" class="form-control{{ $errors->has('address_line_2') ? ' is-invalid' : '' }}" name="address_line_2" value="{{ old('address_line_2') }}" required autofocus>

                                @if ($errors->has('address_line_2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_line_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="suburb" class="col-md-4 col-form-label text-md-right">{{ __('Suburb') }}</label>

                            <div class="col-md-6">
                                <input id="suburb" type="text" class="form-control{{ $errors->has('suburb') ? ' is-invalid' : '' }}" name="suburb" value="{{ old('suburb') }}" required autofocus>

                                @if ($errors->has('suburb'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('suburb') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="state_region" class="col-md-4 col-form-label text-md-right">{{ __('State/ Region') }}</label>

                            <div class="col-md-6">
                                <input id="state_region" type="text" class="form-control{{ $errors->has('state_region') ? ' is-invalid' : '' }}" name="state_region" value="{{ old('state_region') }}" required autofocus>

                                @if ($errors->has('state_region'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state_region') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required autofocus>

                                @if ($errors->has('country'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                         <div class="form-group row">
                            <label for="postal_code" class="col-md-4 col-form-label text-md-right">{{ __('Postal Code') }}</label>

                            <div class="col-md-6">
                                <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ old('postal_code') }}" required autofocus>

                                @if ($errors->has('postal_code'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postal_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
                        
                        
                        
                        
                        
                        
@endsection
