<div class=" container-fluid  container-fixed-lg footer">
      <div class="copyright sm-text-center">
        <p class="small no-margin pull-left sm-pull-reset">
          <span class="hint-text">Copyright &copy; {{ date('Y') }} </span>
          <span class="font-montserrat">{{ config('app.name') }}</span>.
          <span class="hint-text">All rights reserved. </span>
          {{-- <span class="sm-block"><a href="#" class="m-l-10 m-r-10">Terms of use</a> <span class="muted">|</span> <a href="#" class="m-l-10">Privacy Policy</a></span> --}}
        </p>
        <p class="small no-margin pull-right sm-pull-reset">
          {{-- Hand-crafted <span class="hint-text">&amp; made with Love</span> --}}
        </p>
        <div class="clearfix"></div>
      </div>
    </div>

  </div>

  </div>

  <script src="{{ asset('admin/assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/plugins/modernizr.custom.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/plugins/popper/umd/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/plugins/jquery/jquery-easy.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/plugins/jquery-unveil/jquery.unveil.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/plugins/jquery-ios-list/jquery.ioslist.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/plugins/jquery-actual/jquery.actual.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admin/assets/plugins/select2/js/select2.full.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('admin/assets/plugins/classie/classie.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/switchery/js/switchery.min.js') }}" type="text/javascript"></script>
  
  @yield('js_plugin')

  <script src="{{ asset('admin/pages/js/pages.js') }}"></script>
  <script src="{{ asset('admin/assets/js/scripts.js') }}" type="text/javascript"></script>
  <script src="{{ asset('admin/assets/js/form_elements.js') }}" type="text/javascript"></script>

  
  @yield('custom_js')
    <script src="{{ asset('admin/assets/js/scripts.js') }}" type="text/javascript"></script>

  @yield('javascript')

</body>

</html>
