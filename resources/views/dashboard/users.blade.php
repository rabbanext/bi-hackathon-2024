@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="card">
			<h5 class="card-header">Users</h5>
			<div class="table-responsive text-nowrap">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>no.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Details</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						@foreach ($users as $user)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td><strong>{{ $user->name }}</strong>
							<td>{{ $user->email }}
								@if ($user->email_verified_at == null)
								<span class="badge bg-label-danger me-1">Not Verified</span>
								@else
								<span class="badge bg-label-success me-1">Verified</span>
								@endif
							</td>
							<td>
								<a href="{{ $user->project_link }}" data-bs-toggle="modal" data-bs-target="#modal{{ $user->id }}" class="btn btn-primary hide-arrow">
									<i class="bx bx-info-circle"></i> Details
								</a>
							</td>
						</tr>
						<div class="modal fade" id="modal{{ $user->id }}" tabindex="-1" aria-labelledby="modal{{ $user->id }}" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="modal{{ $user->id }}">User Detail</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<div class="mb-2 row">
											<label for="detailNama" class="col-sm-2 col-form-label">Nama</label>
											<div class="col-sm-10">
												<input type="text" readonly class="form-control-plaintext" id="detailNama" value="{{ $user->name }}">
											</div>
										</div>
										<div class="mb-2 row">
											<label for="detailEmail" class="col-sm-2 col-form-label">Email</label>
											<div class="col-sm-10">
												<input type="text" readonly class="form-control-plaintext" id="detailEmail" value="{{ $user->email }}">
												@if ($user->email_verified_at == null)
												<span class="badge bg-label-danger me-1">Not Verified</span>
												@else
												<span class="badge bg-label-success me-1">Verified</span>
												@endif
											</div>
										</div>
										@if ($user->nowa == null)
										@else
										<div class="mb-2 row">
											<label for="detailNowa" class="col-sm-2 col-form-label">No. WA</label>
											<div class="col-sm-10">
												<input type="text" readonly class="form-control-plaintext" id="detailNowa" value="{{ $user->nowa }}">
											</div>
										</div>
										@endif
										<div class="mb-2 row">
											<div class="col-sm-10">
												<p class="m-0">Account created at: <strong>{{ $user->created_at }}</strong></p>
												@if ($user->email_verified_at == null)
												<p class="m-0">Account not verified</p>
												@else
												<p class="m-0">Account verified at: <strong>{{ $user->email_verified_at }}</strong></p>
												@endif
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<!-- / Content -->

	<!-- Footer -->
	@include('dashboard.layouts.partials.footer')

	<div class="content-backdrop fade"></div>
</div>
@endsection