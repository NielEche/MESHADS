@extends('admin.layouts.master')

@section('content')

<div class="content">
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
						<li class="breadcrumb-item bold active">Categories</li>
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
						<button type="button" data-toggle="modal" data-target="#createModal" class="btn btn-default btn-sm m-r-10"><i class="pg-plus"></i>Add New Category</button>

						<button type="button" data-toggle="modal" data-target="#bulkDeleteModal" id="bulkDeleteBtn" class="btn btn-danger btn-sm hide"><i class="fa fa-ban"></i>&nbsp;Delete</button>
					</div>
				</div>


				{{-- Create New Modal --}}
					<div class="modal fade slide-down disable-scroll" id="createModal" tabindex="-1" role="dialog" aria-hidden="false">
						<div class="modal-dialog modal-lg">
							<div class="modal-content-wrapper">
								<div class="modal-content">
									<div class="modal-header clearfix text-left">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
										</button>
										<h5>Create New Category</h5>
									</div>
									<div class="modal-body">
										<form method="POST" role="form" action="{{ route('admin.categories.store') }}">

											@csrf
										
											<div class="form-group form-group-default required @error('name') has-error @enderror">
												<label>Category name</label>
												<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required>
												@error('name')
					                                <span class="invalid-feedback" role="alert">
					                                    {{ $message }}
					                                </span>
					                            @enderror
											</div>
												
											<div class="pull-left">
												<div class="checkbox check-success  ">
													<input type="checkbox" {{ old('is_enabled') ? 'checked' : '' }} name="is_enabled" id="checkbox-agree">
													<label for="checkbox-agree">Make this record visible on the website</label>
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


					{{-- Edit Modal --}}
			@foreach ($categories as $category)
					<div class="modal fade slide-down disable-scroll" id="editModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $category->id }}" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content-wrapper">
								<div class="modal-content">
									<div class="modal-header clearfix text-left">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
										</button>
										<h5 class="bold">Edit Category</h5>
									</div>
									<div class="modal-body">

										<form method="POST" role="form" action="{{ route('admin.categories.update', $category->id) }}">
											@csrf

											@method('PUT')
										
											<div class="form-group form-group-default required @error('name') has-error @enderror">
												<label>Category name</label>
												<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $category->name }}">
												@error('name')
						                            <span class="invalid-feedback" role="alert">
						                                {{ $message }}
						                            </span>
						                        @enderror
											</div>
												
											<div class="pull-left">
												<div class="checkbox check-success  ">
													<input type="checkbox" {{ $category->is_enabled ?? old('is_enabled') ? 'checked' : '' }} name="is_enabled" id="editCheckbox{{ $category->id }}">
													<label for="editCheckbox{{ $category->id }}">Make this record visible on the website</label>
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

				{{-- Begin Delete Header Modal --}}
					@foreach ($categories as $category)
						<div class="modal fade slide-down disable-scroll" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $category->id }}" aria-hidden="true">

							<div class="modal-dialog modal-sm">
 
								<div class="modal-content">
						<form id="mesh{{$category->id}}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" >
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

				{{-- Begin Bulk Delete Header Modal --}}
				@foreach ($categories as $category)
					<div class="modal fade slide-down disable-scroll" id="bulkDeleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">

						<div class="modal-dialog modal-sm">

							<div class="modal-content">
						<form id="mesh{{$category->id}}" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" >
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
								</form>
							</div>

						</div>

					</div>
					@endforeach
				{{-- End Bulk Delete Header Modal --}}


			</div>
			{{-- end row --}}
		</div>

	</div>
			{{-- end container --}}

			<div class=" container-fluid container-fixed-lg">
					@include('admin._shared-components._display-alert')

				<div class="row ">
					@foreach ($categories as $category)
					<div class="col-lg-4">
						<div class="card card-default">
							<div class="card-header ">
								<input type="checkbox" name="checkbox[]" value="{{ $category->id }}" class="table_checkbox">&nbsp;
								<div class="card-title">{{ $category->title }}	</div>
						<div class="card-controls">
							<ul>

								<li><a class="card-refresh" href="#" data-toggle="modal" data-target="#editModal{{ $category->id }}"><i class="fa fa-pencil"></i></a>
								</li>
								<li><a class="card-close" href="#" data-toggle="modal" data-target="#deleteModal{{ $category->id }}"><i class="fa fa-times"></i></a>
								</li>
								</ul>
						</div>
							</div>

							<div class="card-body">
								<h4> {{ $category->name }} </h4>
							</div>
						</div>
					</div>
					@endforeach



				</div>
			</div>



			{{-- end content --}}
	</div>		
@endsection


@section("javascript")	

	<script type="text/javascript">
		$(function(){

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
