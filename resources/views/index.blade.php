@extends('layout.admin')
@section('title', 'Home')

@section('custom-css')
    <link href="{{asset('plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables-responsive/css/datatables.responsive.css')}}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{asset('plugins/bootstrap-tag/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/dropzone/css/dropzone.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <!-- START CONTAINER FLUID -->
    <div class=" container-fluid   container-fixed-lg bg-white m-t-20">
        <!-- START card -->
        <div class="card card-transparent">
            <div class="card-header ">
            <div class="card-title"><h6>Uploaded Books</h6></div>
            <div class="pull-right row">
                <div class="col-sm-12 mb-3">
                <input type="text" id="search-table" class="form-control" placeholder="Search">
                </div>
            </div>
            <div class="clearfix"></div>
            </div>
            <div class="card-body">
            <table class="table table-hover demo-table-search table-responsive-block" id="tableWithSearch">
                <thead>
                <tr>
                    <th>Book Name</th>
                    <th>Author (s)</th>
                    <th>ISBN Number</th>
                    <th>Number of Pages</th>
                    <th>Publisher</th>
                    <th>Year Published</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                <tr>
                    <td class="v-align-middle semi-bold">
                        <p>{{ $book->book_name }}</p>
                    </td>
                    <td class="v-align-middle">
                        <p>{{ $book->authors }}</p>
                    </td>
                    <td class="v-align-middle">
                        <p>{{ $book->isbn_number }}</p>
                    </td>
                    <td class="v-align-middle">
                        <p>{{ $book->publisher }}</p>
                    </td>
                    <td class="v-align-middle">
                        <p>{{ $book->year_published }}</p>
                    </td>
                    <td class="v-align-middle">
                        <a href="{{ asset($book->file) }}" target="_blank">View</a>
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

@stop

