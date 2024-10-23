@extends('layout.admin')
@section('title', 'NLP Logos')

@section('content')
<div class="row">
    <div class="col-xl-4 col-lg-4 ">
        <!-- START card -->
        <div class="card">
            <div class="card-body">
                <form id="image-uplaod" role="form" autocomplete="off" method="post" action="{{ route('admin.settings.company.logo-1.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div style="margin-bottom: 10px;">
                        <div class="circle" style="align-items: center; margin: auto;">
                            <img class="logo-1-pic" src="{{asset((config('company.app_logo_1')==null || config('company.app_logo_1')=='') ? 'https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png' : config('company.app_logo_1'))}}">
                        </div>
                        <div class="p-image" style="text-align: right; font-size: 20px">
                            <i class="fa fa-camera upload-logo-1-button"></i>
                            <input class="logo-1-upload" type="file" name="logo_1" accept="image/*"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div>
                        <div class="form-text mb-3">Recommended file size: Width - 143px, Height - 143px</div>
                        <button aria-label="" class="btn btn-primary pull-right btn-lg btn-block w-100" type="submit">Update Company Logo</button>
                    </div>

                </form>
            </div>
        </div>
        <!-- END card -->
    </div>

    <div class="col-xl-4 col-lg-4 ">
        <!-- START card -->
        <div class="card">
            <div class="card-body">
                <form id="image-uplaod" role="form" autocomplete="off" method="post" action="{{ route('admin.settings.company.logo-2.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div style="margin-bottom: 10px;">
                        <div class="circle" style="align-items: center; margin: auto;">
                            <img class="logo-2-pic" src="{{asset((config('company.app_logo_2')==null || config('company.app_logo_2')=='') ? 'https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png' : config('company.app_logo_2'))}}">
                        </div>
                        <div class="p-image" style="text-align: right; font-size: 20px">
                            <i class="fa fa-camera upload-logo-2-button"></i>
                            <input class="logo-2-upload" type="file" name="logo_2" accept="image/*"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div>
                        <div class="form-text mb-3">Recommended file size: Width - 572, Height - 108px</div>
                        <button aria-label="" class="btn btn-primary pull-right btn-lg btn-block w-100" type="submit">Update Company Alt Logo</button>
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

    <script>
        $(document).ready(function() {


        $(".logo-1-upload").on('change', function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.logo-1-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
        $(".logo-2-upload").on('change', function(){
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.logo-2-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }
        });
        

        $(".upload-logo-1-button").on('click', function() {
            $(".logo-1-upload").click();
        });
        $(".upload-logo-2-button").on('click', function() {
            $(".logo-2-upload").click();
        });
        
    });
    </script>
@stop