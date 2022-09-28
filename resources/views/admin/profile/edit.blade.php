@extends('admin.layouts.master')

@section('content')

<div class="content">
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner" >
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
						<li class="breadcrumb-item bold active">Change Password</li>
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
				</div>
			</div>
		</div>
		<!-- End Container -->

	<div class="container-fluid container-fixed-lg ">
		<div class="row">
			<div class="col-lg-12 bg-white p-t-20 p-b-40">
				<form method="POST" role="form" action="{{ route('admin.settings.profile.change-password') }}">
					
					@include('admin._shared-components._display-alert')
					
					@csrf

					@method('PUT')

					<div class="form-group form-group-default required @error('old_password') has-error @enderror">
						<label>Old Password</label>
						<input type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required>
						@error('old_password')
							<span class="invalid-feedback" role="alert">
								{{ $message }}
							</span>
						@enderror
					</div>

					<div class="row">
						<div class="col-lg-6">						
							<div class="form-group form-group-default required @error('new_password') has-error @enderror">
								<label>New Password</label>
								<input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
								@error('new_password')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>
						</div>

						<div class="col-lg-6">						
							<div class="form-group form-group-default required @error('confirm_password') has-error @enderror">
								<label>Confirm New Password</label>
								<input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" required>
								@error('confirm_password')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>
						</div>
					</div>

					<div class="clearfix"></div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-warning pull-right">
							Change
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
