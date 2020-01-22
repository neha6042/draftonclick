<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style>
.nameerror{color:red;}
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
                    <h3 class="content-header-title mb-0"><?php echo e($strPageTitle); ?></h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Bank</a>
                                </li>
                                <li class="breadcrumb-item active"><?php echo e($strPageTitle); ?>

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
                                    <h4 class="card-title" id="basic-layout-form"><?php echo e($strPageTitle); ?></h4>
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
										<?php echo Form::open(array('url' => url('/edit_bank/'.base64_encode($arrBankEditData->id)), 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'id'=>'frmAddBank')); ?>

										<input type="hidden" name="_token" id='token' value="<?php echo e(csrf_token()); ?>">
										<input type="hidden" name="bankid" value="<?php echo e($arrBankEditData->id); ?>" id="bankid">
										<input type="hidden" name="url" id='url' value="<?php echo e(url('/checkBankName')); ?>">
                                            <div class="form-body">
                                                <h4 class="form-section"><i class="ft-user"></i>Bank Details</h4>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
															<?php echo Form::label('bank_name','Enter Bank Name'); ?>

															<?php echo Form::text('bank_name', $arrBankEditData->bank_name, array('class' => 'form-control','id'=>'bank_name','placeholder'=>'Enter Bank Name')); ?>									
                                                        </div>
                                                    </div>
													 <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?php echo Form::label('file','Bank Logo'); ?>

                                                              <div id="filediv">
																<input name="file" class="image_css form-control hidden" type="file" id="file" accept=".jpg,.jpeg,.png"/>
																<div id="imgdiv">
																<img style="height:200px;width:200px" id="img" class="img" src="<?php echo e(URL::to('public/images/bank/'.$arrBankEditData->bank_logo)); ?>" alt="image" />
																<button type="button" id="btnClose">change</button>
																</div>
															  </div>
                                                        </div>
                                                    </div>            
                                                </div>
                                               </div>
                                            <div class="form-actions">
                                                <a href="<?php echo e(url('/manage_banks')); ?>" class="btn btn-warning mr-1">
                                                    <i class="ft-x"></i> Cancel
                                                </a>
                                                <button type="submit" name="update" id="upload" class="btn btn-primary">
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
<script type="text/javascript" src="<?php echo e(URL::asset('public/js/admin/bank.js')); ?>"></script>
<script>
var url = $("#url").val();
$("#btnClose").click(function() {
		$("#imgdiv").hide();
		$("#file").removeClass('hidden');
	});
$("#btnCheck").click(function() {
		$("#frmAddBank").validate();
	});
</script>	