@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">

    @if (Auth::user()->nowa == null && Auth::user()->type == "user")
    <div class="card mb-3">
      <div class="d-flex align-items-end row">
        <div class="col-sm-8">
          <div class="card-body">
            <h5 class="card-title text-primary">Complete Your Profile</h5>
            <p class="mb-4">
              Please Complete Your Profile
            </p>

            <a href="/profile" class="btn btn-sm btn-outline-primary">Edit Profile</a>
          </div>
        </div>
      </div>
    </div>
    @endif

    @if (Auth::user()->type == "admin" OR Auth::user()->type == "super-admin")
    <div class="row mb-3">
      <div class="col-md-4 order-0">
        <div class="card">
          <div class="card-body d-flex">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h3 class="text-primary mb-0">
                  {{ DB::table('users')
                  ->where('type', '=', 0)
                  ->get()
                  ->count(); }}
                </h3>
                <h6 class="mb-0">User Registered</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 order-0">
        <div class="card">
          <div class="card-body d-flex">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h3 class="text-primary mb-0">
                  {{ DB::table('users')
                  ->where('type', '=', 0)
                  ->where('email_verified_at', '!=', null)
                  ->get()
                  ->count(); }}
                </h3>
                <h6 class="mb-0">User Verified</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 order-0">
        <div class="card">
          <div class="card-body d-flex">
            <div class="avatar flex-shrink-0 me-3">
              <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
            </div>
            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
              <div class="me-2">
                <h3 class="text-primary mb-0">
                  {{ DB::table('users')
                  ->where('project_link', '!=', null)
                  ->get()
                  ->count(); }}
                </h3>
                <h6 class="mb-0">Project Submitted</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif

  </div>
  <!-- / Content -->

  <!-- Footer -->
  @include('dashboard.layouts.partials.footer')

  <div class="content-backdrop fade"></div>
</div>
@endsection