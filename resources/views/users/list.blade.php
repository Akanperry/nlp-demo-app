@extends('layout.admin')
@section('title', 'Users')

@section('custom-css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{asset('plugins/bootstrap-tag/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/dropzone/css/dropzone.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
    <!-- MODAL STICK UP  -->
    <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header clearfix ">
                    <button aria-label="" type="button" class="close" data-bs-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
                    </button>
                    <h4 class="p-b-5"><span class="semi-bold">Add</span> User</h4>
                </div>
                <div class="modal-body">
                    <p class="small-text">Create a new user using this form, make sure you fill them all.</p>
                    <form role="form" method="post" action="{{ route('admin.add.users') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <div class="circle" style="align-items: center; margin: auto;">
                                    <img class="profile-pic" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png">
                                </div>
                                <div class="p-image" style="text-align: right; font-size: 20px">
                                    <i class="fa fa-camera upload-button"></i>
                                    <input class="file-upload" type="file" name="profile_image" accept="image/*"/>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <label>Name</label>
                                    <input id="appName" type="text" name="name" class="form-control" placeholder="User's Name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input id="appDescription" type="email" name="email" class="form-control" placeholder="email@example.com">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                    <select class="full-width" data-init-plugin="select2" name="user_type">
                                        <option value="">Select Admin Type</option>
                                        <option value="super-admin">Super-Admin</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Password</label>
                                <input id="appDescription" type="password" name="password" class="form-control" >
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label>Confirm Password</label>
                                <input id="appDescription" type="password" name="password_confirmation" class="form-control" >
                            </div>
                            </div>
                        </div>

                    <div class="modal-footer">
                        <button aria-label="" type="submit" class="btn btn-primary  btn-cons">Add User</button>
                        <button aria-label="" type="button" class="btn btn-cons" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>

     <!-- START CONTAINER FLUID -->
     <div class=" container-fluid   container-fixed-lg bg-white">
            <!-- START card -->
            <div class="card card-transparent">
              <div class="card-header ">
              <div class="card-title"><h6>System Users</h6></div>
                <div class="pull-right row">
                  <div class="col-sm-6 mb-3">
                    <input type="text" id="search-table" class="form-control" placeholder="Search">
                  </div>
                  <div class="col-sm-6 mb-3">
                    <button aria-label="" id="show-modal" class="btn btn-primary btn-lg btn-cons"><i class="pg-icon">add</i> Add User
                    </button>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="card-body">
                <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                  <thead>
                    <tr>
                        <th>Photograph</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Last logged In</th>
                        <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="v-align-middle">
                        <img src="{{ asset(($user->img==null || $user->img=='') ? 'https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png' : $user->img) }}" width="50" class="list-image">
                      </td>
                      <td class="v-align-middle semi-bold">
                        <p>{{ $user->name }}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{ $user->email }}</p>
                      </td>
                      <td class="v-align-middle">
                        <p>{{ $user->logged_in }}</p>
                      </td>
                      <td class="v-align-middle">
                        <div style="display: inline-flex;">
                            <a href="{{route('admin.user.update', ['user' => $user->id])}}" class="btn btn-info m-1">Edit</a>
                            <a href="{{route('admin.user.delete', ['user' => $user->id])}}" class="btn btn-danger m-1">Delete</a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <!-- END card -->
          </div>
          <!-- END CONTAINER FLUID -->
@stop

@section('custom-js')
    <script src="{{asset('plugins/jquery-datatable/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/media/js/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/datatables.responsive.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/datatables-responsive/js/lodash.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('plugins/dropzone/dropzone.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/bootstrap-tag/bootstrap-tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jquery-inputmask/jquery.inputmask.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-form-wizard/js/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('js/datatables.js')}}" type="text/javascript"></script>

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