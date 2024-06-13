@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="section-title pb-2 my-5">
          <h2>Submission</h2>
          <p>Submit Proposal</p>
        </div>

        @if (Session::has('success'))
            <div class="alert alert-success">
                <p class="mb-0">{!! Session::get('success') !!}</p>
            </div>
        @elseif ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="row">
            <div class="col-12 col-md-6">
                <div class="section-content mb-4">
                    <h5>Guideline</h5>
                    <p class="mb-0">Silakan cek syarat dan ketentuan registrasi pada link berikut:</p>
                    <a class="text-info mb-0" href="https://drive.google.com/file/d/1z0F7rhKOMln5YM4239JRbqaU1fYJnXRW/view?usp=sharing">Guideline</a>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="section-content mb-4">
                    <h5>Panduan Proposal</h5>
                    <p class="mb-0">Pastikan format submisi proposal kamu sesuai dengan format berikut:</p>
                    <a class="text-info mb-0" href="https://drive.google.com/file/d/1i6f29tivKJYggfPOI6WGHLhWhhJsJ5uO/view?usp=sharing">Panduan Proposal</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="section-content mb-4">
                    @if (Auth::user()->email_verified_at == null && Auth::user()->type == "user")
                        <h5 class="card-title">Email Status:  <strong class="badge bg-danger">Not Verified</strong></h5>
                        <div class="card-body">
                            <p class="mb-0">{{ Auth::user()->email }} <a href="#" class="text-info">(Click here to verify)</a></p>
                        </div>
                    @else
                        <h5 class="card-title">Email Status:  <strong class="badge bg-success">Verified</strong></h5>
                        <div class="card-body">
                            <p class="mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="section-content mb-4">
                    @if (Auth::user()->otp_verified_at == null && Auth::user()->type == "user")
                        <h5 class="card-title">WhatsApp Status:  <strong class="badge bg-danger">Not Verified</strong></h5>
                        <div class="card-body">
                            <p class="mb-0">{{ Auth::user()->nowa }} <a href="/verify-wa" class="text-info">(Click here to verify)</a></p>
                        </div>
                    @else
                        <h5 class="card-title">WhatsApp Status:  <strong class="badge bg-success">Verified</strong></h5>
                        <div class="card-body">
                            <p class="mb-0">{{ Auth::user()->nowa }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if (Auth::user()->submitted != null)
            <h1>Submit Video</h1>

            <ul class="nav nav-tabs" id="submitVideoTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="file-tab" data-toggle="tab" href="#file" role="tab" aria-controls="file" aria-selected="true">Upload File</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="link-tab" data-toggle="tab" href="#link" role="tab" aria-controls="link" aria-selected="false">Submit Link</a>
                </li>
            </ul>
            <div class="tab-content" id="submitVideoTabContent">
                <div class="tab-pane fade show active" id="file" role="tabpanel" aria-labelledby="file-tab">
                    <form id="videoFileForm" action="{{ route('submitVideo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="video_file">Video File</label>
                            <input type="file" class="form-control" id="video_file" name="video_file">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="tab-pane fade" id="link" role="tabpanel" aria-labelledby="link-tab">
                    <form id="videoLinkForm" action="{{ route('submitVideo') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="video_link">Video Link</label>
                            <input type="url" class="form-control" id="video_link" name="video_link">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            
            @if(Auth::user()->video_submitted_at)
                <p>Video submitted at: {{ Auth::user()->video_submitted_at->format('d-m-Y H:i:s') }}</p>
            @endif
        @endif
    </div>
    <div class="content-backdrop fade"></div>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    document.getElementById('videoForm').addEventListener('submit', function(event) {
        var videoFile = document.getElementById('video_file').value;
        var videoLink = document.getElementById('video_link').value;

        if (!videoFile && !videoLink) {
            event.preventDefault();
            alert('Please provide either a video file or a video link.');
        }
    });
</script>