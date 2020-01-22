<?php echo Form::open(array('url' => url('/dashboard'), 'class'=>'form floating-label', 'id'=>'frmLogin','name'=>'cookietest')); ?>

								<input type="hidden" name="token" value="<?php echo e(csrf_token()); ?>">
								<div class="form-group">		
									<?php echo Form::text('username', null, array('class' => 'form-control','id'=>'username')); ?>									
									<?php echo Form::label('username','Username'); ?>

								</div>
								
								<div class="form-group">
									<?php echo Form::password('password',array('class' => 'form-control')); ?>

									<?php echo Form::label('password','Password'); ?>

									<p class="help-block"><a href="#" data-toggle="modal" data-target="#formModal">Forgotten?</a></p>
						
								</div>
								<br/>
								<div class="row">
									<!--<div class="col-xs-6 text-left">
										<div class="checkbox checkbox-inline checkbox-styled">
											<label>
												<input type="checkbox" name="remember"> <span>Remember me</span>
											</label>
										</div>
									</div>-->
									<div class="col-xs-12 text-right">
										<?php echo Form::button('Login', array('type' => 'submit','class'=> 'btn btn-primary btn-raised','id'=>'submitLogin'));; ?>

									</div><!--end .col -->
								</div><!--end .row -->
							<?php echo Form::close(); ?>