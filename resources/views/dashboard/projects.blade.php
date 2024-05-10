@extends('dashboard.layouts.main')

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
                <table id="projects-table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>no.</th>
                            <th>Team Name</th>
                            <th>File Name</th>
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
                                <a href="{{ asset('/storage/' . $project->project_file) }}" target="_blank" class="btn btn-info hide-arrow">
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

    <!-- Footer -->
    @include('dashboard.layouts.partials.footer')

    <div class="content-backdrop fade"></div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#projects-table').DataTable();
    });
</script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<style>
	.dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
		color: #FFFFFF !important;
	}
	.dataTables_wrapper .dataTables_length select {
		color: #FFFFFF !important;
	}

    table.dataTable tbody tr {
        background-color: transparent !important;
    }
</style>