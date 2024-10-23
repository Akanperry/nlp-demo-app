        <!-- END PLACE PAGE CONTENT HERE -->
        </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->
        <div class=" container-fluid  container-fixed-lg footer">
          <div class="copyright sm-text-center">
            <p class="small-text no-margin pull-left sm-pull-reset">
              ©{{date('Y', strtotime('today'))}} All Rights Reserved. Pages® and/or its subsidiaries or affiliates are registered trademark of {{config('company.company_name')}}.
            </p>
            <div class="clearfix"></div>
          </div>
        </div>
        <!-- END COPYRIGHT -->
      </div>
      <!-- END PAGE CONTENT WRAPPER -->
    </div>
    <!-- END PAGE CONTAINER -->
    <!-- START OVERLAY -->
    <div class="overlay hide" data-pages="search">
      <!-- BEGIN Overlay Content !-->
      <div class="overlay-content has-results m-t-20">
        <!-- BEGIN Overlay Header !-->
        <div class="container-fluid">
          <!-- BEGIN Overlay Logo !-->
          <img class="overlay-brand" src="{{asset(config('company.app_logo_1'))}}" alt="logo" data-src="{{asset(config('company.app_logo_1'))}}" data-src-retina="{{asset(config('company.app_logo_1'))}}" width="200">
          <!-- END Overlay Logo !-->
          <!-- BEGIN Overlay Close !-->
          <a href="#" class="close-icon-light btn-link btn-rounded  overlay-close text-black">
            <i class="pg-icon">close</i>
          </a>
          <!-- END Overlay Close !-->
        </div>
        <!-- END Overlay Header !-->
        <div class="container-fluid">
          <!-- BEGIN Overlay Controls !-->
          <input id="overlay-search" class="no-border overlay-search bg-transparent" placeholder="Search..." autocomplete="off" spellcheck="false">
          <br>
          <div class="d-flex align-items-center">
            <div class="form-check right m-b-0">
              <input id="checkboxn" type="checkbox" value="1">
              <label for="checkboxn">Search within page</label>
            </div>
            <p class="fs-13 hint-text m-l-10 m-b-0">Press enter to search</p>
          </div>
          <!-- END Overlay Controls !-->
        </div>
        <!-- BEGIN Overlay Search Results, This part is for demo purpose, you can add anything you like !-->
        <div class="container-fluid p-t-20">
          <span class="hint-text">
                suggestions :
            </span>
          <span class="overlay-suggestions"></span>
          <br>
          <div class="search-results m-t-30">
            <p class="bold">Pages Search Results: <span class="overlay-suggestions"></span></p>
            <div class="row">
              <div class="col-md-6">
                
              </div>
              <div class="col-md-6">
                
              </div>
            </div>
          </div>
        </div>
        <!-- END Overlay Search Results !-->
      </div>
      <!-- END Overlay Content !-->
    </div>
    <!-- END OVERLAY -->
    <!-- BEGIN VENDOR JS -->
    <script src="{{asset('plugins/pace/pace.min.js')}}" type="text/javascript"></script>
    <!--  A polyfill for browsers that don't support ligatures: remove liga.js if not needed-->
    <script src="{{asset('plugins/liga.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/modernizr.custom.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/popper/umd/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery/jquery-easy.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-unveil/jquery.unveil.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-ios-list/jquery.ioslist.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/jquery-actual/jquery.actual.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/classie/classie.js')}}"></script>
    <!-- END VENDOR JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="{{asset('pages/js/pages.js')}}"></script>
    <!-- END CORE TEMPLATE JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <script src="{{asset('js/scripts.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS -->

    @yield('custom-js')

  </body>

</html>