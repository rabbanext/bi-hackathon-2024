<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<div class="app-brand justify-content-center">
			<a href="/" class="app-brand-link gap-2">
				<span class="app-brand-logo demo">
					<img src="/img/favicon.png" alt="" height="40" style="filter: invert(var(--value, 25%))">
				</span>
				{{-- <span class="app-brand-text demo text-body fw-bolder">Bank Indonesia Hackathon 2025</span> --}}
			</a>
		</div>

		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1">
		<!-- Dashboard -->
		<li class="menu-item {{ Request::is('home') ? 'active' : '' }}">
			<a href="/home" class="menu-link">
				<i class="menu-icon tf-icons bx bx-home-circle"></i>
				<div data-i18n="Analytics">Dashboard</div>
			</a>
		</li>

		<!-- User -->
		@if (Auth::user()->type == "user")
		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">User</span>
		</li>
		<li class="menu-item {{ Request::is('profile') ? 'active' : '' }}">
			<a href="/profile" class="menu-link">
				<i class="menu-icon tf-icons bx bx-user-circle"></i>
				<div data-i18n="Analytics">My Profile</div>
			</a>
		</li>
		<li class="menu-item {{ Request::is('submit') ? 'active' : '' }}">
			<a href="/submit" class="menu-link">
				<i class="menu-icon tf-icons bx bx-copy"></i>
				<div data-i18n="Basic">Submit</div>
			</a>
		</li>
		@elseif (Auth::user()->type == "admin")
		<!-- Admin -->
		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Admin</span>
		</li>
		<li class="menu-item {{ Request::is('users') ? 'active' : '' }}">
			<a href="/users" class="menu-link">
				<i class="menu-icon tf-icons bx bx-user"></i>
				<div data-i18n="Basic">Users</div>
			</a>
		</li>
		<li class="menu-item {{ Request::is('projects') ? 'active' : '' }}">
			<a href="/projects" class="menu-link">
				<i class="menu-icon tf-icons bx bx-box"></i>
				<div data-i18n="Basic">User's Project Files</div>
			</a>
		</li>
		@elseif (Auth::user()->type == "super-admin")
		<!-- Super Admin -->
		<li class="menu-header small text-uppercase">
			<span class="menu-header-text">Super Admin</span>
		</li>
		<li class="menu-item {{ Request::is('admins') ? 'active' : '' }}">
			<a href="/admins" class="menu-link">
				<i class="menu-icon tf-icons bx bx-user"></i>
				<div data-i18n="Basic">Admins</div>
			</a>
		</li>
		@endif
		<!-- Support -->
		<li class="menu-header small text-uppercase"><span class="menu-header-text">Support</span></li>
		<li class="menu-item">
			<a href="#" target="_blank" class="menu-link">
				<i class="menu-icon tf-icons bx bx-support"></i>
				<div data-i18n="Support">Support</div>
			</a>
		</li>
	</ul>
</aside>