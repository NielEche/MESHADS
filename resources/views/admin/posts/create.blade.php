@extends('admin.layouts.master')

@section('css_plugin')
<link href="{{ asset('admin/assets/plugins/summernote/css/summernote.css') }}" rel="stylesheet" type="text/css" media="screen">
<link href="{{ asset('admin/assets/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" media="screen">
@endsection

@section('content')

<div class="content">

	<div class="jumbotron" data-pages="parallax">
		<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
			<div class="inner">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
					<li class="breadcrumb-item bold"><a href="{{ route('admin.posts.index') }}">View all Posts </a></li>
					<li class="breadcrumb-item bold active">create post</li>
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
							<a class="btn btn-default btn-sm m-r-10" href="{{ route('admin.posts.index') }}"><i class="pg-arrow_left"></i> Back to Posts</a>

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
					{{-- end row --}}
				</div>
		
			</div>
					{{-- end container --}}

	<div class=" container-fluid container-fixed-lg bg-white p-b-20">

		<div class="row">
			<div class="col-lg-12">
				<div class="card card-transparent">

					<div class="card-body">
						<form method="POST" role="form" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">

							@include('admin._shared-components._display-alert')

							@csrf

							<div class="form-group required form-group-default @error('title') has-error @enderror">
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

							<div class="summernote-wrapper m-t-20 @error('content') has-error @enderror">
								<span style="text-transform: uppercase;">Top Content <span class="text-danger" style="font-size: 17px;">*</span></span> <br>
								<textarea name="top_content" class="summernote form-control @error('top_content') is-invalid @enderror" rows="19">{{ old('top_content') }}</textarea>
							</div>
							@error('top_content')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror

							<div class="clearfix"></div>
							<br>

							
							<div class="form-group form-group-default">
								<label>Quote</label>
								<textarea class="form-control" name="quote" rows="10" style="height:100px;">{{ old('quote') }}</textarea>
							</div>
								
							<div class="form-group form-group-default">
								<label>Quote Author</label>
								<input type="text" class="form-control" name="quote_author" value="{{ old('quote_author') }}">
							</div>

							
							<div class="summernote-wrapper m-t-20 @error('content') has-error @enderror">
								<span style="text-transform: uppercase;">Middle Content <span class="text-danger" style="font-size: 17px;">*</span></span> <br>
								<textarea name="middle_content" class="summernote form-control @error('middle_content') is-invalid @enderror" rows="19">{{ old('middle_content') }}</textarea>
							</div>
							@error('middle_content')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
							@enderror
							<br>
							
							<div class="form-group form-group-default @error('file') has-error @enderror">
								<label>Cover Image</label>
								<input type="file" class="form-control @error('file') is-invalid @enderror" name="file" value="{{ old('file') }}">
								@error('file')
	                                <span class="invalid-feedback" role="alert">
	                                    {{ $message }}
	                                </span>
	                            @enderror
							</div>

							
							<div class="summernote-wrapper m-t-20 @error('content') has-error @enderror">
								<span style="text-transform: uppercase;">Bottom Content <span class="text-danger" style="font-size: 17px;">*</span></span> <br>
								<textarea name="bottom_content" class="summernote form-control @error('bottom_content') is-invalid @enderror" rows="19">{{ old('bottom_content') }}</textarea>
							</div>
							@error('bottom_content')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
							@enderror
								<br>
														
							<div class="form-group form-group-default">
								<label>Video Url</label>
								<input type="text" class="form-control" name="video_url" value="{{ old('video_url') }}">
							</div>

							<div class="pull-left">
								<div class="checkbox check-success  ">
									<input type="checkbox" {{ old('is_published') ? 'checked' : '' }} name="is_published" id="checkbox-agree">
									<label for="checkbox-agree">Publish this post now on the website</label>
								</div>
							</div>

							<div class="clearfix"></div>
							<br>

							<button class="btn btn-primary" type="submit">Submit</button>
						</form>
					</div>
				</div>

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

	