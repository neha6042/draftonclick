@include('layouts.header')
<style>
.nameerror{color:red;}
</style>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

@include('layouts.dashboard_admin_header')
@include('layouts.dashboard_admin_sidebar')



     <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Add Bank</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Bank</a>
                                </li>
                                <li class="breadcrumb-item active">Add Bank
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
             </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form">Add Bank</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
										{!! Form::open(array('url' => url('/addBank'), 'class'=>'form-horizontal','enctype'=>'multipart/form-data', 'id'=>'frmAddBank')) !!}
										<input type="hidden" name="_token" id='token' value="{{ csrf_token() }}">
										<input type="hidden" name="url" id='url' value="{{ url('/checkBankName') }}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>Bank Details</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															{!!Form::label('bank_name','Enter Bank Name')!!}
															{!! Form::text('bank_name', null, array('class' => 'form-control','id'=>'bank_name','placeholder'=>'Enter Bank Name')) !!}									
                                                        </div>
                                                    </div>
													 <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!!Form::label('file','Select Bank Logo')!!}
                                                              <div id="filediv">
																<input name="file" class="image_css form-control" type="file" id="file" accept=".jpg,.jpeg,.png"/>
															  </div>
                                                        </div>
                                                    </div>            
                                                </div>
                                               </div>
                                            <div class="form-actions">
                                                <a href="{{ url('/manage_banks') }}" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Submit
                                                </button>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                 </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

   

</body>
<!-- END: Body-->



@include('layouts.footer')
<script type="text/javascript" src="{{ URL::asset('public/js/admin/bank.js') }}"></script>
<script>
var url = $("#url").val();
$("#btnCheck").click(function() {
		$("#frmAddBank").validate();
	});
</script>	