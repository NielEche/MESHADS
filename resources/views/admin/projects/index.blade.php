	@extends('admin.layouts.master')

	@section('content')

	<div class="content">
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
						<li class="breadcrumb-item bold active">Manage Projects</li>
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
							<button type="button" data-toggle="modal" data-target="#createModal" class="btn btn-default btn-sm m-r-10"><i class="pg-plus"></i>Add New Project</button>
							<button type="button" data-toggle="modal" data-target="#sizeGuideModal" class="btn btn-complete btn-sm m-r-10">Size Guide</button>

							<button type="button" data-toggle="modal" data-target="#bulkDeleteModal" id="bulkDeleteBtn" class="btn btn-danger btn-sm hide"><i class="fa fa-ban"></i>&nbsp;Delete</button>
						</div>
					</div>

					{{-- Begin Size Guide Modal --}}
					<div class="modal fade slide-down disable-scroll" id="sizeGuideModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">

						<div class="modal-dialog">

							<div class="modal-content">
								<div class="modal-header">
									<a class="close" data-dismiss="modal" aria-label="close">
										<span aria-hidden="true"><i class="fa fa-times"></i></span>
									</a>
									<h4 class="modal-title">
										Size Guide
									</h4>
								</div>

								<div class="modal-body">
									<table id="myDataTable" class="table table-hover" cellspacing="0" width="100%">
									    <thead>
									        <tr>
									            <th>Type</th>
									            <th>Width</th>
									            <th>Height</th>
									        </tr>
									    </thead>									
										<tbody>
											<tr>
									            <td>Cover Image</td>
									            <td>1250</td>
									            <td>1250</td>
									        </tr>
											<tr>
									            <td>Alt. Cover Image</td>
									            <td>1250</td>
									            <td>800</td>
									        </tr>
									    </tbody>
								    </table>
								</div>

								<div class="modal-footer">
									<a href="#" class="btn btn-default pull-right m-r-10" data-dismiss="modal">
										Close
									</a>
								</div>
							</div>

						</div>

					</div>
					{{-- End Size Guide Modal --}}

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

					{{-- Begin Preview Header Modal --}}
					@foreach ($projects as $project)
						<div class="modal fade fill-in" id="previewModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel{{ $project->id }}" aria-hidden="true">
							<button class="close" data-dismiss="modal" aria-label="close">
								<span aria-hidden="true"><i class="fa fa-times"></i></span>
							</button>

							<div class="modal-dialog">

								<div class="modal-content">
										<div class="modal-header">
											{{-- Empty header --}}
										</div>

										<div class="modal-body">

											<ul class="list-unstyled">

												<li>
													<h4><strong>{{ $project->title }}</strong></h4>
												</li>

												<li>
													<img src="{{ $project->coverImage }}" style="max-width:100%;">
												</li>

												@if(!empty($project->caption))
													<li>
														<p>
															{{ $project->caption }}
														</p>
													</li>
												@endif

											</ul>
											
										</div>

										<div class="modal-footer">
											{{-- Empty footer --}}
										</div>

								</div>

							</div>

						</div>
					@endforeach
					{{-- End Preview Header Modal --}}


					{{-- Begin Delete Header Modal --}}
					@foreach ($projects as $project)
						<div class="modal fade slide-down disable-scroll" id="deleteModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $project->id }}" aria-hidden="true">

							<div class="modal-dialog modal-sm">
 
								<div class="modal-content">
									<form id="mesh{{$project->id}}" action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" >
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
										<h5>Create New Project</h5>
									</div>
									<div class="modal-body">
										<form method="POST" role="form" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">

											{{-- @include('admin._shared-components._display-alert') --}}

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

											<div class="form-group form-group-default @error('caption') has-error @enderror">
												<label>Caption</label>
												<input type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}">
												@error('caption')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default required @error('category') has-error @enderror">
												<label>Project Category</label>
												<select class="form-control @error('category') is-invalid @enderror" name="category" required>
													<option value="">Select Category Type</option>
													@foreach ($categories as $category)
														<option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
													@endforeach
												</select>
												@error('category_id')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>
							
											<div class="form-group form-group-default required @error('client_name') has-error @enderror">
												<label>Client Name </label>
												<input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" value="{{ old('client_name') }}" required>
												@error('client_name')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default @error('quote') has-error @enderror">
												<label>Quote</label>
												<input type="text" class="form-control @error('quote') is-invalid @enderror" name="quote" value="{{ old('quote') }}">
												@error('quote')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>
							
											<div class="form-group form-group-default @error('quote_author') has-error @enderror">
												<label>Quote Author</label>
												<input type="text" class="form-control @error('quote_author') is-invalid @enderror" name="quote_author" value="{{ old('quote_author') }}">

												@error('quote_author')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default required @error('project_brief') has-error @enderror">
												<label>Project Brief</label>
												<textarea class="summernote form-control @error('project_brief') is-invalid @enderror" name="project_brief" rows="20" style="height: 290px;line-height: 1.5;" required>{{ old('project_brief') }}</textarea>

												@error('project_brief')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default required @error('cover_image') has-error @enderror">
												<label>Cover Image</label>
												<input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" value="{{ old('cover_image') }}" required>
												@error('cover_image')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default @error('alternative_cover_image') has-error @enderror">
												<label>Alternative Cover Image</label>
												<input type="file" class="form-control @error('alternative_cover_image') is-invalid @enderror" name="alternative_cover_image" value="{{ old('alternative_cover_image') }}">
												@error('alternative_cover_image')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default @error('project_video_url') has-error @enderror">
												<label>Project Video URL</label>
												<input type="text" class="form-control @error('project_video_url') is-invalid @enderror" name="project_video_url" value="{{ old('project_video_url') }}">
												@error('project_video_url')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

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
					@foreach ($projects as $project)
						<div class="modal fade slide-down disable-scroll" id="editModal{{ $project->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $project->id }}" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content-wrapper">
									<div class="modal-content">
										<div class="modal-header clearfix text-left">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
											</button>
											<h5 class="bold">Edit Project</h5>
										</div>
										<div class="modal-body">
											<form method="POST" role="form" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">

											{{-- @include('admin._shared-components._display-alert') --}}

											@csrf

											@method('PUT')

											<div class="form-group form-group-default required @error('title') has-error @enderror">
												<label>Title</label>
												<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $project->title }}" required>
												@error('title')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default @error('caption') has-error @enderror">
												<label>Caption</label>
												<input type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') ?? $project->caption }}">
												@error('caption')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default required @error('category') has-error @enderror">
												<label>Project Category</label>
												<select class="form-control @error('category') is-invalid @enderror" name="category" required>
													<option value="">Select Category Type</option>
													@foreach ($categories as $category)
														<option value="{{ $category->id }}" {{ old('category') ?? $project->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
													@endforeach
												</select>
												@error('category_id')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>
							
											<div class="form-group form-group-default required @error('client_name') has-error @enderror">
												<label>Client Name </label>
												<input type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" value="{{ old('client_name') ?? $project->client_name }}" required>
												@error('client_name')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default @error('quote') has-error @enderror">
												<label>Quote</label>
												<input type="text" class="form-control @error('quote') is-invalid @enderror" name="quote" value="{{ old('quote') ?? $project->quote }}">
												@error('quote')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>
							
											<div class="form-group form-group-default @error('quote_author') has-error @enderror">
												<label>Quote Author</label>
												<input type="text" class="form-control @error('quote_author') is-invalid @enderror" name="quote_author" value="{{ old('quote_author') ?? $project->quote_author }}">

												@error('quote_author')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default required @error('project_brief') has-error @enderror">
												<label>Project Brief</label>
												<textarea class="summernote form-control @error('project_brief') is-invalid @enderror" name="project_brief" rows="20" style="height: 290px;line-height: 1.5;" required>{{ old('project_brief') ?? $project->project_brief }}</textarea>

												@error('project_brief')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default @error('cover_image') has-error @enderror">
												<label>Cover Image</label>
												<input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image" value="{{ old('cover_image') }}">
												@error('cover_image')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default @error('alternative_cover_image') has-error @enderror">
												<label>Alternative Cover Image</label>
												<input type="file" class="form-control @error('alternative_cover_image') is-invalid @enderror" name="alternative_cover_image" value="{{ old('alternative_cover_image') }}">
												@error('alternative_cover_image')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="form-group form-group-default @error('project_video_url') has-error @enderror">
												<label>Project Video URL</label>
												<input type="text" class="form-control @error('project_video_url') is-invalid @enderror" name="project_video_url" value="{{ old('project_video_url') }}">
												@error('project_video_url')
													<span class="invalid-feedback" role="alert">
														{{ $message }}
													</span>
												@enderror
											</div>

											<div class="pull-left">
												<div class="checkbox check-primary  ">
													<input type="checkbox" {{ $project->is_visible ?? old('is_visible') ? 'checked' : '' }} name="is_visible" id="editIsVisible{{ $project->id }}">
													<label for="editIsVisible{{ $project->id }}">Publish this post</label>
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
			@include('admin._shared-components._display-alert')

			<div class="row masonryContainer">
				@foreach ($projects as $project)
					<div class="col-lg-4 item">
						<div class="card card-default">
							<div class="card-header ">

								<div class="row">
							<div class="col-lg-9">
								<input type="checkbox" name="checkbox[]" value="{{ $project->id }}" class="table_checkbox">&nbsp;
								
										<button class="btn dropdown-toggle text-center" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
										<div class="bg-white" >
										<div class="dropdown-menu" style="background: #ffffff !important;" >
											<a class="dropdown-item" href="{{ route('admin.projects.services.index', $project->id) }}">Add Services</a>

											<a class="dropdown-item" href="{{ route('admin.projects.images.index', $project->id) }}">Add Images</a>
											
											<a class="dropdown-item" href="{{ route('admin.projects.testimonials.index', $project->id) }}">Add Project Testimonials</a>

										</div>
									</div>
							</div>


								<div class="card-controls col-lg-3">
									 <ul>

										<li>
											<a class="card-refresh" href="#" data-toggle="modal" data-target="#editModal{{ $project->id }}"><i class="fa fa-pencil"></i></a>
										</li>
										<li>
											<a class="card-close" href="#" data-toggle="modal" data-target="#deleteModal{{ $project->id }}"><i class="fa fa-times"></i></a>
										</li>
									</ul> 
								</div>
									</div>
							</div>

							<div class="card-body">
								<a href="#" data-toggle="modal" data-target="#previewModal{{ $project->id }}"><img src="{{ $project->coverImage }}" style="max-width:100%;"></a>
							</div>
							
							<div class="col-lg-12 semi-bold text-capitalize card-title">{{ $project->title }}	</div>

						</div>
					</div>
				@endforeach

			</div>
		</div>

	</div>
@endsection
	
@section("javascript")
	<script src="{{ asset('js/masonry.pkgd.min.js') }}"></script>
	<script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('admin/assets/plugins/summernote/js/summernote.min.js') }}" type="text/javascript"></script>


	<script type="text/javascript">
		$(function(){

			var masonryContainer = $(".masonryContainer");

			masonryContainer.imagesLoaded(function(){
				masonryContainer.masonry({
					itemSelector:".item",
				});
			});

			//start of summernote
			$('.summernote').summernote({
                height : 100
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

	