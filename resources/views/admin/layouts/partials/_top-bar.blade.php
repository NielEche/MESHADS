
  <div class="page-container ">
    <div class="header ">
      <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar">
      </a>

      <div class="">
        <div class="brand inline  m-l-10 ">
          {{-- <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22"> --}}
          <a href="{{ route('admin.dashboard') }}">
            <img src="/images/mads_logo_black.png" alt="logo" data-src="/images/mads_logo_black.png" data-src-retina="/images/mads_logo_black.png" width="auto" height="32px">
          </a>
        </div>
      </div>
      <div class="d-flex align-items-center">

        <div class="pull-left p-r-10 fs-14 font-heading d-lg-block d-none">
          <span class="semi-bold">{{ auth()->user()->name }}</span>
        </div>
        <div class="dropdown pull-right d-lg-block d-none">
          <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="thumbnail-wrapper d32 circular inline">
              <img src="{{ asset('admin/assets/img/profiles/avatar.jpg') }}" alt="" data-src="{{ asset('admin/assets/img/profiles/avatar.jpg') }}" data-src-retina="{{ asset('admin/assets/img/profiles/avatar_small2x.jpg') }}" width="32" height="32">
            </span>
          </button>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
            <a href="#" class="dropdown-item"><i class="pg-settings_small"></i> Profile</a>
            {{-- <a href="#" class="dropdown-item"><i class="pg-outdent"></i> Feedback</a>
            <a href="#" class="dropdown-item"><i class="pg-signals"></i> Help</a> --}}
            <a href="{{ route('logout') }}" class="clearfix bg-master-lighter dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              <span class="pull-left">Logout</span>
              <span class="pull-right"><i class="pg-power"></i></span>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </div>
        
      </div>
    </div>
    
    <div class="page-content-wrapper ">