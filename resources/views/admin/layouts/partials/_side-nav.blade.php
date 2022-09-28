		<nav class="page-sidebar" data-pages="sidebar">


	<div class="sidebar-overlay-slide from-top" id="appMenu">
		<div class="row">
			<div class="col-xs-6 no-padding">
				<a href="#" class="p-l-40"><img src="{{ asset('admin/assets/img/demo/social_app.svg') }}" alt="socail">
				</a>
			</div>
			<div class="col-xs-6 no-padding">
				<a href="#" class="p-l-10"><img src="{{ asset('admin/assets/img/demo/email_app.svg') }}" alt="socail">
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 m-t-20 no-padding">
				<a href="#" class="p-l-40"><img src="{{ asset('admin/assets/img/demo/calendar_app.svg') }}" alt="socail">
				</a>
			</div>
			<div class="col-xs-6 m-t-20 no-padding">
				<a href="#" class="p-l-10"><img src="{{ asset('admin/assets/img/demo/add_more.svg') }}" alt="socail">
				</a>
			</div>
		</div>
	</div>

	<div class="sidebar-header">
		<img src="{{ asset('admin/assets/img/logo_white.png') }}" alt="logo" class="brand" data-src="{{ asset('admin/assets/img/logo_white.png') }}" data-src-retina="{{ asset('admin/assets/img/logo_white_2x.png') }}" width="78" height="22">
		<div class="sidebar-header-controls">
			<button type="button" class="btn btn-xs sidebar-slide-toggle btn-link m-l-20" data-pages-toggle="#appMenu"><i class="fa fa-angle-down fs-16"></i>
			</button>
			<button type="button" class="btn btn-link d-lg-inline-block d-xlg-inline-block d-md-inline-block d-sm-none d-none" data-toggle-pin="sidebar"><i class="fa fs-12"></i>
			</button>
		</div>
	</div>

			<div class="sidebar-menu">
				<ul class="menu-items">
					<li class="m-t-30 ">
						<a href="{{ route('admin.dashboard') }}" class="detailed">
							<span class="title">Dashboard</span>
						</a>
						<span class="bg-success icon-thumbnail"><i class="pg-home"></i></span>
					</li>

					<!-- Data -->
					<li class="{{ request()->is('backend/data*') ? 'open active' : '' }}">
						<a href="javascript:;"><span class="title">Data</span>
						<span class=" arrow"></span></a>
						<span class="icon-thumbnail"><i class="pg-layouts2"></i></span>
						<ul class="sub-menu">
							<li class="">
								<a href="{{ route('admin.menus.index') }}">Data Groups</a>
								<span class="icon-thumbnail">Dg</span>
							</li>
							<li class="">
								<a href="{{ route('admin.sliders.index') }}">Homepage Slider</a>
								<span class="icon-thumbnail">Hs</span>
							</li>
							<li class="">
								<a href="{{ route('admin.breadcrumbs.index') }}">BreadCrumb</a>
								<span class="icon-thumbnail">Br</span>
							</li>

							<li class="">
								<a href="{{ route('admin.contentdata.index') }}">Content Data</a>
								<span class="icon-thumbnail">Cd</span>
							</li>

						</ul>
					</li>

					<!-- Portfolio -->
					<li class="{{ request()->is('backend/projects*') ? 'open active' : '' }}">
						<a href="javascript:;"><span class="title">Portfolio</span>
						<span class=" arrow {{ request()->is('backend/projects*') ? 'open' : '' }}"></span></a>
						<span class="icon-thumbnail"><i class="pg-layouts2"></i></span>
						<ul class="sub-menu">
							<li class="">
								<a href="{{ route('admin.projects.index') }}">Manage Portfolio</a>
								<span class="icon-thumbnail">Lp</span>
							</li>
							<li class="">
								<a href="{{ route('admin.categories.index') }}">Project Categories</a>
								<span class="icon-thumbnail">Ca</span>
							</li>
						</ul>
					</li>
					<!-- News -->
					<li  class="{{ request()->is('backend/blog*') ? 'open active' : '' }}">
						<a href="javascript:;">
							<span class="title">News</span>
							<span class=" arrow {{ request()->is('backend/blog*') ? 'open' : '' }}"></span>
						</a>
						<span class="icon-thumbnail"><i class="pg-layouts2"></i></span>
						<ul class="sub-menu">
							<li class="">
								<a href="{{ route('admin.posts.index') }}">Manage News</a>
								<span class="icon-thumbnail">Mn</span>
							</li>

						</ul>
					</li>
					<!-- About Us -->

					<li class="{{ request()->is('backend/about*') ? 'open active' : '' }}">
						<a href="javascript:;"><span class="title">About Us</span>
						<span class=" arrow {{ request()->is('backend/about*') ? 'open' : '' }}"></span></a>
						<span class="icon-thumbnail"><i class="pg-tables"></i></span>
						<ul class="sub-menu">
							<li class="">
								<a href="{{ route('admin.company.index') }}">Content</a>
								<span class="icon-thumbnail">Ct</span>
							</li>
							<li class="">
								<a href="{{ route('admin.clients.index') }}">Clients</a>
								<span class="icon-thumbnail">Cl</span>
							</li>
							<li class="">
								<a href="{{ route('admin.teams.index') }}">Team</a>
								<span class="icon-thumbnail">Tm</span>
							</li>
						</ul>
					</li>
					<!-- settings -->
					<li class="{{ request()->is('backend/settings*') ? 'open active' : '' }}">
						<a href="javascript:;"><span class="title">Settings</span>
						<span class="arrow {{ request()->is('backend/settings*') ? 'open' : '' }}"></span></a>
						<span class="icon-thumbnail"><i class="pg-settings"></i></span>
						<ul class="sub-menu">
							<li class="">
								<a href="{{ route('admin.settings.basic.store') }}">Basic Data</a>
								<span class="icon-thumbnail">Bd</span>
							</li>
							<li class="">
								<a href="{{ route('admin.users.index') }}">Users</a>
								<span class="icon-thumbnail">Us</span>
							</li>
							<li class="">
								<a href="{{ route('admin.settings.profile.edit') }}">Change Password</a>
								<span class="icon-thumbnail">Cp</span>
							</li>

						</ul>
					</li>

					<!-- News -->
					<li class="">
							<a href="{{ route('admin.shop.index') }}"><span class="title">Shop</span></a>
							<span class="icon-thumbnail"><i class="pg-layouts"></i></span>
					</li>

					<!-- contact us -->
					<li class="">
						<a href="{{ route('admin.contact.create') }}"><span class="title">Contact Us</span></a>
						<span class="icon-thumbnail"><i class="pg-layouts"></i></span>
					</li>

				</ul>
				<div class="clearfix"></div>
			</div>
		</nav>