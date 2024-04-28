@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="section-title pb-2 my-5">
          <h2>Profile</h2>
          <p>Profile</p>
        </div>
		<div class="section-content mb-4">
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
						<div class="col-12">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="Name" aria-describedby="floatingInputLink" required />
                                <label for="name">Name</label>
                            </div>
                        </div>
						<div class="mb-3 col-md-6">
							<div class="form-floating mb-3">
								<input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email"
									value="{{ Auth::user()->email }}" placeholder="john.doel@example.com" autocomplete="email" required readonly>
								<label for="floatingEmail">Email</label>
								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="mb-3 col-md-6">
							<div class="input-group mb-3">
								<span class="input-group-text">+62</span>
								<div class="form-floating flex-grow-1">
									<input type="tel" class="form-control @error('nowa') is-invalid @enderror" id="floatingInputGroup1" name="nowa" placeholder="WhatsApp Number" value="{{ Auth::user()->nowa }}" inputmode="numeric" pattern="[0-9]*" required>
									<label for="floatingInputGroup1">WhatsApp Number</label>
									@error('nowa')
									@if($message == 'The nowa has already been taken.')
									<div class="invalid-feedback" role="alert">
										<strong>The WhatsApp Number has already been taken.</strong>
									</div>
									@else
									<div class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</div>
									@endif
									@enderror
								</div>
							</div>
						</div>
					</div>
					<div class="mt-2">
						<button type="submit" class="btn btn-primary me-2">Save changes</button>
					</div>
				</form>
			</div>
			<!-- /Account -->
		</div>
		<!-- <div class="card">
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
		</div> -->
	</div>
	<!-- / Content -->

	<!-- Footer -->
	@include('dashboard.layouts.partials.footer')

	<div class="content-backdrop fade"></div>
</div>
@endsection