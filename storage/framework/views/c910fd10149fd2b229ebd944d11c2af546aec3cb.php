<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

<?php echo $__env->make('layouts.dashboard_admin_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.dashboard_admin_sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



     <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Update Department</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Department</a>
                                </li>
                                <li class="breadcrumb-item active">Update Department
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
                                    <h4 class="card-title" id="basic-layout-form">Update Department</h4>
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
										<?php echo Form::open(array('url' => url('/edit_department/'.base64_encode($arrDeptEditData->id)), 'class'=>'form-horizontal','enctype'=>'multipart/form-data', 'id'=>'frmAddDepartment')); ?>

											<input type="hidden" name="token" value="<?php echo e(csrf_token()); ?>">
											<input type="hidden" name="url" id='url' value="<?php echo e(url('/get-cities')); ?>">
											<input type="hidden" name="deptId" id='' value="<?php echo e($arrDeptEditData->id); ?>">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>Department Details</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select Bank</label>
                                                            <select id="bank_name" name="bank_name" class="select2 form-control" style="width: 100%">
                                                                <option value="none" selected="" disabled="">Select Bank Name</option>
                                                                <?php $__currentLoopData = $arrAllBanks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($bank->id); ?>" 
																<?php if($arrDeptEditData->bank_id == $bank->id){echo 'selected';}?>
																><?php echo e($bank->bank_name); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                             </select>
                                                        </div>
                                                    </div>
												      <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select Office Type</label>
                                                            <select id="office_type" name="office_type" class="select2 form-control" style="width: 100%">
                                                                <option value="none" selected="" disabled="">Select Type of Office</option>
                                                                <option value="Zonal" <?php if($arrDeptEditData->office_type == 'Zonal'){echo 'selected';}?>>Zonal Office</option>
                                                                <option value="Regional" <?php if($arrDeptEditData->office_type == 'Regional'){echo 'selected';}?>>Regional Office</option>
                                                                <option value="Circle"<?php if($arrDeptEditData->office_type == 'Circle'){echo 'selected';}?>>Circle Office</option>
                                                                <option value="Head"<?php if($arrDeptEditData->office_type == 'Head'){echo 'selected';}?>>Head Office</option>
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
																<option value="<?php echo e($state->state); ?>"
																<?php if($arrDeptEditData->state == $state->state){echo 'selected';}?>
																><?php echo e($state->state); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															  </select>
                                                        </div>
                                                   </div>
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput5">Select City of <span class="dynamicValue">Zonal</span> Office</label>
                                                             <select name="office_city" class="select2 form-control block" id="responsive_single" style="width: 100%">
																<option value="none" selected="" disabled="">Select Office City</option>
																<option value="<?php echo e($arrDeptEditData->city); ?>" selected="selected" disabled=""><?php echo e($arrDeptEditData->city); ?></option>
															  </select>
                                                        </div>
                                                   </div> 
                                                </div>
												<div class="row">
                                                     <div class="col-md-6">
                                                        <div class="form-group">
															<?php echo Form::label('dept_name','Enter Department Name'); ?>

															<?php echo Form::text('dept_name', $arrDeptEditData->dept_name, array('class' => 'form-control','id'=>'dept_name','placeholder'=>'Enter Department Name')); ?>									
                                                        </div>
                                                    </div>
													<div class="col-md-6">
                                                         <div class="form-group">
															<?php echo Form::label('dept_manager_name','Enter Deptarment Manager Name'); ?>

															<?php echo Form::text('dept_manager_name', $arrDeptEditData->dept_manager_name, array('class' => 'form-control','id'=>'dept_manager_name','placeholder'=>'Enter Deptarment Manager Name')); ?>									
                                                        </div>
                                                    </div>											           
                                                </div>
												<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															<?php echo Form::label('scale_of_dept_manager','Enter Department Manager Scale'); ?>

															<?php echo Form::text('scale_of_dept_manager', $arrDeptEditData->scale_of_dept_manager, array('class' => 'form-control','id'=>'scale_of_dept_manager','placeholder'=>'Enter Department Manager Scale')); ?>									
                                                        </div>
                                                    </div>	
													   <div class="col-md-6">
                                                         <div class="form-group">
															<?php echo Form::label('dept_email','Enter Department Email'); ?>

															<?php echo Form::text('dept_email', $arrDeptEditData->dept_email, array('class' => 'form-control','id'=>'dept_email','placeholder'=>'Enter Department Email')); ?>									
                                                        </div>
                                                    </div>										           
													</div>
													<div class="row">
                                                   <div class="col-md-6">
                                                        <div class="form-group">
															<?php echo Form::label('dept_alt_email','Enter Department Alternate Email'); ?>

															<?php echo Form::text('dept_alt_email', $arrDeptEditData->dept_alt_email, array('class' => 'form-control','id'=>'dept_alt_email','placeholder'=>'Enter Department Alternate Email')); ?>									
                                                        </div>
                                                    </div>
													  <div class="col-md-6">
                                                         <div class="form-group">
															<?php echo Form::label('dept_manager_mobile_no','Enter Department Manager Mobile No.'); ?>

															<?php echo Form::text('dept_manager_mobile_no', $arrDeptEditData->dept_manager_mobile_no, array('class' => 'form-control','id'=>'dept_manager_mobile_no','placeholder'=>'Enter Department Manager Mobile No.')); ?>									
                                                        </div>
                                                    </div>											           
													</div>
													<div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															<?php echo Form::label('dept_manager_contact_no','Enter Department Manager Contact No.'); ?>

															<?php echo Form::text('dept_manager_contact_no', $arrDeptEditData->dept_manager_contact_no, array('class' => 'form-control','id'=>'dept_manager_contact_no','placeholder'=>'Enter Department Manager Contact No.')); ?>									
                                                        </div>
                                                    </div>	
													<div class="col-md-6">
                                                         <div class="form-group">
															<?php echo Form::label('dept_office_address','Enter Department Office Address'); ?>

															<?php echo Form::text('dept_office_address', $arrDeptEditData->dept_office_address, array('class' => 'form-control','id'=>'dept_office_address','placeholder'=>'Enter Department Office Address')); ?>									
                                                        </div>
                                                    </div>											           
													</div>
                                               </div>
                                            <div class="form-actions">
                                                <button type="reset" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Update
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
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/admin/department.js')); ?>"></script>
<script>
var url = $("#url").val();
</script>