@extends('admin.layouts.master')

@section('content')

<div class="content">
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
						<li class="breadcrumb-item bold active">Manage Clients</li>
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
						<button type="button" data-toggle="modal" data-target="#createModal" class="btn btn-default btn-sm m-r-10"><i class="pg-plus"></i>Add New Client</button>

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
									            <td>Client Image</td>
									            <td>240</td>
									            <td>80</td>
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
					@foreach ($clients as $client)
						<div class="modal fade fill-in" id="previewModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel{{ $client->id }}" aria-hidden="true">
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
													<h4><strong>{{ $client->website }}</strong></h4>
												</li>

												<li>
													<img src="{{ $client->logo }}" style="max-width:100%;">
												</li>

												@if(!empty($client->website))
													<li>
														<p>
															{{ $client->website }}
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
					@foreach ($clients as $client)
						<div class="modal fade slide-down disable-scroll" id="deleteModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $client->id }}" aria-hidden="true">

							<div class="modal-dialog modal-sm">
 
								<div class="modal-content">
						<form id="mesh{{$client->id}}" action="{{ route('admin.clients.destroy', $client->id) }}" method="POST" >
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
			@foreach ($clients as $client)
					<div class="modal fade slide-down disable-scroll" id="editModal{{ $client->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $client->id }}" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content-wrapper">
								<div class="modal-content">
									<div class="modal-header clearfix text-left">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i>
										</button>
										<h5 class="bold">Edit Client</h5>
									</div>
									<div class="modal-body">

						<form method="POST" role="form" action="{{ route('admin.clients.update', $client->id) }}" enctype="multipart/form-data">

							@csrf

							@method('PUT')							
								
							<div class="form-group form-group-default">
								<label>Client Website URL</label>
								<input type="text" class="form-control" name="website" value="{{ old('website') ?? $client->website }}">
							</div>

							<div class="form-group form-group-default @error('file') has-error @enderror">
								<label>Client's Logo</label>
								<input type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}">
								@error('file')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>

							<div class="pull-left">
								<div class="checkbox check-success  ">
									<input type="checkbox" {{ old('is_visible') ?? $client->is_visible ? 'checked' : '' }} name="is_visible" id="editCheckbox{{ $client->id }}">
									<label for="editCheckbox{{ $client->id }}">Make this record visible on the website</label>
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
										<h5>Create New Client</h5>
									</div>
									<div class="modal-body">

						<form method="POST" role="form" action="{{ route('admin.clients.store') }}" enctype="multipart/form-data">

							@csrf					
								
							<div class="form-group form-group-default">
								<label>Client Website</label>
								<input type="text" class="form-control" name="website" value="{{ old('website') }}">
							</div>

							<div class="form-group form-group-default required @error('file') has-error @enderror">
								<label>Client's Logo</label>
								<input type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}" required>
								@error('file')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>

							<div class="pull-left">
								<div class="checkbox check-success  ">
									<input type="checkbox" {{ old('is_visible') ? 'checked' : '' }} name="is_visible" id="checkbox-agree">
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



			</div>
			{{-- end row --}}
		</div>

	</div>
			{{-- end container --}}



			<div class=" container-fluid container-fixed-lg">
					@include('admin._shared-components._display-alert')
				<div class="row masonryContainer">
					@foreach ($clients as $client)
					<div class="col-lg-4 item">
						
						<div class="card card-default">
							<div class="card-header ">
								<input type="checkbox" name="checkbox[]" value="{{ $client->id }}" class="table_checkbox">&nbsp;
								<div class="card-title">{{ $client->website }}	</div>
						<div class="card-controls">
							<ul>

								<li><a class="card-refresh" href="#" data-toggle="modal" data-target="#editModal{{ $client->id }}"><i class="fa fa-pencil"></i></a>
								</li>
								<li><a class="card-close" href="#" data-toggle="modal" data-target="#deleteModal{{ $client->id }}"><i class="fa fa-times"></i></a>
								</li>
								</ul>
						</div>
							</div>

							<div class="card-body">
								<a href="#" data-toggle="modal" data-target="#previewModal{{ $client->id }}"><img src="{{ $client->logo }}" style="max-width:100%;"></a>
								<p class="semi-bold">{{ $client->job_title }} </p>
							</div>
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

	