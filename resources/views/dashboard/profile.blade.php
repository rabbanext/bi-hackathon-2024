@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="card mb-4">
			<h5 class="card-header">Profile Details</h5>
			<!-- Account -->
			<div class="card-body">
				@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p class="mb-0">{{ $message }}</p>
				</div>
				@endif
				<form action="{{ route('profile.update',Auth::user()->id) }}" method="POST">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="mb-3 col-md-12">
							<label for="name" class="form-label">Name</label>
							<input class="form-control" type="text" id="name" name="name"
								value="{{ Auth::user()->name }}" placeholder="John Doel" autofocus required />
						</div>
						<div class="mb-3 col-md-6">
							<label for="email" class="form-label">E-mail</label>
							<input class="form-control" type="text" id="email" name="email"
								value="{{ Auth::user()->email }}" placeholder="john.doel@example.com" required
								readonly />
						</div>
						<div class="mb-3 col-md-6">
							<label class="form-label" for="nowa">Nomor WhatsApp</label>
							<div class="input-group input-group-merge">
								<span class="input-group-text">ID (+62)</span>
								<input type="text" id="nowa" name="nowa" class="form-control"
									value="{{ Auth::user()->nowa }}" placeholder="812 6404 6414" required />
							</div>
						</div>
					</div>
					<div class="mt-2">
						<button type="submit" class="btn btn-primary me-2">Save changes</button>
						<button type="reset" class="btn btn-outline-secondary">Reset</button>
					</div>
				</form>
			</div>
			<!-- /Account -->
		</div>
		<div class="card">
			<h5 class="card-header">Delete Account</h5>
			<div class="card-body">
				<div class="mb-3 col-12 mb-0">
					<div class="alert alert-warning">
						<h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
						<p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
					</div>
				</div>
				<form id="formAccountDeactivation" onsubmit="return false">
					<div class="form-check mb-3">
						<input class="form-check-input" type="checkbox" name="accountActivation"
							id="accountActivation" />
						<label class="form-check-label" for="accountActivation">I confirm my account
							deactivation</label>
					</div>
					<button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
				</form>
			</div>
		</div>
	</div>
	<!-- / Content -->

	<!-- Footer -->
	@include('dashboard.layouts.partials.footer')

	<div class="content-backdrop fade"></div>
</div>
@endsection