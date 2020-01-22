<!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="index.html"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="ft-monitor"></i><span class="menu-title" data-i18n="">Bank</span>
				<span class="badge badge badge-primary badge-pill float-right mr-2">
					<?php echo e(App\Http\Controllers\frontend\BankController::getBankCount()); ?>

				</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="#">Bank</a>
                            <ul class="menu-content">
                                <li class="<?php if(Request::url() === url('/addBank')): ?> active <?php endif; ?>"><a class="menu-item" href="<?php echo e(url('/addBank')); ?>">Add Bank</a>
                                </li>
                                <li class="<?php if(Request::url() === url('/manage_banks')): ?> active <?php endif; ?>"><a class="menu-item" href="<?php echo e(url('/manage_banks')); ?>">Manage Banks</a>
                                </li>
                            </ul>
                        </li>					

                        <li><a class="menu-item" href="#">Category</a>
                            <ul class="menu-content">
                                <li class="<?php if(Request::url() === url('/addCategory')): ?> active <?php endif; ?>"><a class="menu-item" href="<?php echo e(url('/addCategory')); ?>">Add Category</a>
                                </li>
                                <li class="<?php if(Request::url() === url('/manage_categories')): ?> active <?php endif; ?>"><a class="menu-item" href="<?php echo e(url('/manage_categories')); ?>">Manage Categories</a>
                                </li>
                            </ul>
                        </li>
						<li><a class="menu-item" href="#">Branch<span class="badge badge badge-primary badge-pill float-right mr-2">
						<?php echo e(App\Http\Controllers\frontend\BankController::getBranchCount()); ?>

						</span></a>
                            <ul class="menu-content">
                                <li class="<?php if(Request::url() === url('/addBranch')): ?> active <?php endif; ?>"><a class="menu-item" href="<?php echo e(url('/addBranch')); ?>">Add Branch</a>
                                </li>
                                <li class="<?php if(Request::url() === url('/manage_branches')): ?> active <?php endif; ?>"><a class="menu-item" href="<?php echo e(url('/manage_branches')); ?>">Manage Branches</a>
                                </li>
                            </ul>
                        </li>
						<li><a class="menu-item" href="#">Department</a>
                            <ul class="menu-content">
                                <li class="<?php if(Request::url() === url('/addDepartment')): ?> active <?php endif; ?>"><a class="menu-item" href="<?php echo e(url('/addDepartment')); ?>">Add Department</a>
                                </li>
                                <li class="<?php if(Request::url() === url('/manage_departments')): ?> active <?php endif; ?>"><a class="menu-item" href="<?php echo e(url('/manage_departments')); ?>">Manage Departments</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->