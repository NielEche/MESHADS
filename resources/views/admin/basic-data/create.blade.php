@extends('admin.layouts.master')

@section('content')

<div class="content">
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner" >
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
						<li class="breadcrumb-item bold active">Manage Basic Data</li>
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
							{{-- <span class="p-l-10 p-r-10 p-b-10 p-t-10 m-r-10">
								<input type="checkbox" name="master_checkbox" id="master_checkbox">
							</span> 

							<a class="btn btn-default btn-sm m-r-10" href="#"><i class="pg-arrow_left"></i> Back to About Us</a> --}}

							<button type="button" data-toggle="modal" data-target="#sizeGuideModal" class="btn btn-complete btn-sm m-r-10">Size Guide</button>

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
									            <td>Home</td>
									            <td>1920</td>
									            <td>1080</td>
									        </tr>
											<tr>
									            <td>Other</td>
									            <td>1920</td>
									            <td>640</td>
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

				</div>
			</div>
		</div>
		<!-- End Container -->

	<div class="container-fluid container-fixed-lg ">
		<div class="row">
			<div class="col-lg-12 bg-white p-t-20 p-b-40">
				<form method="POST" role="form" action="{{ route('admin.settings.basic.store') }}" enctype="multipart/form-data">
					
					@include('admin._shared-components._display-alert')
					
					@csrf

					<div class="row">
						<div class="col-lg-6">						
							<div class="form-group form-group-default required @error('full_name') has-error @enderror">
								<label>Full Name</label>
								<input type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ $data->full_name ?? '' }}">
								@error('full_name')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>
						</div>

						<div class="col-lg-6">						
							<div class="form-group form-group-default @error('short_name') has-error @enderror">
								<label>Short Name</label>
								<input type="text" class="form-control @error('short_name') is-invalid @enderror" name="short_name" value="{{ $data->short_name ?? '' }}">
								@error('short_name')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<div class="form-group form-group-default @error('logo') has-error @enderror">
								<label>Logo</label>
								<input type="file" class="form-control @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}">
								@error('logo')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>
						</div>

						<div class="col-lg-6">						
							<div class="form-group form-group-default @error('logo_white') has-error @enderror">
								<label>Logo White</label>
								<input type="file" class="form-control @error('logo_white') is-invalid @enderror" name="logo_white" value="{{ old('logo_white') }}">
								@error('logo_white')
									<span class="invalid-feedback" role="alert">
										{{ $message }}
									</span>
								@enderror
							</div>
						</div>
					</div>

					<div class="form-group form-group-default @error('brochure') has-error @enderror">
						<label>Brochure</label>
						<input type="file" class="form-control @error('brochure') is-invalid @enderror" name="brochure" value="{{ old('brochure') }}">
						@error('brochure')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
						@enderror
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
			</div>
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
