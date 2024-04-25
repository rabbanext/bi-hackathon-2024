@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
	<!-- Content -->

	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="card">
			<h5 class="card-header">Projects</h5>
			<div class="table-responsive text-nowrap">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>no.</th>
							<th>Team Name</th>
							<th>Link</th>
							<th>Description</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						@foreach ($projects as $project)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>
								<strong>{{ $project->team_name }}</strong>
							</td>
							<td><a href="{{ $project->project_link }}">{{ $project->project_link }}</a></td>
							<td>{{ $project->project_desc }}</td>
							<td>
								<a href="{{ $project->project_link }}" class="btn btn-info hide-arrow">
									<i class="bx bx-link"></i> Buka Link
								</a>
							</td>
						</tr>
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