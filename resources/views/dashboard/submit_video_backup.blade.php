@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="section-title pb-2 my-5">
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
                    <!-- <a class="text-info mb-0" href="https://drive.google.com/file/d/1z0F7rhKOMln5YM4239JRbqaU1fYJnXRW/view?usp=sharing">Guideline</a> -->
                    <a class="text-info mb-0" href="https://drive.google.com/file/d/1vAjtk_oGRmDIha_6lrUl6Kde6uhRvyR6/view?usp-sharing">Guideline</a>
                    
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
                        <h5 class="card-title">Email:  <strong class="badge bg-danger">Not Verified</strong></h5>
                        <div class="card-body">
                            <p class="mb-0">{{ Auth::user()->email }} <a href="#" class="text-info">(Click here to verify)</a></p>
                        </div>
                    @else
                        <h5 class="card-title">Email:  <strong class="badge bg-success">Verified</strong></h5>
                        <div class="card-body">
                            <p class="mb-0">{{ Auth::user()->email }}</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="section-content mb-4">
                    @if (Auth::user()->otp_verified_at == null && Auth::user()->type == "user")
                        <h5 class="card-title">WhatsApp:  <strong class="badge bg-danger">Not Verified</strong></h5>
                        <div class="card-body">
                            <p class="mb-0">{{ Auth::user()->nowa }} <a href="/verify-wa" class="text-info">(Click here to verify)</a></p>
                        </div>
                    @else
                        <h5 class="card-title">WhatsApp:  <strong class="badge bg-success">Verified</strong></h5>
                        <div class="card-body">
                            <p class="mb-0">{{ Auth::user()->nowa }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @if (Auth::user()->submitted != null)
        
            <div class="section-title pt-5 pb-2">
                <p>Submit Video</p>
            </div>

            <div class="alert alert-info mt-4 text-center">
                <strong>Mohon segera mengunggah tautan link video dari tim Anda.</strong><br/>
                Pastikan tautan dapat diakses dengan baik, jangan lewatkan kesempatan berharga ini untuk menampilkan karya terbaik tim Anda!
            </div>


            <form id="videoLinkForm" action="{{ route('submitVideo') }}" method="POST">
                @csrf

                <div class="form-floating mb-3">
                    <input class="form-control @error('video_link') is-invalid @enderror" type="url" name="video_link"
                        value="{{ old('video_link') }}" placeholder="https://" autocomplete="video_link" required autofocus>
                    <label for="video_link">Video Link</label>
                    @error('video_link')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group pb-4 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

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