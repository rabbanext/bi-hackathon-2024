@extends('dashboard.layouts.main')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="section-title pb-2 my-5">
            <h2>Users</h2>
            <p>Users</p>
        </div>

		<div class="section-content mb-3">
			<table class="table">
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
						<td>User with Project Submitted</td>
						<td>{{ $users->whereNotNull('project_file')->count() }}</td>
					</tr>
					<tr>
						<td>User with Project Not Submitted</td>
						<td>{{ $users->whereNull('project_file')->count() }}</td>
					</tr>
				</tbody>
			</table>
		</div>
		
        <div class="section-content mb-3">
			<h5>Filter</h5>
			<div class="row mb-3">
				<div class="col-6 mb-3">
					<p style="display: inline;">Email Verification: </p>
					<div class="btn-group" role="group" aria-label="Email Verification">
						<input type="radio" class="btn-check" name="email-verified-filter" value="all" id="verified0" autocomplete="off" checked>
						<label class="btn btn-outline-info btn-sm" for="verified0">All</label>

						<input type="radio" class="btn-check" name="email-verified-filter" value="verified" id="verified1" autocomplete="off">
						<label class="btn btn-outline-info btn-sm" for="verified1">Verified</label>

						<input type="radio" class="btn-check" name="email-verified-filter" value="not-verified" id="verified2" autocomplete="off">
						<label class="btn btn-outline-info btn-sm" for="verified2">Not Verified</label>
					</div>
				</div>
				<div class="col-6 mb-3 text-end">
					<p style="display: inline;">Project Status: </p>
					<div class="btn-group" role="group" aria-label="Project Status">
						<input type="radio" class="btn-check" name="project-file-filter" value="all" id="submitted0" autocomplete="off" checked>
						<label class="btn btn-outline-info btn-sm" for="submitted0">All</label>

						<input type="radio" class="btn-check" name="project-file-filter" value="submitted" id="submitted1" autocomplete="off">
						<label class="btn btn-outline-info btn-sm" for="submitted1">Submitted</label>

						<input type="radio" class="btn-check" name="project-file-filter" value="not-submitted" id="submitted2" autocomplete="off">
						<label class="btn btn-outline-info btn-sm" for="submitted2">Not Submitted</label>
					</div>
				</div>
			</div>
			<h5>Export</h5>
			<!--<a href="{{ route('export') }}" class="btn btn-success">Export Users</a>-->
            <div class="table-responsive text-nowrap">
				<table id="users-table" class="table table-hover w-100">
					<thead>
						<tr>
							<th>no.</th>
							<th>Name</th>
							<th>Institution</th>
							<th>WhatsApp</th>
							<th>Email</th>
							<th>Project</th>
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
    								@if ($user->otp_verified_at == null)
    								<span class="badge bg-secondary me-1">Unverified</span>
    								@else
    								<span class="badge bg-success me-1">Verified</span>
    								@endif
								@endif
							</td>
							<td>
								{{ $user->email }}
								@if ($user->email_verified_at == null)
								<span class="badge bg-secondary me-1">Unverified</span>
								@else
								<span class="badge bg-success me-1">Verified</span>
								@endif
							</td>
							<td>
								@if ($user->project_file == null)
								Not Submitted
								@else
								Submitted
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
								    <a href="{{ asset('/storage/' . $user->project_file) }}">
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

<script>
    $(document).ready(function() {
        
    });
</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<!-- Export to excel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<!-- Export to pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script>
    $(document).ready(function() {
		var table = $('#users-table').DataTable({
            layout: {
                topStart: {
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Export to Excel',
                            className: 'bg-info',
                            filename: 'users_registered',
                            title: 'Hackathon Bank Indonesia 2024 - Users Registered',
                            exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                            },
                        },
                        {
                            extend: 'pdf',
                            text: 'Export to PDF',
                            className: 'bg-info',
                            filename: 'users_registered',
                            title: 'Hackathon Bank Indonesia 2024 - Users Registered',
                            exportOptions: {
                                    columns: [0, 1, 2, 3, 4]
                            },
                        },
                    ]
                }
            }
        });

		// Custom filter for project file
        $('input[name="project-file-filter"]').on('change', function() {
            var value = $(this).val();
            table.columns(5).search(value === 'all' ? '' : (value === 'submitted' ? '^Submitted$' : '^Not Submitted$'), true, false).draw();
        });

        // Custom filter for email verification
		$('input[name="email-verified-filter"]').on('change', function() {
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