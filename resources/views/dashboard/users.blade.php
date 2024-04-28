@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
		<div class="section-title pb-2 my-5">
          <h2>Users</h2>
          <p>Users</p>
        </div>
        <div class="section-content mb-3">
			<div class="table-responsive text-nowrap">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>no.</th>
							<th>Name</th>
							<th>Email</th>
							<th></th>
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
								@if ($user->team_name == null)
								Project Not Submitted
								@else
								Project Submitted
								@endif
							</td>
							<td>
								<a href="{{ $user->project_link }}" data-bs-toggle="modal" data-bs-target="#modal{{ $user->id }}" class="btn btn-primary hide-arrow">
									<i class="bx bx-info-circle"></i> Details
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
@foreach ($users as $user)
<div class="modal fade text-black" id="modal{{ $user->id }}" tabindex="-1" aria-labelledby="modal{{ $user->id }}" aria-hidden="true">
	<div class="modal-dialog modal-lg"> <!-- Adjust modal size as needed -->
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="modal{{ $user->id }}">User Detail</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th>Name</th>
								<td>{{ $user->name }}</td>
							</tr>
							<tr>
								<th>Email</th>
								<td>{{ $user->email }}</td>
							</tr>
							<tr>
								<th>WhatsApp Number</th>
								<td>{{ $user->nowa }}</td>
							</tr>
							<tr>
								<th>Team Name</th>
								<td>{{ $user->team_name }}</td>
							</tr>
							<tr>
								<th>Institution</th>
								<td>{{ $user->institution }}</td>
							</tr>
							<tr>
								<th>Project File</th>
								<td>{{ $user->project_file }}</td>
							</tr>
						</tbody>
					</table>
					<h5>Members:</h5>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Name</th>
									<th>Role</th>
									<th>Domicile</th>
									<th>Email</th>
									<th>Date of Birth</th>
									<th>Profession</th>
									<th>GitHub URL</th>
									<th>LinkedIn URL</th>
								</tr>
							</thead>
							<tbody>
								@php
									$memberNames = json_decode($user->member_name);
									$memberRoles = json_decode($user->member_role);
									$memberDomiciles = json_decode($user->member_domicile);
									$memberEmail = json_decode($user->member_email);
									$memberDate_of_birth = json_decode($user->member_date_of_birth);
									$memberProfession = json_decode($user->member_profession);
									$memberGithub_url = json_decode($user->member_github_url);
									$memberLinkedin_url = json_decode($user->member_linkedin_url);
								@endphp
								@if(is_array($memberNames) && is_array($memberRoles) && is_array($memberDomiciles))
									@foreach ($memberNames as $key => $name)
										<tr>
											<td>{{ $name }}</td>
											<td>{{ $memberRoles[$key] }}</td>
											<td>{{ $memberDomiciles[$key] }}</td>
											<td>{{ $memberEmail[$key] }}</td>
											<td>{{ $memberDate_of_birth[$key] }}</td>
											<td>{{ $memberProfession[$key] }}</td>
											<td>{{ $memberGithub_url[$key] }}</td>
											<td>{{ $memberLinkedin_url[$key] }}</td>
										</tr>
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
					<h5>Links:</h5>
					<div class="table-responsive">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Project Link</th>
									<th>Project Description</th>
								</tr>
							</thead>
							<tbody>
								@php
									$projectLinks = json_decode($user->project_link);
									$projectDescs = json_decode($user->project_desc);
								@endphp
								@if(is_array($projectLinks) && is_array($projectDescs))
									@foreach ($projectLinks as $key => $link)
										<tr>
											<td>{{ $link }}</td>
											<td>{{ $projectDescs[$key] }}</td>
										</tr>
									@endforeach
								@endif
							</tbody>
						</table>
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