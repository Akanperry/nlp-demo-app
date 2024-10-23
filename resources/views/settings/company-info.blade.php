@extends('layout.admin')
@section('title', 'NLP Company Information')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12" id="after-avater">
        <!-- START card -->
        <div class="card">
            <div class="card-body">
                <h4 class="mw-80 m-b-40">TROPIMS's Compnay Information</h4>
                <form id="update-info" role="form" autocomplete="off" action="{{ route('admin.settings.company.info.update') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Company Name</label>
                                <input type="text" class="form-control" name="name" value="{{ config('company.company_name') }}" required>
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Comapny Email</label>
                                <input type="email" class="form-control" name="email" value="{{ config('company.company_email') }}" placeholder="example@address.com" required>
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Company Website</label>
                                <input type="text" class="form-control" name="website" value="{{ config('company.app_url') }}" required>
                            </div>
                            @error('website')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Comapny Phone Number</label>
                                <input type="text" class="form-control" name="phonenumber" value="{{ config('company.company_phonenumber') }}" placeholder="" required>
                            </div>
                            @error('phonenumber')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                                <label>Company Tagline</label>
                                <input type="text" class="form-control" name="tagline" value="{{ config('company.company_tagline') }}" required>
                            </div>
                            @error('tagline')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12">
                            <div class="form-group form-group-default required">
                                <label>Company Address</label>
                                <textarea style="height: 100px;" class="form-control" name="address" placeholder="" required>{{ config('company.company_address') }}</textarea>
                            </div>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row m-t-25">
                        <div class="col-xl-12">
                            <button aria-label="" class="btn btn-primary pull-right btn-lg btn-block w-100" type="submit">Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END card -->
    </div>
</div>
@stop

@section('custom-js')
    <script src="{{asset('plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <script src="{{asset('js/form_layouts.js')}}" type="text/javascript"></script>
@stop