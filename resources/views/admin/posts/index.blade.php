@extends('admin.layouts.master')

@section('content')

<div class="content">
	<div class="jumbotron" data-pages="parallax">
		<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
			<div class="inner">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
					<li class="breadcrumb-item bold active">Manage News</li>
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
								<a href="{{ route('admin.posts.create') }}" class="btn btn-default btn-sm m-r-10"><i class="pg-plus"></i>Add New Post</a>

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

					
				{{-- Begin Preview Header Modal --}}
				@foreach ($posts as $post)
				<div class="modal fade fill-in" id="previewModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="previewModalLabel{{ $post->id }}" aria-hidden="true">
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
											<h4 class="text-capitalize"><strong>{{ $post->title }}</strong></h4>
										</li>

										<li>
											<img src="{{ $post->image_name }}" style="max-width:100%;">
										</li>

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
					@foreach ($posts as $post)
						<div class="modal fade slide-down disable-scroll" id="deleteModal{{ $post->id }}" tabindex="-1" role="dialog" 
							aria-labelledby="deleteModalLabel{{ $post->id }}" aria-hidden="true">

							<div class="modal-dialog modal-sm">
 
								<div class="modal-content">
									<form id="mesh{{$post->id}}" action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" >
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
		
		
					</div>
					{{-- end row --}}
				</div>
		
			</div>
					{{-- end container --}}

					<div class=" container-fluid container-fixed-lg">
						@include('admin._shared-components._display-alert')
	
					<div class="row masonryContainer">
						@foreach ($posts as $post)
						<div class="col-lg-4 item">
							<div class="card card-default">
								<div class="card-header ">
									<input type="checkbox" name="checkbox[]" value="{{ $post->id }}" class="table_checkbox">&nbsp;
									<div class="card-title">{{ $post->title }}	</div>
							<div class="card-controls">
								<ul>
	
									<li><a class="card-refresh" href="{{ route('admin.posts.edit', $post->id) }}" ><i class="fa fa-pencil"></i></a>
									</li>
									<li><a class="card-close" href="#" data-toggle="modal" data-target="#deleteModal{{ $post->id }}"><i class="fa fa-times"></i></a>
									</li>
									</ul>
							</div>
								</div>
	
								<div class="card-body">

									<a href="#" data-toggle="modal" data-target="#previewModal{{ $post->id }}">
										<img src="{{ $post->image_name }}" style="max-width:100%;"></a>
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
