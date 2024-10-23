@extends('layout.admin')
@section('title', 'Update User')

@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-4 ">
            <!-- START card -->
            <div class="card">
                <div class="card-body">
                    <form id="image-uplaod" role="form" autocomplete="off" method="post" action="{{ route('admin.user.update.image') }}" enctype="multipart/form-data">
                        @csrf
                        <div style="margin-bottom: 10px;">
                            <div class="circle" style="align-items: center; margin: auto;">
                                <img class="profile-pic" src="{{asset(($user->img==null || $user->img=='') ? 'https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png' : $user->img)}}">
                            </div>
                            <div class="p-image" style="text-align: right; font-size: 20px">
                                <i class="fa fa-camera upload-button"></i>
                                <input class="file-upload" type="file" name="profile_image" accept="image/*"/>
                                <input type="email" name="email" value="{{ $user->email }}" style="display: none;">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div>
                            <button aria-label="" class="btn btn-primary pull-right btn-lg btn-block w-100" type="submit">Update Profile Image</button>
                        </div>

                    </form>
                </div>
            </div>
            <!-- END card -->
        </div>
        <div class="col-xl-8 col-lg-8" id="after-avater">
            <!-- START card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="mw-80 m-b-40">Update Biodata</h4>
                    <form id="update-info" role="form" autocomplete="off" action="{{ route('admin.user.update.info') }}" method="post">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group form-group-default required">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" required>
                                </div>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="example@address.com" required>
                                </div>
                                @error('email')
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
        <div class="col-xl-12 col-lg-12 ">
            <!-- START card -->
            <div class="card">
                <div class="card-body">
                    <h4 class="mw-80 m-b-40">Change Password</h4>
                    <form id="update-password" role="form" autocomplete="off" action="{{ route('admin.user.update.password') }}" method="post">
                        @csrf
                        <div class="row clearfix">
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Minimum of 8 characters." required>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Confirm password</label>
                                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Minimum of 8 characters." required>
                                </div>
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="email" name="email" value="{{ $user->email }}" style="display: none;">
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

    <script>
        $(document).ready(function() {

    
        var readURL = function(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.profile-pic').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $(".file-upload").on('change', function(){
            readURL(this);
        });

        $(".upload-button").on('click', function() {
            $(".file-upload").click();
        });
    });
    </script>
@stop