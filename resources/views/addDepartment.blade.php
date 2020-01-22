@include('layouts.header')
<style>
#blah{height:200px;width:200px;margin-top:10px;}
.image_css
{
	color: green;
    padding: 5px;
    border: 1px dashed #123456;
    background-color: #f9ffe5;
}

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
                    <h3 class="content-header-title mb-0">Add Department</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Bank</a>
                                </li>
                                <li class="breadcrumb-item active">Add Department
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
                                    <h4 class="card-title" id="basic-layout-form">Add Department</h4>
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
										{!! Form::open(array('url' => url('/addDepartment'), 'class'=>'form-horizontal','enctype'=>'multipart/form-data', 'id'=>'frmAddDepartment')) !!}
											<input type="hidden" name="token" value="{{ csrf_token() }}">
											<input type="hidden" name="url" id='url' value="{{ url('/get-cities') }}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>Department Details</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select Bank</label>
                                                            <select id="bank_name" name="bank_name" class="select2 form-control" style="width: 100%">
                                                                <option value="none" selected="" disabled="">Select Bank Name</option>
                                                                @foreach($arrAllBanks as $bank)
																<option value="{{$bank->id}}">{{$bank->bank_name}}</option>
																@endforeach
                                                             </select>
                                                        </div>
                                                    </div>
												      <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select Office Type</label>
                                                            <select id="office_type" name="office_type" class="select2 form-control" style="width: 100%">
                                                                <option value="none" selected="" disabled="">Select Type of Office</option>
                                                                <option value="Zonal">Zonal Office</option>
                                                                <option value="Regional">Regional Office</option>
                                                                <option value="Circle">Circle Office</option>
                                                                <option value="Head">Head Office</option>
                                                             </select>
                                                        </div>
                                                    </div>     
                                                </div>   
												<div class="row">
												 <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select State of <span class="dynamicValue">Zonal</span> Office</label>
                                                             <select name="office_state" class="select2 form-control block" id="responsive_singlee" style="width: 100%">
																<option value="none" selected="" disabled="">Select Office State</option>
																@foreach($arrAllStates as $state)
																<option value="{{$state->state}}">{{$state->state}}</option>
																@endforeach
															  </select>
                                                        </div>
                                                   </div>
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select City of <span class="dynamicValue">Zonal</span> Office</label>
                                                             <select name="office_city" class="select2 form-control block" id="responsive_single" style="width: 100%">
																<option value="none" selected="" disabled="">Select Office City</option>
															  </select>
                                                        </div>
                                                   </div> 
                                                </div>
												<div class="row">
                                                     <div class="col-md-6">
                                                        <div class="form-group">
															{!!Form::label('dept_name','Enter Department Name')!!}
															{!! Form::text('dept_name', null, array('class' => 'form-control','id'=>'dept_name','placeholder'=>'Enter Department Name')) !!}									
                                                        </div>
                                                    </div>
													<div class="col-md-6">
                                                         <div class="form-group">
															{!!Form::label('dept_manager_name','Enter Deptarment Manager Name')!!}
															{!! Form::text('dept_manager_name', null, array('class' => 'form-control','id'=>'dept_manager_name','placeholder'=>'Enter Deptarment Manager Name')) !!}									
                                                        </div>
                                                    </div>											           
                                                </div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															{!!Form::label('scale_of_dept_manager','Enter Department Manager Scale')!!}
															{!! Form::text('scale_of_dept_manager', null, array('class' => 'form-control','id'=>'scale_of_dept_manager','placeholder'=>'Enter Department Manager Scale')) !!}									
                                                        </div>
                                                    </div>	
													   <div class="col-md-6">
                                                         <div class="form-group">
															{!!Form::label('dept_email','Enter Department Email')!!}
															{!! Form::text('dept_email', null, array('class' => 'form-control','id'=>'dept_email','placeholder'=>'Enter Department Email')) !!}									
                                                        </div>
                                                    </div>										           
													</div>
													<div class="row">
                                                   <div class="col-md-6">
                                                        <div class="form-group">
															{!!Form::label('dept_alt_email','Enter Department Alternate Email')!!}
															{!! Form::text('dept_alt_email', null, array('class' => 'form-control','id'=>'dept_alt_email','placeholder'=>'Enter Department Alternate Email')) !!}									
                                                        </div>
                                                    </div>
													  <div class="col-md-6">
                                                         <div class="form-group">
															{!!Form::label('dept_manager_mobile_no','Enter Department Manager Mobile No.')!!}
															{!! Form::text('dept_manager_mobile_no', null, array('class' => 'form-control','id'=>'dept_manager_mobile_no','placeholder'=>'Enter Department Manager Mobile No.')) !!}									
                                                        </div>
                                                    </div>											           
													</div>
													<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															{!!Form::label('dept_manager_contact_no','Enter Department Manager Contact No.')!!}
															{!! Form::text('dept_manager_contact_no', null, array('class' => 'form-control','id'=>'dept_manager_contact_no','placeholder'=>'Enter Department Manager Contact No.')) !!}									
                                                        </div>
                                                    </div>	
													<div class="col-md-6">
                                                         <div class="form-group">
															{!!Form::label('dept_office_address','Enter Department Office Address')!!}
															{!! Form::text('dept_office_address', null, array('class' => 'form-control','id'=>'dept_office_address','placeholder'=>'Enter Department Office Address')) !!}									
                                                        </div>
                                                    </div>											           
													</div>
                                               </div>
                                            <div class="form-actions">
                                                <button type="reset" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
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
<script type="text/javascript" src="{{ URL::asset('public/js/admin/department.js') }}"></script>
<script>
var url = $("#url").val();
</script>