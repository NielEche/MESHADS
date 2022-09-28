<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/pages/ico/76.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('admin/pages/ico/120.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('admin/pages/ico/152.png') }}">
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="{{ asset('admin/assets/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('admin/assets/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
    <link href="{{ asset('admin/pages/css/pages-icons.css') }}" rel="stylesheet" type="text/css">
    <link class="main-stylesheet" href="{{ asset('admin/pages/css/themes/corporate.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        window.onload = function()
        {
          // fix for windows 8
          if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
            document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="pages/css/windows.chrome.fix.css" />'
        }
    </script>
</head>
<body class="fixed-header menu-pin menu-behind">
    <div class="login-wrapper ">

        <div class="bg-pic">

            <img src="{{ asset('admin/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" data-src="{{ asset('admin/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" data-src-retina="{{ asset('admin/assets/img/demo/new-york-city-buildings-sunrise-morning-hd-wallpaper.jpg') }}" alt="" class="lazy">

            <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
                <h2 class="semi-bold text-white">We are {{ config('app.name') }}</h2>
                <p class="small">
                    © {{ date('Y') }} {{ config('app.name') }}.
                </p>
            </div>

        </div>


        <div class="login-container bg-white">
            <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
                <img src="{{ asset('images/mesh_logo_black_primary.png') }}" 
                alt="logo" data-src="{{ asset('images/mesh_logo_black_primary.png') }}" data-src-retina="{{ asset('images/mesh_logo_black_primary.png') }}" width="auto" height="64px"> 

                {{-- <h1>{{ config('app.name') }}</h1> --}}

                <p class="p-t-35">Sign into admin area</p>

                @if ( session()->has('deactivated_msg') )
                    <div class="alert alert-danger" role="alert">
                        <button class="close" data-dismiss="alert"></button>
                        {!! session()->get('deactivated_msg') !!}
                    </div>
                @endif

                <form id="form-loginzz" class="p-t-15" role="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group form-group-default @error('email') has-error @enderror">
                        <label>Email</label>
                        <div class="controls">
                            <input type="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group form-group-default @error('password') has-error @enderror">
                        <label>Password</label>
                        <div class="controls">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 no-padding sm-p-l-10">
                            <div class="checkbox ">
                                <input name="remember" type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Keep Me Signed in</label>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-end">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-info small">Forgot password?</a>
                            @endif
                        </div>
                    </div>

                    <button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
                </form>

                <div class="pull-bottom sm-pull-bottom">
                    <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
                        <div class="col-sm-3 col-md-2 no-padding">
                            {{-- <img alt="" class="m-t-5" data-src="{{ asset('admin/assets/img/demo/pages_icon.png') }}" data-src-retina="{{ asset('admin/assets/img/demo/pages_icon_2x.png') }}" height="60" src="{{ asset('admin/assets/img/demo/pages_icon.png') }}" width="60"> --}}
                        </div>
                        <div class="col-sm-9 no-padding m-t-10">
                            {{-- <p>
                                <small>
                                    Create a pages account. If you have a facebook account, log into it for this
                                    process. Sign in with <a href="#" class="text-info">Facebook</a> or <a href="#" class="text-info">Google</a>
                                </small>
                            </p> --}}
                        </div>
                    </div>
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
    <script src="{{ asset('admin/assets/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('admin/pages/js/pages.min.js') }}"></script>
    <script>
        $(function()
        {
          $('#form-login').validate()
      })
    </script>
</body>

</html>