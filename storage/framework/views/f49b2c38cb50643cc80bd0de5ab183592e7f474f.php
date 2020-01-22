<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

<?php echo $__env->make('layouts.dashboard_admin_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.dashboard_admin_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



     <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Add Category</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Category</a>
                                </li>
                                <li class="breadcrumb-item active">Add Category
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
                                    <h4 class="card-title" id="basic-layout-form">Add Category</h4>
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
										<?php echo Form::open(array('url' => url('/addCategory'), 'class'=>'form-horizontal', 'id'=>'frmAddCategory')); ?>

											<input type="hidden" name="token" value="<?php echo e(csrf_token()); ?>">
											<input type="hidden" name="url" id='url' value="<?php echo e(url('/get-cities')); ?>">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>Category Details</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select Bank</label>
                                                            <select id="bank_name" name="bank_name" class="select2 form-control" style="width: 100%">
                                                                <option value="none" selected="" disabled="">Select Bank Name</option>
                                                                <?php $__currentLoopData = $arrAllBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($bank->id); ?>"><?php echo e($bank->bank_name); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
																<?php $__currentLoopData = $arrAllStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($state->state); ?>"><?php echo e($state->state); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
															<label for="zonal_manager_name">Enter <span class="dynamicValue">Zonal</span> Manager Name</label>
															<?php echo Form::text('zonal_manager_name', null, array('class' => 'form-control','id'=>'zonal_manager_name','placeholder'=>'Enter Manager Name')); ?>									
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                         <div class="form-group">
															<label for="zonal_manager_email">Enter <span class="dynamicValue">Zonal</span> Manager Email</label>
															<?php echo Form::text('zonal_manager_email', null, array('class' => 'form-control','id'=>'zonal_manager_email','placeholder'=>'Enter Manager Email')); ?>									
                                                        </div>
                                                    </div>												           
                                                </div>
													<div class="row">
													 <div class="col-md-6">
                                                        <div class="form-group">
															<label for="zonal_manager_alt_email">Enter <span class="dynamicValue">Zonal</span> Manager Alternate Email</label>
															<?php echo Form::text('zonal_manager_alt_email', null, array('class' => 'form-control','id'=>'zonal_manager_alt_email','placeholder'=>'Enter Manager Alternate Email')); ?>									
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                         <div class="form-group">
															<label for="zonal_manager_mobile_no">Enter <span class="dynamicValue">Zonal</span> Manager Mobile No.</label>
															<?php echo Form::text('zonal_manager_mobile_no', null, array('class' => 'form-control','id'=>'zonal_manager_mobile_no','placeholder'=>'Enter Manager Mobile No.')); ?>									
                                                        </div>
                                                    </div>									           
                                                </div>
												<div class="row">
												  <div class="col-md-6">
                                                        <div class="form-group">
															<label for="zonal_manager_contact_no">Enter <span class="dynamicValue">Zonal</span> Manager Contact No.</label>
															<?php echo Form::text('zonal_manager_contact_no', null, array('class' => 'form-control','id'=>'zonal_manager_contact_no','placeholder'=>'Enter Manager Contact No.')); ?>									
                                                        </div>
                                                    </div>	
                                                    <div class="col-md-6">
                                                         <div class="form-group">
															<label for="zonal_office_address">Enter <span class="dynamicValue">Zonal</span> Office Address</label>
															<?php echo Form::text('zonal_office_address', null, array('class' => 'form-control','id'=>'zonal_office_address','placeholder'=>'Enter Office Address')); ?>									
                                                        </div>
                                                    </div>												           
                                                </div>
                                               </div>
                                            <div class="form-actions">
                                                <button type="reset" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" id="btnSubmit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Submit
                                                </button>
                                            </div>
                                        <?php echo Form::close(); ?>

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



<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/admin/category.js')); ?>"></script>
<script>
var url = $("#url").val();
</script>