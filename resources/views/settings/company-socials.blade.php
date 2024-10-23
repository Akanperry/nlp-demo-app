@extends('layout.admin')
@section('title', 'NLP Social Media Handles')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12" id="after-avater">
        <!-- START card -->
        <div class="card">
            <div class="card-body">
                <h4 class="mw-80 m-b-40">TROPIMS's Social Media Handles</h4>
                <form id="update-info" role="form" autocomplete="off" action="{{ route('admin.settings.company.socials.update') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Facbook</label>
                                <input type="text" class="form-control" name="facebook" value="{{ config('company.facebook') }}" placeholder="https://instagram.com/your-page-name" required>
                            </div>
                            @error('facebook')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Instagram</label>
                                <input type="text" class="form-control" name="instagram" value="{{ config('company.instagram') }}" placeholder="https://instagram.com/your-page-name" required>
                            </div>
                            @error('instagram')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>LinkedIn</label>
                                <input type="text" class="form-control" name="linkedin" value="{{ config('company.linkedin') }}" placeholder="https://linkedin.com/in/your-page-name" required>
                            </div>
                            @error('linkedin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>X (Twitter)</label>
                                <input type="text" class="form-control" name="twitter" value="{{config('company.twitter')}}" placeholder="https://twitter.com/your-page-name" required>
                            </div>
                            @error('twitter')
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