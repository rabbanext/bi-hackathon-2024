@extends('dashboard.layouts.main')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="section-title pb-2 my-5">
            <h2>Projects</h2>
            <p>Projects</p>
        </div>
        <div class="section-content mb-3">
            <div class="table-responsive text-nowrap">
                <table id="projects-table" class="table table-hover w-100">
                    <thead>
                        <tr>
                            <th>no.</th>
                            <th>Team Name</th>
                            <th>File Name</th>
                            <th>Submission</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $project->team_name }}</strong>
                            </td>
                            <td>{{ $project->project_file }}</td>
							<td>
								@if ($project->submitted == null)
								Not Submitted
								@else
								Submitted
								@endif
							</td>
                            <td>
                                <a href="{{ asset('/storage/' . $project->project_file) }}" target="_blank" class="btn btn-sm btn-info hide-arrow">
                                    <i class="bx bx-link"></i> Open File
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
        var table = $('#projects-table').DataTable({
            layout: {
                topStart: {
                    buttons: [
                        {
                            extend: 'excel',
                            text: 'Export to Excel',
                            className: 'bg-info',
                            filename: 'users_projects',
                            title: 'Hackathon Bank Indonesia 2024 - User\'s Projects',
                            exportOptions: {
                                    columns: [0, 1, 2]
                            },
                        },
                        {
                            extend: 'pdf',
                            text: 'Export to PDF',
                            className: 'bg-info',
                            filename: 'users_projects',
                            title: 'Hackathon Bank Indonesia 2024 - User\'s Projects',
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