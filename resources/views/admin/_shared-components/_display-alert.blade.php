<div> 
	@if ( session()->has('success_msg') )
		@include('admin._shared-components._partials._success-alert')
	@endif

	@if ( session()->has('error_msg') )
		@include('admin._shared-components._partials._error-alert')
	@endif

	@if ( session()->has('info_msg') )
		@include('admin._shared-components._partials._info-alert')
	@endif

	@if ( session()->has('warning_msg') )
		@include('admin._shared-components._partials._warning-alert')
	@endif

	@if ($errors->count() != 0)
		@include('admin._shared-components._partials._form-error')
	@endif
</div>
