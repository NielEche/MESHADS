@extends('admin.layouts.master')

@section('content')

<div class="content">
		<div class="jumbotron" data-pages="parallax">
			<div class=" container-fluid   container-fixed-lg sm-p-l-0 sm-p-r-0">
				<div class="inner">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="pg-home"></i></a></li>
						<li class="breadcrumb-item bold active">Manage About Us</li>
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
						<a href="{{ route('admin.company.create') }}" class="btn btn-default btn-sm m-r-10"><i class="pg-plus"></i>Manage About Us</a>

						<button type="button" data-toggle="modal" data-target="#bulkDeleteModal" id="bulkDeleteBtn" class="btn btn-danger btn-sm hide"><i class="fa fa-ban"></i>&nbsp;Delete</button>
					</div>
				</div>





			</div>
			{{-- end row --}}
		</div>

	</div>
			{{-- end container --}}



		{{-- start of content --}}
			<div class=" container-fluid container-fixed-lg">
					@include('admin._shared-components._display-alert')

				<div class="row ">
					
					<div class="col-lg-4">
						<div class="card card-default">
							<div class="card-header ">
								<input type="checkbox" name="checkbox[]" value="" class="table_checkbox">&nbsp;
								<div class="card-title">	</div>
						<div class="card-controls">
							{{-- <ul>

								<li><a class="card-refresh" href="#" data-toggle="modal" data-target="#editModal"><i class="fa fa-pencil"></i></a>
								</li>
								<li><a class="card-close" href="#" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-times"></i></a>
								</li>
							</ul> --}}
						</div>
							</div>

							<div class="card-body">
								<h4> About Us </h4>
							</div>
						</div>
					</div>


				</div>
			</div>











</div>
		
@endsection
