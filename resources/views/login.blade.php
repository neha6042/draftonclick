@include('layouts.header')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
							@if(!empty($strError))
							<div class="alert alert-dismissible alert-danger">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							 <h4>{{$strError}}</h4>
							</div>
							@endif
							@if(!empty($strSuccess))
							<div class="alert alert-dismissible alert-success">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							 <h4>{{$strSuccess}}</h4>
							</div>
							@endif
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="{{ URL::asset('public/app-assets/images/logo/draftonclick-logo.png') }}" alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"><span>Enhance your Bank Drafting Experience</span></h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
										{!! Form::open(array('url' => url('/admin_login_check'), 'class'=>'form-horizontal', 'id'=>'frmLogin')) !!}
											<input type="hidden" name="token" value="{{ csrf_token() }}">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" name="username" class="form-control" id="user-name" placeholder="Enter Email">
                                                <div class="form-control-position">
                                                    <i class="ft-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" name="password" class="form-control" id="user-password" placeholder="Enter Password">
                                                <div class="form-control-position">
                                                    <i class="fa fa-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">
                                                    <fieldset>
                                                        <input type="checkbox" id="remember-me" class="chk-remember">
                                                        <label for="remember-me"> Remember Me</label>
                                                    </fieldset>
                                                </div>
                                                <!--<div class="col-sm-6 col-12 float-sm-left text-center text-sm-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>-->
                                            </div>
                                            <button type="submit" id="btnCheck" class="btn btn-outline-primary btn-block"><i class="ft-unlock"></i> Login</button>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

</body>
<!-- END: Body-->

@include('layouts.footer')
<script type="text/javascript" src="{{ URL::asset('public/js/admin/login.js') }}"></script>
<script>
$("#btnCheck").click(function() {
		$("#frmLogin").validate();
	});
</script>