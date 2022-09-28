@extends('admin.layouts.master')

@section('content')

<div class="content">
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner" >
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
						<li class="breadcrumb-item bold active">Manage Contact Page</li>
					</ol>
				</div>
			</div>
		</div>

		<!-- start Container -->
		<div class=" container-fluid m-b-20  container-fixed-lg">
			<div class="row">
				<div class="col-md-12">
					{{-- <div class="panel panel-transparent">
						<div class="panel-body">
							
							<button type="button" data-toggle="modal" data-target="#sizeGuideModal" class="btn btn-complete btn-sm m-r-10">Size Guide</button>

						</div>
					</div> --}}
					

					{{-- Begin Size Guide Modal --}}
					{{-- <div class="modal fade slide-down disable-scroll" id="sizeGuideModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">

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

					</div> --}}
					{{-- End Size Guide Modal --}}

				</div>
			</div>
		</div>
		<!-- End Container -->

	<div class="container-fluid container-fixed-lg ">
		<div class="row">
			<div class="col-lg-12 bg-white p-t-20 p-b-40">
				<form method="POST" role="form" action="{{ route('admin.contact.store') }}">
					
					@include('admin._shared-components._display-alert')
					
					@csrf
					
					<div class="form-group form-group-default @error('brief') has-error @enderror">
						<label>Top Header Text</label>
						<textarea class="form-control @error('brief') is-invalid @enderror" name="brief" style="height:150px;">{{ $contact->brief ?? '' }}</textarea>
						@error('brief')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
						@enderror
					</div>

					<div class="form-group form-group-default @error('header') has-error @enderror">
						<label>Bottom Header text</label>
						<textarea class="form-control @error('header') is-invalid @enderror" name="header" style="height:150px;">{{ $contact->header ?? '' }}</textarea>
						@error('header')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
						@enderror
					</div>

					<div class="form-group form-group-default @error('address') has-error @enderror">
						<label>Address</label>
						<input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $contact->address ?? '' }}">
						@error('address')
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

			// start of summernote
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

	