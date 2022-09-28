	@extends('admin.layouts.master')

	@section('content')

	<div class="content">
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
						<li class="breadcrumb-item bold active">Manage Project Services</li>
					</ol>
				</div>
			</div>
		</div>

		<!-- start Container -->
		<div class=" container-fluid m-b-20  container-fixed-lg">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-transparent">
						<div class="panel-body">
							 <span class="p-l-10 p-r-10 p-b-10 p-t-10 m-r-10">
								<input type="checkbox" name="master_checkbox" id="master_checkbox">
							</span> 

							<a class="btn btn-default btn-sm m-r-10" href="{{ route('admin.projects.index') }}"><i class="pg-arrow_left"></i> Back to Projects</a>
							<button type="button" data-toggle="modal" data-target="#createModal" class="btn btn-primary btn-sm m-r-10"><i class="pg-plus"></i>Add New Service</button>

							<button type="button" data-toggle="modal" data-target="#bulkDeleteModal" id="bulkDeleteBtn" class="btn btn-danger btn-sm hide"><i class="fa fa-ban"></i>&nbsp;Delete</button>
						</div>
					</div>
					

					{{-- Begin Bulk Delete Header Modal --}}
					<div class="modal fade slide-down disable-scroll" id="bulkDeleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">

						<div class="modal-dialog modal-sm">

							<div class="modal-content">
								
									<div class="modal-header">
										<button class="close" data-dismiss="modal" aria-label="close">
											<span aria-hidden="true"><i class="fa fa-times"></i></span>
										</button>
										<h4 class="modal-title">
											<strong>Attention</strong>
										</h4>
									</div>

									<div class="modal-body">

										<p>
											Are you sure you want to delete these items, you will lose all data asscotiated with them.
										</p>

									</div>

									<div class="modal-footer">
										<div class="hide bulk_delete_list">

										</div>
										<button type="submit" class="btn btn-warning pull-right">
											Bulk Delete
										</button>
										<a href="#" class="btn btn-default pull-right m-r-10" data-dismiss="modal">
											Cancel
										</a>
									</div>

							</div>

						</div>

					</div>
					{{-- End Bulk Delete Header Modal --}}


					{{-- Begin Delete Header Modal --}}
					@foreach ($services as $service)
						<div class="modal fade slide-down disable-scroll" id="deleteModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $service->id }}" aria-hidden="true">

							<div class="modal-dialog modal-sm">
 
								<div class="modal-content">
									<form id="mesh{{$service->id}}" action="{{ route('admin.projects.services.destroy', $service->id) }}" method="POST" >
										@csrf
										@method('DELETE')									
										<div class="modal-header">
											<button class="close" data-dismiss="modal" aria-label="close">
												<span aria-hidden="true"><i class="fa fa-times"></i></span>
											</button>
											<h4 class="modal-title">
												<strong>Attention</strong>
											</h4>
										</div>

										<div class="modal-body">

											<p>
												Are you sure you want to delete this item, you will lose all data associated with this item.
											</p>

										</div>

										<div class="modal-footer">
											<button type="submit" class="btn btn-warning pull-right">
												Delete
											</button>
											<a href="#" class="btn btn-default pull-right m-r-10" data-dismiss="modal">
												Cancel
											</a>
										</div>
									</form>
								</div>

							</div>

						</div>
					@endforeach
					{{-- End Delete Header Modal --}}

					{{-- Create New Modal --}}
					<div class="modal fade slide-down disable-scroll" id="createModal" tabindex="-1" role="dialog" aria-hidden="false">
						<div class="modal-dialog modal-lg">
							<div class="modal-content-wrapper">
								<div class="modal-content">
									<div class="modal-header clearfix text-left">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
										</button>
										<h5>Service Provided</h5>
									</div>
									<div class="modal-body">
										<form method="POST" role="form" action="{{ route('admin.projects.services.store', $project->id) }}">

											@csrf
											
											<div class="form-group form-group-default required @error('title') has-error @enderror">
												<label>Title</label>
												<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required>
												@error('title')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<input type="hidden" value="{{ $project->id }}" name="project_id">

											<div class="pull-left">
												<div class="checkbox check-success  ">
													<input type="checkbox" {{ old('is_visible') ? 'checked' : '' }} name="is_visible" id="checkbox-agree">
													<label for="checkbox-agree">Publish this post</label>
												</div>
											</div>

											<div class="clearfix"></div>

											<div class="modal-footer">
												<button type="submit" class="btn btn-warning pull-right">
													Save
												</button>
												<a href="#" class="btn btn-default pull-right m-r-10" data-dismiss="modal">
													Cancel
												</a>
											</div>

										</form>
										<!-- End Form -->
									</div>
								</div>
							</div>
						</div>
					</div>
					{{-- End Create New Modal --}}

					{{-- Edit Modal --}}
					@foreach ($services as $service)
						<div class="modal fade slide-down disable-scroll" id="editModal{{ $service->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $service->id }}" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content-wrapper">
									<div class="modal-content">
										<div class="modal-header clearfix text-left">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
											</button>
											<h5 class="bold">Edit Service</h5>
										</div>
										<div class="modal-body">
											<form method="POST" role="form" action="{{ route('admin.projects.services.update', [$service->id, $project->id]) }}">

												@csrf

												@method('PUT')

												<div class="form-group form-group-default required @error('title') has-error @enderror">
													<label>Title</label>
													<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $service->title }}" required>
													@error('title')
														<span class="invalid-feedback" role="alert">
															{{ $message }}
														</span>
													@enderror
												</div>

												<input type="hidden" name="project_id" value="{{ $project->id }}">

												<div class="pull-left">
													<div class="checkbox check-primary  ">
														<input type="checkbox" {{ $service->is_visible ?? old('is_visible') ? 'checked' : '' }} name="is_visible" id="editIsVisible{{ $service->id }}">
														<label for="editIsVisible{{ $service->id }}">Publish this post</label>
													</div>
												</div>

												<div class="clearfix"></div>

												<div class="modal-footer">
													<button type="submit" class="btn btn-warning pull-right">
														Update
													</button>
													<a href="#" class="btn btn-default pull-right m-r-10" data-dismiss="modal">
														Cancel
													</a>
												</div>

											</form>
											<!-- End Form -->

										</div>
									</div>
								</div>
							</div>
						</div>
					@endforeach
					{{-- End Edit Modal --}}

				</div>
			</div>
		</div>
		<!-- End Container -->


		<div class=" container-fluid container-fixed-lg">
			
			<div class="card-body">
				
				@include('admin._shared-components._display-alert')

				<div class="table-responsive">
					<table class="table table-hover" id="basicTable">
						<thead>
							<tr class="bold">
								<th style="width:35%">Service Provided</th>
								<th style="width:35%">Project Title</th>
								<th style="width:15%">Status</th>
								<th style="width:15%">&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($services as $service)
								<tr>
									<td class="v-align-middle text-capitalize semi-bold">{{ $service->title }}</td>
									<td class="v-align-middle text-capitalize">{{ $service->project->title }}</td>
									<td class="v-align-middle">
										<span class="badge {{ $service->is_visible ? 'badge-success' : 'badge-default' }}">{{ $service->visibility }}</span>
									</td>
									<td class="v-align-middle">
										<div class="card-controls">
									 
											<a class="card-refresh m-r-10" href="#" data-toggle="modal" data-target="#editModal{{ $service->id }}"><i class="fa fa-pencil"></i></a>
										
											<a class="card-close" href="#" data-toggle="modal" data-target="#deleteModal{{ $service->id }}"><i class="fa fa-times"></i></a>

										</div>
									</td>
{{-- 
									<td class="v-align-middle">
										<div class="">
											<div class="dropdown dropdown-default">
												<button class="btn dropdown-toggle text-center" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
												<div class="dropdown-menu">
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal{{ $service->id }}">Edit</a>
													<a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal{{ $service->id }}">Delete</a>
												</div>
											</div>
										</div>
									</td> --}}

								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

			
		</div>

	</div>
@endsection
	
@section("javascript")
	<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>

	<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
	<script type="text/javascript">
		$(function(){

			var masonryContainer = $(".masonryContainer");

			masonryContainer.imagesLoaded(function(){
				masonryContainer.masonry({
					itemSelector:".item",
				});
			});

			// start of bulk checkbox
			$("#master_checkbox").click(function(event){

				var checked = 0;

				if ($(this).is(":checked")) {

					$(".table_checkbox").prop("checked", true);
					$(".bulk_delete_list").html("");
					$(".table_checkbox").each(function(){
						var item_id = $(this).val();
						$("<input type='hidden' name='list[]' value='"+item_id+"' id='item"+item_id+"'>").prependTo(".bulk_delete_list");
					});
				}
				else {

					$(".table_checkbox").prop("checked", false);
					$(".bulk_delete_list").html("");
				}

				$(".table_checkbox").each(function(){

					if ($(this).is(":checked")) {
						checked ++;
					};

				});

				if (checked > 0) {
					// There are checked
					$("#bulkDeleteBtn").removeClass("hide");
				}
				else{
					// No checked
					if (!$("#bulkDeleteBtn").hasClass("hide")) {
						$("#bulkDeleteBtn").addClass("hide");
					};
				}
				
			});

			$(".table_checkbox").click(function(){

				var item_id = $(this).val(),
					checked = 0;

				if (!$(this).is(":checked")) {

					$("#master_checkbox").prop("checked", false);

					$(".bulk_delete_list #item"+item_id+"").remove();
				}
				else{

					$("<input type='hidden' name='list[]' value='"+item_id+"' id='item"+item_id+"'>").prependTo(".bulk_delete_list");
				}

				$(".table_checkbox").each(function(){

					if ($(this).is(":checked")) {
						checked ++;
					};

				});

				if (checked > 0) {
					// There are checked
					$("#bulkDeleteBtn").removeClass("hide");
				}
				else{
					// No checked
					if (!$("#bulkDeleteBtn").hasClass("hide")) {
						$("#bulkDeleteBtn").addClass("hide");
					};
				}
			});

		});
	</script>
	
@endsection

	