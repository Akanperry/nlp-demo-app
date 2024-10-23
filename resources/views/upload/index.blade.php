@extends('layout.admin')
@section('title', 'Upload Book(s)')

@section('custom-css')
@stop

@section('content')
    <!-- MODAL STICK UP  -->
    <div class="modal fade stick-up" id="addNewAppModal" tabindex="-1" role="dialog" aria-labelledby="addNewAppModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header clearfix ">
                    <button aria-label="" type="button" class="close" data-bs-dismiss="modal" aria-hidden="true"><i class="pg-icon">close</i>
                    </button>
                    <h4 class="p-b-5"><span class="semi-bold">Batch</span> Upload</h4>
                </div>
                <div class="modal-body">
                    <!-- <p class="small-text">Upload batch files using this form, make sure you fill them all.</p> -->
                    <form role="form" method="post" action="{{ route('admin.upload.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="mb-2">.csv FIle (.xlsx not supported now.)</label>
                                <div class="form-group">
                                    <input id="appName" type="file" name="batch_file" class="form-control form-control-lg">
                                </div>
                                @error('batch_file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input class="d-none" type="text" name="upload-type" value="batch" required>
                        </div>

                    <div class="modal-footer">
                        <button aria-label="" type="submit" class="btn btn-primary  btn-cons">Upload</button>
                        <button aria-label="" type="button" class="btn btn-cons" data-bs-dismiss="modal">Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
    <!-- /.modal-dialog -->
    </div>

    <div class="container-fluid container-fixed-lg">
        <!-- START card -->
        <div class="card">
            <div class="card-header ">
                <div class="card-title">
                    <h6>Single Upload Form</h6>
                </div>
                <div class="pull-right row">
                    <div class="col-sm-6 mb-3">
                        <button aria-label="" id="show-modal" class="btn btn-primary btn-lg btn-cons"><i class="pg-icon">add</i> Batch Upload
                        </button>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <form id="update-password" role="form" autocomplete="off" action="{{ route('admin.upload.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input class="d-none" type="text" name="upload-type" value="single" required>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Book Name</label>
                                <input type="text" class="form-control" name="book_name" value="{{ old('book_name') }}" placeholder="" required>
                            </div>
                            @error('book_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Authors</label>
                                <input type="text" class="form-control" name="authors" value="{{ old('authors') }}" placeholder="Seperate mutiple authors with comma" required>
                            </div>
                            @error('authors')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-8">
                            <div class="form-group form-group-default">
                                <label>ISBN Number</label>
                                <input type="text" class="form-control" name="isbn_number" value="{{ old('isbn_number') }}" placeholder="" required>
                            </div>
                            @error('isbn_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Number of Pages</label>
                                <input type="number" class="form-control" name="number_of_pages" min="1" value="{{ old('number_of_pages') }}" placeholder="" required>
                            </div>
                            @error('number_of_pages')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-8">
                            <div class="form-group form-group-default">
                                <label>Publisher</label>
                                <input type="text" class="form-control" name="publisher" value="{{ old('publisher') }}" placeholder="" required>
                            </div>
                            @error('publisher')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Year Published</label>
                                <input type="text" class="form-control" name="year_published" value="{{ old('year_published') }}" placeholder="" required>
                            </div>
                            @error('publisher')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label class="mb-2">Book FIle</label>
                            <div class="form-group">
                                <input type="file" class="form-control form-control-lg" name="book_file" placeholder="" required>
                            </div>
                            @error('publisher')
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

@stop