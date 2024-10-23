@extends('layout.admin')
@section('title', 'NLP SMTP Configuration')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12" id="after-avater">
        <!-- START card -->
        <div class="card">
            <div class="card-body">
                <h4 class="mw-80 m-b-40">TROPIMS's SMTP Configuration</h4>
                <form id="update-info" role="form" autocomplete="off" action="{{ route('admin.settings.company.smtp.update') }}" method="post">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Mailer</label>
                                <input type="text" class="form-control" name="mailer" value="{{ config('mail.mailers.smtp.transport') }}" required disabled>
                            </div>
                            @error('mailer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Host</label>
                                <input type="text" class="form-control" name="host" value="{{ config('mail.mailers.smtp.host') }}" required>
                            </div>
                            @error('host')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Port</label>
                                <input type="text" class="form-control" name="port" value="{{ config('mail.mailers.smtp.port') }}" required>
                            </div>
                            @error('port')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Mail From Address</label>
                                <input type="email" class="form-control" name="mail_from" value="{{ config('mail.from.address') }}" placeholder="example@mail.com" required>
                            </div>
                            @error('mail_from')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" value="{{ config('mail.mailers.smtp.username') }}" required>
                            </div>
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" value="{{ config('mail.mailers.smtp.password') }}" required>
                            </div>
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>Encryption</label>
                                <input type="text" class="form-control" name="encryption" value="{{ config('mail.mailers.smtp.encryption') }}" required>
                            </div>
                            @error('encryption')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default required">
                                <label>URL</label>
                                <input type="text" class="form-control" name="url" value="{{ config('mail.mailers.smtp.url') }}">
                            </div>
                            @error('url')
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