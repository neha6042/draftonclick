@include('layouts.header')

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">

@include('layouts.dashboard_admin_header')
@include('layouts.dashboard_admin_sidebar')



    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">Manage Category</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Category</a>
                                </li>
                                <li class="breadcrumb-item active">Manage Category
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- File export table -->
                <section id="file-export">
				@if (Session::has('success'))
					<div class="alert alert-dismissible alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					 <h4>{{Session::get('success')}}</h4>
					</div>
				@endif
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Bank Category</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered table-responsive file-export">
                                            <thead>
                                                <tr>
                                                    <th>Sr No</th>
                                                    <th>Bank Name</th>
                                                    <th>Office Type</th>
                                                    <th>State</th>
                                                    <th>City</th>
                                                    <th>Manager Name</th>
                                                    <th>Manager Email</th>
                                                    <th>Manager Alternate Email</th>
                                                    <th>Manager Mobile No</th>
                                                    <th>Manager Contact No</th>
                                                    <th>Office Address</th>
                                                    <th class="noExport">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
											<?php $j=1; ?>
											@foreach($arrCategoryDetails as $key => $val)
												<tr >
													<td>{{$j++}}</td>
													<td>{{$val->bank_name}}</td>
													<td>{{$val->office_type}}</td>
													<td>{{$val->state}}</td>
													<td>{{$val->city}}</td>
													<td>{{$val->manager_name}}</td>
													<td>{{$val->manager_email}}</td>
													<td>{{$val->manager_alternate_email}}</td>
													<td>{{$val->manager_mobile_no}}</td>
													<td>{{$val->manager_contact_no}}</td>
													<td>{{$val->office_address}}</td>
													<td>
														<a class="btn btn-icon btn-success mr-1" href="{{url('/edit_category/'.base64_encode($val->id))}}" title="Edit Category"><i class="ft-edit"></i></a>

														<button type="button" class="btn btn-icon btn-success mr-1" data-toggle="modal" data-placement="top" data-target = "#myModal_del"  title="Delete Category" onclick ="  $('#delete_value').val({{$val->id}}); "><i class="ft-delete"></i></button>
														
													</td>
												</tr>
											@endforeach
												
											</tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- File export table -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

		<!-- Model start for delete -->
			
			  <div class="modal fade" id="myModal_del" role="dialog">
				<div class="modal-dialog">
				
				  <!-- Modal content-->
				  <div class="modal-content">
						 <form name="forms_del" action="{{url('delete_category')}}" method="POST"> 
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
						    <div class="modal-header" style="border-bottom:0px;">
							  <button type="button" class="close" data-dismiss="modal"><span style="font-size:30px;">&times;</span></button>   
						</div>
						<div class="modal-body">
						   
							<h2 class="text-primary">Do you really want to delete ?</h2>

						<input type="hidden" name="delete_value" id="delete_value">
						<div class="form-group">
					
						<button type="submit"  name="del_record" class="btn btn-flat btn-accent">Yes</button>
						<button type="submit" class="btn btn-flat btn-accent" data-dismiss="modal">No</button>
						
						</div>			
						
					 
						</div>     
						</form>
						
				  </div>
				  
				</div>
		  </div>
		
		<!-- Model end for delete -->   

</body>
<!-- END: Body-->

@include('layouts.footer')
<script>
 $('.file-export').DataTable({
        dom: 'Bfrtip',
		buttons: [
		  {
			 extend: 'excel',
			 className: 'btn btn-default',
			 exportOptions: {
				stripHtml: false,
				columns: 'th:not(:last-child)'
			 }
		  },
		  {
			 extend: 'csv',
			 className: 'btn btn-default',
			 exportOptions: {
				stripHtml: false,
				columns: 'th:not(:last-child)'
			 }
		  },
		  {
			 extend: 'pdf',
			 className: 'btn btn-default',
			 exportOptions: {
				stripHtml: false,
				columns: 'th:not(:last-child)'
			 }
		  },
		  {
			 extend: 'print',
			 className: 'btn btn-default',
			 exportOptions: {
				stripHtml: false,
				columns: 'th:not(:last-child)'
			 }
		  }
	   ]
    });	
</script>	