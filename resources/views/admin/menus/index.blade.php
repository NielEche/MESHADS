@extends('admin.layouts.master')

@section('content')

<div class="content">
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
						<li class="breadcrumb-item bold active">Manage Menu Datagroups</li>
					</ol>
				</div>
			</div>
		</div>

		{{-- start container --}}
	<div class="container-fluid container-fixed-lg m-b-20">
		<div class="row">
			{{-- start row --}}
			<div class="col-md-12">
				<div class="panel panel-transparent">
					<div class="panel-body">
						<span class="p-l-10 p-r-10 p-b-10 p-t-10 m-r-10">
							<input type="checkbox" name="master_checkbox" id="master_checkbox">
						</span>
						<button type="button" data-toggle="modal" data-target="#createModal" class="btn btn-default btn-sm m-r-10"><i class="pg-plus"></i>Add New Menu</button>


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
					@foreach ($menus as $menu)
						<div class="modal fade slide-down disable-scroll" id="deleteModal{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $menu->id }}" aria-hidden="true">

							<div class="modal-dialog modal-sm">
 
								<div class="modal-content">
						<form id="mesh{{$menu->id}}" action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" >
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
												Are you sure you want to delete this item, you will lose all data asscotiated with this item.
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

					{{-- Edit Modal --}}
			@foreach ($menus as $menu)
					<div class="modal fade slide-down disable-scroll" id="editModal{{ $menu->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $menu->id }}" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content-wrapper">
								<div class="modal-content">
									<div class="modal-header clearfix text-left">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
										</button>
										<h5 class="bold">Edit Menu</h5>
									</div>
									<div class="modal-body">

						<form method="POST" role="form" action="{{ route('admin.menus.update', $menu->id) }}">

							@csrf

							@method('PUT')							
							
							<div class="form-group form-group-default @error('title') has-error @enderror">
								<label>Title</label>
								<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $menu->title ?? old('title') }}">
								@error('title')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>

							<div class="form-group form-group-default @error('url') has-error @enderror">
								<label>URL</label>
								<input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $menu->url ?? old('url') }}">
								@error('url')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>

							<div class="form-group form-group-default @error('position') has-error @enderror">
								<label>Position</label>
								<input type="number" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ $menu->position ?? old('position') }}">
								@error('position')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>

							<div class="pull-left">
								<div class="checkbox check-success  ">
									<input type="checkbox" {{ old('is_slave') ?? $menu->is_slave ? 'checked' : '' }} name="is_slave" id="isSlave{{ $menu->id }}">
									<label for="isSlave{{ $menu->id }}">This menu is a sub-menu</label>
								</div>
							</div>

							<br>

							<div class="pull-left">
								<div class="checkbox check-success  ">
									<input type="checkbox" {{ old('ext') ?? $menu->ext ? 'checked' : '' }} name="ext" id="extCheckbox{{ $menu->id }}">
									<label for="extCheckbox{{ $menu->id }}">Open a new page when menu is clicked</label>
								</div>
							</div>

							<br>

							<div class="pull-left">
								<div class="checkbox check-success  ">
									<input type="checkbox" {{ old('is_visible') ?? $menu->is_visible ? 'checked' : '' }} name="is_visible" id="isVisible{{ $menu->id }}">
									<label for="isVisible{{ $menu->id }}">Make this record visible on the website</label>
								</div>
							</div>

							<div class="clearfix"></div>
							<br>

							<button class="btn btn-primary" type="submit">Update</button>
						</form>

									</div>
								</div>
							</div>
						</div>
					</div>
			@endforeach
					{{-- End Edit Modal --}}



				{{-- Create New Modal --}}
					<div class="modal fade slide-down disable-scroll" id="createModal" tabindex="-1" role="dialog" aria-hidden="false">
						<div class="modal-dialog modal-lg">
							<div class="modal-content-wrapper">
								<div class="modal-content">
									<div class="modal-header clearfix text-left">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
										</button>
										<h5>Create New Menu</h5>
									</div>
									<div class="modal-body">

						<form method="POST" role="form" action="{{ route('admin.menus.store') }}">

							@csrf					
								
							<div class="form-group form-group-default @error('title') has-error @enderror">
								<label>Title</label>
								<input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{  old('title') }}">
								@error('title')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>

							<div class="form-group form-group-default @error('url') has-error @enderror">
								<label>URL</label>
								<input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}">
								@error('url')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>

							<div class="form-group form-group-default @error('position') has-error @enderror">
								<label>Position</label>
								<input type="number" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') }}">
								@error('position')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>

							<div class="pull-left">
								<div class="checkbox check-success  ">
									<input type="checkbox" {{ old('is_slave') ? 'checked' : '' }} name="is_slave" id="isSlave">
									<label for="isSlave">This menu is a sub-menu</label>
								</div>
							</div>

							<br>

							<div class="pull-left">
								<div class="checkbox check-success  ">
									<input type="checkbox" {{ old('ext') ? 'checked' : '' }} name="ext" id="extCheckbox">
									<label for="extCheckbox">Open a new page when menu is clicked</label>
								</div>
							</div>

							<br>

							<div class="pull-left">
								<div class="checkbox check-success  ">
									<input type="checkbox" {{ old('is_visible') ? 'checked' : '' }} name="is_visible" id="isVisible">
									<label for="isVisible">Make this record visible on the website</label>
								</div>
							</div>

							<div class="clearfix"></div>
							<br>

									<div class="modal-footer">
										<button type="submit" class="btn btn-warning pull-right">
											Save
										</button>
										<a href="#" class="btn btn-default pull-right m-r-10" data-dismiss="modal">
											Cancel
										</a>
									</div>
								</form>

									</div>
								</div>
							</div>
						</div>
					</div>
				{{-- End Create New Modal --}}



			</div>
			{{-- end row --}}
		</div>

	</div>
			{{-- end container --}}



			<div class=" container-fluid container-fixed-lg">
					@include('admin._shared-components._display-alert')
				<div class="row masonryContainer">
						<table id="myDataTable" class="table table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>
											<input type="checkbox" name="master_checkbox" id="master_checkbox">
										</th>
										<th>Title</th>
										<th>Slug</th>
										<th>URL</th>
										<th>External</th>
										<th>Position</th>
										<th></th>
										<th>&nbsp;</th>
									</tr>
								</thead>
			
								<tbody>
										@foreach($menus as $menu)
										<tr>
											<td>
												<input type="checkbox" name="checkbox[]" value="{{ $menu->id }}" class="table_checkbox">
											</td>
											<td> {{ $menu->title }} </td>
											<td> {{ $menu->slug }} </td>
											<td> {{ $menu->url }} </td>
											<td> {{ ($menu->ext == 1) ? 'Yes' : 'No' }}</td>
											<td> {{ $menu->position }} </td>
											<td> </td>
											<td>
													<button class="btn dropdown-toggle text-center" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</button>
													<div class="bg-white" >
													<div class="dropdown-menu" style="background: #ffffff !important;" >
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal{{ $menu->id }}"><i class="fa fa-pencil"></i> Edit</a>
														<a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteModal{{ $menu->id }}"><i class="fa fa-times"></i> Delete</a>			
													</div>
												</div>

											</td>
										</tr>
										@endforeach
								</tbody>
							</table>

							<div class="p-b-100 p-t-100"></div>
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
				else{

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

			
	@stop

	