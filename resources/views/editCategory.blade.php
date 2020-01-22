@include('layouts.header')
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

@include('layouts.dashboard_admin_header')
@include('layouts.dashboard_admin_sidebar')



     <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Edit Category</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Category</a>
                                </li>
                                <li class="breadcrumb-item active">Edit Category
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
                                    <h4 class="card-title" id="basic-layout-form">Edit Category</h4>
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
										{!! Form::open(array('url' => url('/edit_category/'.base64_encode($arrCatEditData->id)), 'class'=>'form-horizontal', 'id'=>'frmAddCategory')) !!}
											<input type="hidden" name="token" value="{{ csrf_token() }}">
											<input type="hidden" name="url" id='url' value="{{ url('/get-cities') }}">
											<input type="hidden" name="catId" id='' value="{{ $arrCatEditData->id }}">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>Category Details</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select Bank</label>
                                                            <select id="bank_name" name="bank_name" class="select2 form-control" style="width: 100%">
                                                                <option value="none" selected="" disabled="">Select Bank Name</option>
                                                                @foreach($arrAllBanks as $bank)
																<option value="{{$bank->id}}" 
																<?php if($arrCatEditData->bank_id == $bank->id){echo 'selected';}?>
																>{{$bank->bank_name}}</option>
																@endforeach
                                                             </select>
                                                        </div>
                                                    </div> 
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select Office Type</label>
                                                            <select id="office_type" name="office_type" class="select2 form-control" style="width: 100%">
                                                                <option value="none" selected="" disabled="">Select Type of Office</option>
                                                                <option value="Zonal" <?php if($arrCatEditData->office_type == 'Zonal'){echo 'selected';}?>>Zonal Office</option>
                                                                <option value="Regional" <?php if($arrCatEditData->office_type == 'Regional'){echo 'selected';}?>>Regional Office</option>
                                                                <option value="Circle"<?php if($arrCatEditData->office_type == 'Circle'){echo 'selected';}?>>Circle Office</option>
                                                                <option value="Head"<?php if($arrCatEditData->office_type == 'Head'){echo 'selected';}?>>Head Office</option>
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
																<option value="{{$state->state}}"
																<?php if($arrCatEditData->state == $state->state){echo 'selected';}?>
																>{{$state->state}}</option>
																@endforeach
															  </select>
                                                        </div>
                                                   </div>
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select City of <span class="dynamicValue">Zonal</span> Office</label>
                                                             <select name="office_city" class="select2 form-control block" id="responsive_single" style="width: 100%">
																<option value="none" selected="" disabled="">Select Office City</option>
																<option value="{{$arrCatEditData->city}}" selected="selected" disabled="">{{$arrCatEditData->city}}</option>
															  </select>
                                                        </div>
                                                   </div> 
                                                </div>
												<div class="row">
												   <div class="col-md-6">
                                                        <div class="form-group">
															<label for="zonal_manager_name">Enter <span class="dynamicValue">Zonal</span> Manager Name</label>
															{!! Form::text('zonal_manager_name', $arrCatEditData->manager_name, array('class' => 'form-control','id'=>'zonal_manager_name','placeholder'=>'Enter Manager Name')) !!}									
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                         <div class="form-group">
															<label for="zonal_manager_email">Enter <span class="dynamicValue">Zonal</span> Manager Email</label>
															{!! Form::text('zonal_manager_email', $arrCatEditData->manager_email, array('class' => 'form-control','id'=>'zonal_manager_email','placeholder'=>'Enter Manager Email')) !!}									
                                                        </div>
                                                    </div>												           
                                                </div>
													<div class="row">
													 <div class="col-md-6">
                                                        <div class="form-group">
															<label for="zonal_manager_alt_email">Enter <span class="dynamicValue">Zonal</span> Manager Alternate Email</label>
															{!! Form::text('zonal_manager_alt_email', $arrCatEditData->manager_alternate_email, array('class' => 'form-control','id'=>'zonal_manager_alt_email','placeholder'=>'Enter Manager Alternate Email')) !!}									
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="form-group">
															<label for="zonal_manager_mobile_no">Enter <span class="dynamicValue">Zonal</span> Manager Mobile No.</label>
															{!! Form::text('zonal_manager_mobile_no', $arrCatEditData->manager_mobile_no, array('class' => 'form-control','id'=>'zonal_manager_mobile_no','placeholder'=>'Enter Manager Mobile No.')) !!}									
                                                        </div>
                                                    </div>									           
                                                </div>
												<div class="row">
												  <div class="col-md-6">
                                                        <div class="form-group">
															<label for="zonal_manager_contact_no">Enter <span class="dynamicValue">Zonal</span> Manager Contact No.</label>
															{!! Form::text('zonal_manager_contact_no', $arrCatEditData->manager_contact_no, array('class' => 'form-control','id'=>'zonal_manager_contact_no','placeholder'=>'Enter Manager Contact No.')) !!}									
                                                        </div>
                                                    </div>	
                                                    <div class="col-md-6">
                                                         <div class="form-group">
															<label for="zonal_office_address">Enter <span class="dynamicValue">Zonal</span> Office Address</label>
															{!! Form::text('zonal_office_address', $arrCatEditData->office_address, array('class' => 'form-control','id'=>'zonal_office_address','placeholder'=>'Enter Office Address')) !!}									
                                                        </div>
                                                    </div>												           
                                                </div>
                                               </div>
                                            <div class="form-actions">
                                                <button type="reset" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" id="btnSubmit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Update
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
<script type="text/javascript" src="{{ URL::asset('public/js/admin/category.js') }}"></script>
<script>
var url = $("#url").val();
</script>