@extends('dashboard.layouts.main')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="section-title pb-2 my-5">
            <p>Users</p>
        </div>

		<div class="section-content mb-3">
			<table class="table mb-0">
				<thead>
					<tr>
						<th>Statistic</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>User Registered</td>
						<td>{{ count($users) }}</td>
					</tr>
					<tr>
						<td>User with Email Verified</td>
						<td>{{ $users->whereNotNull('email_verified_at')->count() }}</td>
					</tr>
					<tr>
						<td>User with Email Not Verified</td>
						<td>{{ $users->whereNull('email_verified_at')->count() }}</td>
					</tr>
					<tr>
						<td>User with Project Uploaded</td>
						<td>{{ $users->whereNotNull('project_file')->count() }}</td>
					</tr>
					<tr>
						<td>User with Project Not Uploaded</td>
						<td>{{ $users->whereNull('project_file')->count() }}</td>
					</tr>
					<tr>
						<td>User Submitted</td>
						<td>{{ $users->where('submitted', '1')->count() }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="row mb-3">
			<div class="col-8">
				<div class="section-content h-100 mb-3">
					<h5>Filter</h5>
					<div class="row">
						<div class="col-12 mb-1">
							<p style="display: inline;">WhatsApp Verification: </p>
							<div class="btn-group" role="group" aria-label="WhatsApp Verification">
								<input type="radio" class="btn-check" name="otp-verified-filter" value="all" id="waVerified0" autocomplete="off" checked>
								<label class="btn btn-outline-info btn-sm" for="waVerified0">All</label>

								<input type="radio" class="btn-check" name="otp-verified-filter" value="verified" id="waVerified1" autocomplete="off">
								<label class="btn btn-outline-info btn-sm" for="waVerified1">Verified</label>

								<input type="radio" class="btn-check" name="otp-verified-filter" value="not-verified" id="waVerified2" autocomplete="off">
								<label class="btn btn-outline-info btn-sm" for="waVerified2">Not Verified</label>
							</div>
						</div>
						<div class="col-12 mb-1">
							<p style="display: inline;">Email Verification: </p>
							<div class="btn-group" role="group" aria-label="Email Verification">
								<input type="radio" class="btn-check" name="email-verified-filter" value="all" id="emailVerified0" autocomplete="off" checked>
								<label class="btn btn-outline-info btn-sm" for="emailVerified0">All</label>

								<input type="radio" class="btn-check" name="email-verified-filter" value="verified" id="emailVerified1" autocomplete="off">
								<label class="btn btn-outline-info btn-sm" for="emailVerified1">Verified</label>

								<input type="radio" class="btn-check" name="email-verified-filter" value="not-verified" id="emailVerified2" autocomplete="off">
								<label class="btn btn-outline-info btn-sm" for="emailVerified2">Not Verified</label>
							</div>
						</div>
						<div class="col-12 mb-1">
							<p style="display: inline;">Submission: </p>
							<div class="btn-group" role="group" aria-label="Project Status">
								<input type="radio" class="btn-check" name="submission-filter" value="all" id="submitted0" autocomplete="off" checked>
								<label class="btn btn-outline-info btn-sm" for="submitted0">All</label>

								<input type="radio" class="btn-check" name="submission-filter" value="submitted" id="submitted1" autocomplete="off">
								<label class="btn btn-outline-info btn-sm" for="submitted1">Submitted</label>

								<input type="radio" class="btn-check" name="submission-filter" value="not-submitted" id="submitted2" autocomplete="off">
								<label class="btn btn-outline-info btn-sm" for="submitted2">Not Submitted</label>
							</div>
						</div>
						<div class="col-12 mb-1">
							<p style="display: inline;">Project Status: </p>
							<div class="btn-group" role="group" aria-label="Project Status">
								<input type="radio" class="btn-check" name="project-file-filter" value="all" id="uploaded0" autocomplete="off" checked>
								<label class="btn btn-outline-info btn-sm" for="uploaded0">All</label>

								<input type="radio" class="btn-check" name="project-file-filter" value="uploaded" id="uploaded1" autocomplete="off">
								<label class="btn btn-outline-info btn-sm" for="uploaded1">Uploaded</label>

								<input type="radio" class="btn-check" name="project-file-filter" value="not-uploaded" id="uploaded2" autocomplete="off">
								<label class="btn btn-outline-info btn-sm" for="uploaded2">Not Uploaded</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="section-content h-100 mb-3">
					<h5>Export</h5>
					<div class="row">
						<div class="col">
							<p class="mb-0">Export to excel:</p>
							<form id="export-form" action="{{ route('export.users') }}" method="GET" style="display: none;">
								<input type="hidden" name="otp_verified">
								<input type="hidden" name="email_verified">
								<input type="hidden" name="submitted">
								<input type="hidden" name="project_file">
							</form>
							<button type="button" id="export-btn" class="btn btn-sm btn-info mb-1">Export Users</button>
							<!-- <a href="{{ route('export.users') }}" class="btn btn-sm btn-info mb-1">Export Users</a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section-content mb-3">
			<div class="table-responsive text-nowrap">
				<table id="users-table" class="table table-hover nowrap w-100">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Institution</th>
							<th>WhatsApp</th>
							<th>WA Verified</th>
							<th>Email</th>
							<th>Email Verified</th>
							<th>Project</th>
							<th>Submission</th>
							<th>Submission Time</th>
							<th>Details</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						@foreach ($users as $user)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td><strong>{{ $user->name }}</strong></td>
							<td>
								@if ($user->institution == null)
									-
								@else
									{{ $user->institution }}
								@endif
							</td>
							<td>
								@if ($user->nowa == null)
								-
								@else
									{{ str_pad($user->nowa, strlen($user->nowa) + 1, '0', STR_PAD_LEFT) }}
								@endif
							</td>
							<td>
								@if ($user->otp_verified_at == null)
									<span class="badge bg-secondary me-1">Unverified</span>
								@else
									<span class="badge bg-success me-1">Verified</span>
								@endif
							</td>
							<td>
								{{ $user->email }}
							</td>
							<td>
								@if ($user->email_verified_at == null)
									<span class="badge bg-secondary me-1">Unverified</span>
								@else
									<span class="badge bg-success me-1">Verified</span>
								@endif
							</td>
							<td>
								@if ($user->project_file == null)
									Not Uploaded
								@else
									Uploaded
								@endif
							</td>
							<td>
								@if ($user->submitted == null)
									Not Submitted
								@else
									Submitted
								@endif
							</td>
							<td>
								@if ($user->submitted == null)
									-
								@else
									{{ date('d-m-Y H:i:s', strtotime($user->updated_at)) }}
								@endif
							</td>
							<td>
								<a href="{{ $user->project_link }}" data-bs-toggle="modal" data-bs-target="#modal{{ $user->id }}" class="btn btn-info hide-arrow">
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
								<td>

								    <a href="{{ asset('/storage' . ($user->submitted === 1 ? '/submitted/' : '/save/') . $user->project_file) }}" target="_blank">
                                        {{ $user->project_file }}
                                    </a>
                                </td>
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
											<td>{{ date('d-m-Y', strtotime($memberDate_of_birth[$key])) }}</td>
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
					<div class="table-responsive mb-5">
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
					<p class="mb-0">Account registered at: {{ date('H:i:s d-m-Y', strtotime($user->created_at)) }}</p>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endforeach


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		const exportBtn = document.getElementById("export-btn");
		const exportForm = document.getElementById("export-form");

		if (exportBtn && exportForm) {
			exportBtn.addEventListener("click", function () {
				exportForm.querySelector("input[name='otp_verified']").value = document.querySelector("input[name='otp-verified-filter']:checked").value;
				exportForm.querySelector("input[name='email_verified']").value = document.querySelector("input[name='email-verified-filter']:checked").value;
				exportForm.querySelector("input[name='submitted']").value = document.querySelector("input[name='submission-filter']:checked").value;
				exportForm.querySelector("input[name='project_file']").value = document.querySelector("input[name='project-file-filter']:checked").value;
				exportForm.submit();
			});
		}
	});
</script>
<script>
    $(document).ready(function() {
		var table = $('#users-table').DataTable({
			scrollX: true
        });

		// Custom filter for project file
        $('input[name="submission-filter"]').on('change', function() {
            var value = $(this).val();
            table.columns(8).search(value === 'all' ? '' : (value === 'submitted' ? '^Submitted$' : '^Not Submitted$'), true, false).draw();
        });
		
        $('input[name="project-file-filter"]').on('change', function() {
            var value = $(this).val();
            table.columns(7).search(value === 'all' ? '' : (value === 'uploaded' ? '^Uploaded$' : '^Not Uploaded$'), true, false).draw();
        });

        // Custom filter for email verification
		$('input[name="email-verified-filter"]').on('change', function() {
			var value = $(this).val();
			if (value === 'all') {
				table.columns(6).search('').draw();
			} else if (value === 'verified') {
				table.column(6).search('\\bVerified\\b', true, false).draw();
			} else if (value === 'not-verified') {
				table.column(6).search('\\bUnverified\\b', true, false).draw();
			}
		});

        // Custom filter for whatsapp verification
		$('input[name="otp-verified-filter"]').on('change', function() {
			var value = $(this).val();
			if (value === 'all') {
				table.columns(4).search('').draw();
			} else if (value === 'verified') {
				table.column(4).search('\\bVerified\\b', true, false).draw();
			} else if (value === 'not-verified') {
				table.column(4).search('\\bUnverified\\b', true, false).draw();
			}
		});
    });
</script>