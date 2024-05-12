@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="card">
			<h5 class="card-header">Admins</h5>
			<div class="table-responsive text-nowrap">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>no.</th>
							<th>Name</th>
							<th>Email</th>
							<!-- <th>Actions</th> -->
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						@foreach ($admins as $admin)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td><strong>{{ $admin->name }}</strong></td>
							<td>{{ $admin->email }}</td>
							<!-- <td>
								<div class="dropdown">
									<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
										<i class="bx bx-dots-vertical-rounded"></i>
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
										Edit</a>
										<a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
										Delete</a>
									</div>
								</div>
							</td> -->
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- / Content -->

	<div class="content-backdrop fade"></div>
</div>
@endsection