@extends('dashboard.layouts.main')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="section-title pb-2 my-5">
            <h2>Users</h2>
            <p>WhatsApp Responses</p>
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
                        <td>User Responded</td>
                        <td>{{ $users->whereNotNull('wa_response')->count() }}</td>
                    </tr>
                    <tr>
                        <td>User Not Responded</td>
                        <td>{{ $users->whereNull('wa_response')->count() }}</td>
                    </tr>
                    <tr>
                        <td>User Responded with Yes</td>
                        <td>{{ $users->where('wa_response', 'yes')->count() }}</td>
                    </tr>
                    <tr>
                        <td>User Responded with No</td>
                        <td>{{ $users->where('wa_response', 'no')->count() }}</td>
                    </tr>
                </tbody>
			</table>
		</div>
        <?php
            $phoneNumber = Auth::user()->nowa;
            if (substr($phoneNumber, 0, 1) === '0') {
                $phoneNumber = '0' . substr($phoneNumber, 1);
            } elseif (substr($phoneNumber, 0, 1) === '8') {
                $phoneNumber = '0' . $phoneNumber;
            }
        ?>
        <div class="section-content mb-3">
            <div class="table-responsive text-nowrap">
                <table id="wa_responses-table" class="table table-hover w-100">
					<thead>
						<tr>
							<th>no.</th>
							<th>Name</th>
							<th>Team Name</th>
							<th>Email</th>
							<th>WhatsApp</th>
							<th>Reponse</th>
						</tr>
					</thead>
					<tbody class="table-border-bottom-0">
						@foreach ($users as $user)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $user->name }}</td>
							<td>{{ $user->team_name }}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $phoneNumber }}</td>
							<td>{{ $user->wa_response }}</td>
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
        var table = $('#wa_responses-table').DataTable({
            layout: {
                topStart: {
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Export to Excel',
                            className: 'bg-info',
                            filename: 'users_wa_responses',
                            title: 'Hackathon Bank Indonesia 2024 - User\'s WhatsApp Responses',
                            exportOptions: {
                                    columns: [0, 1, 2]
                            },
                        },
                        {
                            extend: 'pdf',
                            text: 'Export to PDF',
                            className: 'bg-info',
                            filename: 'users_wa_responses',
                            title: 'Hackathon Bank Indonesia 2024 - User\'s WhatsApp Responses',
                            exportOptions: {
                                    columns: [0, 1, 2]
                            },
                        },
                    ]
                }
            }
        });
    });
</script>