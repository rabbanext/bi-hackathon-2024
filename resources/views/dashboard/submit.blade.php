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
            <div class="col-12">
                <div class="section-content mb-4">
                    <h5>Guideline</h5>
                    <p class="mb-0">Silakan cek syarat dan ketentuan registrasi pada link berikut:</p>
                    <!-- <a class="text-info mb-0" href="https://drive.google.com/file/d/1z0F7rhKOMln5YM4239JRbqaU1fYJnXRW/view?usp=sharing">Guideline</a> -->
                    <!-- <a class="text-info mb-0" href="https://drive.google.com/file/d/1-fUyljC23hBpwSYU08n7HYZqBeOe0fO-/view?usp=sharing">Guideline</a> -->
                    <a class="text-info mb-0" href="https://drive.google.com/file/d/1vAjtk_oGRmDIha_6lrUl6Kde6uhRvyR6/view?usp-sharing">Guideline</a>
                </div>
            </div>
            <div class="col-12">
                <div class="section-content mb-4">
                    <h5>Panduan Proposal</h5>
                    <p class="mb-0">Pastikan format submisi proposal kamu sesuai dengan format berikut:</p>
                    <!-- <a class="text-info mb-0" href="https://drive.google.com/file/d/1i6f29tivKJYggfPOI6WGHLhWhhJsJ5uO/view?usp=sharing">Panduan Proposal</a> -->
                    <a class="text-info mb-0" href="https://drive.google.com/file/d/1LopId1jI-iKIGl_e2QiMEOzW0_z68nI9/view?usp=sharing">Panduan Proposal</a>
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

        @if (Auth::user()->submitted == null)
            <div class="alert alert-warning mt-4 text-center">
                <strong>Pendaftaran sudah berakhir.</strong> Kami menghargai setiap partisipasi yang telah diberikan. Sampai jumpa di kesempatan berikutnya!
            </div>
        @else
            @if (Auth::user()->is_finalis)
                <div class="section-title pt-5 pb-2">
                    <p>Submit Video</p>
                </div>

                
                @if (Auth::user()->video_submitted_at)
                    <div class="alert alert-success mt-4 text-center">
                        <p class="mb-0">
                            <b>Terima kasih!</b> Anda telah mengirimkan video pada {{ Auth::user()->video_submitted_at->format('d-m-Y H:i') }}.
                        </p>
                        <p class="mb-0">
                            Anda masih memiliki kesempatan untuk mengirimkan video baru sebelum batas waktu berakhir.
                        </p>
                        <p class="mt-2 mb-0">
                            <a href="{{ Auth::user()->video_link }}" target="_blank">Lihat Video yang Telah Dikirim</a>
                        </p>
                    </div>

                @else
                    <div class="alert alert-info mt-4 text-center">
                        <strong>Mohon segera mengunggah tautan link video dari tim Anda.</strong><br/>
                        Pastikan tautan dapat diakses dengan baik, jangan lewatkan kesempatan berharga ini untuk menampilkan karya terbaik tim Anda!
                    </div>
                @endif



                <ul class="nav nav-tabs" id="submitVideoTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="file-tab" data-toggle="tab" href="#file" role="tab" aria-controls="file" aria-selected="true">
                            <small>Upload File</small>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="link-tab" data-toggle="tab" href="#link" role="tab" aria-controls="link" aria-selected="false">
                            <small>Submit Link</small>
                        </a>
                    </li>
                </ul>


                <div class="tab-content section-content mt-4" id="submitVideoTabContent">
                    <div class="tab-pane fade show active" id="file" role="tabpanel" aria-labelledby="file-tab">
                        <div class="alert text-center mb-0">
                            <small>
                                <strong>Perhatian!</strong> Pastikan file video yang dikirimkan ada file video berformat .mp4, .mpg atau .webm, dengan ukuran maksimal 300MB.
                            </small>
                        </div>
                        <style>
                            .drop-zone {
                                border: 2px dashed #9aa0a6;
                                border-radius: 12px;
                                padding: 28px;
                                background: rgba(255, 255, 255, 0.04);
                                transition: all 0.2s ease;
                                cursor: pointer;
                            }
                            .drop-zone:hover, .drop-zone--over {
                                border-color: #0d6efd;
                                background: rgba(13, 110, 253, 0.06);
                                box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
                            }
                            .drop-zone__input { display: none; }
                            .dz-content .dz-icon { width: 48px; height: 48px; margin: 0 auto 8px; opacity: 0.9; }
                            .dz-content .dz-icon svg { width: 48px; height: 48px; fill: #0d6efd; }
                            .file-preview { margin-top: 12px; }
                            .file-preview__item {
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                gap: 12px;
                                padding: 10px 12px;
                                border: 1px solid rgba(13, 110, 253, 0.25);
                                border-radius: 8px;
                                background: rgba(13, 110, 253, 0.05);
                            }
                            .file-preview__name { font-weight: 600; }
                            .file-preview__size { font-size: 0.875rem; color: #6c757d; }
                            .remove-file { cursor: pointer; color: #dc3545; font-weight: 700; padding: 0 8px; }
                        </style>
                        <form id="videoFileForm" action="{{ route('submitVideo') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="video_file" class="mb-2">Video File</label>
                                <div id="video-drop-zone" class="drop-zone text-center">
                                    <div class="dz-content">
                                        <div class="dz-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                                <path d="M12 16V4m0 0l-4 4m4-4l4 4" stroke="#0d6efd" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M20 16.5a3.5 3.5 0 01-3.5 3.5h-9A3.5 3.5 0 014 16.5c0-1.7 1.2-3.1 2.7-3.4.4-2.5 2.6-4.4 5.3-4.4 2.2 0 4.1 1.3 4.9 3.2 1.7.1 3.1 1.6 3.1 3.6z" fill="#0d6efd" opacity="0.15"/>
                                            </svg>
                                        </div>
                                        <p class="mb-1"><strong>Drag & drop</strong> file video di sini</p>
                                        <p class="text-white mb-0">atau klik untuk memilih file</p>
                                        <small class="text-white d-block mt-2">MP4, MPG, WEBM • Maks 300 MB</small>
                                    </div>
                                    <input type="file" class="drop-zone__input" id="video_file" name="video_file" accept=".mp4,.mpg,.mpeg,.webm,video/mp4,video/webm,video/mpeg">
                                </div>
                                <div class="file-preview" id="video-file-preview"></div>
                            </div>
                            <div class="form-group pb-4 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="link" role="tabpanel" aria-labelledby="link-tab">
                        <div class="alert text-center mb-0">
                            <small>
                                <strong>Perhatian!</strong> Pastikan link video yang akan dikirimkan adalah link video yang dapat diakses dengan baik.
                            </small>
                        </div>
                        <style>
                            .url-input-wrapper { position: relative; }
                            .url-input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); opacity: 0.9; pointer-events: none; }
                        </style>
                        <form id="videoLinkForm" action="{{ route('submitVideo') }}" method="POST">
                            @csrf
                            <div class="mb-3 url-input-wrapper">
                                <span class="">
                                    <i class="bi bi-link"></i>
                                </span>
                                <label for="video_link" class="mb-1">Video Link</label>
                                <input id="video_link" class="form-control url-input @error('video_link') is-invalid @enderror" type="url" name="video_link"
                                    value="{{ old('video_link') }}" placeholder="https://youtube.com/watch?v=xxxx" autocomplete="video_link" required>
                                @error('video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="mt-2" id="video-link-platform" style="display:none"></div>
                            </div>
                            <div class="form-group pb-4 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            @else 
                <div class="alert alert-warning mt-4 text-center">
                    <strong>Pendaftaran sudah berakhir.</strong> Kami menghargai setiap partisipasi yang telah diberikan. Sampai jumpa di kesempatan berikutnya!
                </div>
            @endif
        @endif
        
    </div>
        <div class="content-backdrop fade"></div>
    </div>
    @endsection

    <!-- Verify Modal -->
    <div class="modal fade" id="verifyModal" tabindex="-1" aria-labelledby="verifyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-black">
                <div class="modal-header">
                    <h5 class="modal-title" id="verifyModalLabel">Verify Your WhatsApp Number</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <p class="mb-0">
                    Please Verify Your WhatsApp Number (<strong>0{{ Auth::user()->nowa }}</strong>)
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="/verify-wa" class="btn btn-info">Verify Your WhatsApp Number</a>
            </div>
        </div>
    </div>
</div>

<!-- Confirm Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content text-black">
            <div class="modal-header">
                <h5 class="modal-title text-black" id="confirmModalLabel">Confirm Submission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you absolutely certain you want to submit?</p>    
                <p>If unsure, please use the "<b>Save Form</b>" button instead to retain your data.</p>
                <p class="mb-0">Once submitted, changes cannot be reversed. Please review and double-check your form carefully before proceeding.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-info" id="confirmSubmitButton">Yes, Submit</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    var formType = 'UPLOAD_VIDEO'; // UPLOAD_VIDEO || SUBMIT_PROPOSAL
</script>

<!-- Validation and Submit JS -->
<script>
    if (formType !== 'UPLOAD_VIDEO') {
        function allMembersAreMember() {
            var roleSelects = document.querySelectorAll('.role-select');
            var total = roleSelects.length;
            var memberCount = 0;

            roleSelects.forEach(function (select) {
                if (select.value === 'member') {
                    memberCount++;
                }
            });

            // Jika semua anggota adalah "member", kembalikan true
            return (total > 0 && memberCount === total);
        }

        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('mainForm');
            var saveButton = document.getElementById('saveButton');
            var confirmSubmitButton = document.getElementById('confirmSubmitButton');
            var confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));

            // Validate on blur
            form.querySelectorAll('input[required]').forEach(function (input) {
                input.addEventListener('blur', function () {
                    validateField(input);
                });
            });

            saveButton.addEventListener('click', function () {
                document.getElementById('project_file').removeAttribute('required');
                saveForm(null);
            });

            confirmSubmitButton.addEventListener('click', function () {
                if (!{!! json_encode(Auth::user()->project_file) !!}) {
                    document.getElementById('project_file').setAttribute('required', '');
                }
                saveForm(1);
            });


            function saveForm(isSubmit) {
                var isValid = validateForm();

                if (isValid) {
                    if (allMembersAreMember()) {
                        alert('At least one team member must be a "Group Leader".');
                        return;
                    }
                    
                    // Add submitted input to the form
                    var isSubmitInput = document.createElement('input');
                    isSubmitInput.setAttribute('type', 'hidden');
                    isSubmitInput.setAttribute('name', 'submitted');
                    isSubmitInput.setAttribute('value', isSubmit);
                    form.appendChild(isSubmitInput);

                    mainForm.submit();
                } else {
                    confirmModal.hide();
                    setTimeout(function() {
                        var firstInvalidField = form.querySelector('.is-invalid');
                        if (firstInvalidField) {
                            firstInvalidField.focus();
                        }
                    }, 500);
                }
            }

            function validateForm() {
                var isValid = true;

                form.querySelectorAll('input[required]').forEach(function (input) {
                    if (!validateField(input)) {
                        isValid = false;
                    }
                });

                return isValid;
            }

            function validateField(input) {
                if (input.value.trim() === '') {
                    displayError(input, input.getAttribute('placeholder') + ' is required');
                    return false;
                } else {
                    removeError(input);
                    return true;
                }
            }

            function displayError(input, message) {
                var errorElement = input.parentNode.querySelector('.invalid-feedback'); // Get the invalid-feedback element in the same form-group
                errorElement.textContent = message;
                input.classList.add('is-invalid');
            }

            function removeError(input) {
                var errorElement = input.parentNode.querySelector('.invalid-feedback'); // Get the invalid-feedback element in the same form-group
                errorElement.textContent = '';
                input.classList.remove('is-invalid');
            }
        });
    }
</script>

<!-- Add member JS -->
<script>
    if (formType !== 'UPLOAD_VIDEO') {
        document.addEventListener('DOMContentLoaded', function () {
            var maxMembers = 3;
            var currentMembers = {{ $countMember }};
            var addMemberBtn = document.getElementById('add-member-btn');

            function toggleAddMemberButton() {
                if (currentMembers > maxMembers) {
                    addMemberBtn.style.display = 'none';
                } else {
                    addMemberBtn.style.display = 'block';
                }
            }

            toggleAddMemberButton();

            addMemberBtn.addEventListener('click', function () {
                if (currentMembers <= maxMembers) {
                    var teamMembersContainer = document.getElementById('team-members');
                    var newMemberDiv = document.createElement('div');
                    newMemberDiv.innerHTML = `
                        <div class="mb-3 section-content p-2">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="member_name[]"
                                            placeholder="Member Name"
                                            required />
                                        <label for="floatingInput">Name</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select role-select" name="member_role[]" placeholder="Member Role" required>
                                            <option value="">Select Role</option>
                                            <option value="leader">Group Leader</option>
                                            <option value="member">Member</option>
                                        </select>
                                        <label for="role">Role</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="member_identity[]"
                                        placeholder="Identity No./KTP/Passport" required />
                                        <label for="floatingInput">Identity No./KTP/Passport</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="member_domicile[]"
                                            placeholder="Member Domicile"
                                            required />
                                        <label for="floatingInput">Domicile</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" name="member_email[]"
                                            placeholder="Member Email"
                                            required />
                                        <label for="floatingInput">Email</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="floatingInput" name="member_date_of_birth[]"
                                            placeholder="Member Date of Birth"
                                            required />
                                        <label for="floatingInput">Date of Birth</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="member_profession[]"
                                            placeholder="Member Profession"
                                            required />
                                        <label for="floatingInput">Profession</label>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" name="member_github_url[]"
                                            placeholder="Github Link"
                                            />
                                        <label for="floatingInput">Github Link</label>
                                        <div id="floatingInputLink" class="form-text text-white">
                                            https://github.com/username
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" name="member_linkedin_url[]"
                                            placeholder="CV Document or LinkedIn Link"
                                            />
                                        <label for="floatingInput">CV Document or LinkedIn Link</label>
                                        <div id="floatingInputLink" class="form-text text-white">
                                            https://linkedin.com/in/username
                                        </div>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-danger remove-member-btn">Remove Member</button>
                            </div>
                        </div>
                    `;
                    teamMembersContainer.appendChild(newMemberDiv);
                    currentMembers++;
                    toggleAddMemberButton();
                }
            });

            document.getElementById('team-members').addEventListener('change', function (e) {
                if (e.target.classList.contains('role-select')) {
                    var selectedRoles = document.querySelectorAll('.role-select');
                    var leaderCount = 0;
                    selectedRoles.forEach(function (select) {
                        if (select.value === 'leader') {
                            leaderCount++;
                        }
                    });
                    if (leaderCount > 1) {
                        e.target.value = 'member';
                        alert('Only one team member can be the leader.');
                    }
                }
            });

            document.getElementById('team-members').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-member-btn')) {
                    e.target.parentElement.parentElement.parentElement.remove();
                    currentMembers--;
                    toggleAddMemberButton();
                }
            });

            document.querySelector('form').addEventListener('submit', function (e) {
                var numberOfTeamMembers = document.querySelectorAll('[name^="member_name"]').length;

                if (numberOfTeamMembers === 0) {
                    var memberFields = document.querySelectorAll('[name^="member_"]');
                    memberFields.forEach(function (field) {
                        field.value = '';
                    });
                }
            });
        });
    }
</script>

<!-- Add link JS -->
<script>
    if (formType !== 'UPLOAD_VIDEO') {
        document.addEventListener('DOMContentLoaded', function () {
            var maxLinks = 10;
            var currentLinks = {{ $countLink }};
            var addLinkBtn = document.getElementById('add-link-btn');

            function toggleAddLinkButton() {
                if (currentLinks >= maxLinks) {
                    addLinkBtn.style.display = 'none';
                } else {
                    addLinkBtn.style.display = 'block';
                }
            }

            toggleAddLinkButton();

            addLinkBtn.addEventListener('click', function () {
                if (currentLinks < maxLinks) {
                    var linksContainer = document.getElementById('links');
                    var newLinkDiv = document.createElement('div');
                    newLinkDiv.innerHTML = `
                        <div class="mb-3 section-content p-2">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" name="project_link[]"
                                            value="" placeholder="Link" />
                                        <label for="floatingInput">Link (Github/Website/Drive/Other Link)</label>
                                        <div id="floatingInputLink" class="form-text">
                                            https://github.com/username/repository
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="floatingInput" name="project_desc[]"
                                            value="" placeholder="Description" />
                                        <label for="floatingInput">Description</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center mb-3">
                                <button type="button" class="btn btn-danger remove-link-btn">Remove Item</button>
                            </div>
                        </div>
                    `;
                    linksContainer.appendChild(newLinkDiv);
                    currentLinks++;
                    toggleAddLinkButton();
                }
            });

            document.getElementById('links').addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-link-btn')) {
                    e.target.parentElement.parentElement.remove();
                    currentLinks--;
                    toggleAddLinkButton();
                }
            });

            document.querySelector('form').addEventListener('submit', function (e) {
                // Get the number of links
                var numberOfLinks = document.querySelectorAll('[name^="project_link"]').length;

                if (numberOfLinks === 0) {
                    var linkFields = document.querySelectorAll('[name^="project_"]');
                    linkFields.forEach(function (field) {
                        field.value = '';
                    });
                }
            });
        });
    }
</script>

<!-- Upload File JS -->
<script>
    if (formType === 'UPLOAD_VIDEO') {
        document.addEventListener('DOMContentLoaded', function () {
            var dropZone = document.getElementById('video-drop-zone');
            var fileInput = document.getElementById('video_file');
            var filePreview = document.getElementById('video-file-preview');
            var maxBytes = 300 * 1024 * 1024; // 300 MB

            if (!dropZone || !fileInput || !filePreview) { return; }

            // Click to open file chooser
            dropZone.addEventListener('click', function () {
                fileInput.click();
            });

            // Drag events
            ;['dragenter','dragover'].forEach(function(evt){
                dropZone.addEventListener(evt, function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropZone.classList.add('drop-zone--over');
                });
            });
            ;['dragleave','drop'].forEach(function(evt){
                dropZone.addEventListener(evt, function (e) {
                    e.preventDefault();
                    e.stopPropagation();
                    dropZone.classList.remove('drop-zone--over');
                });
            });

            dropZone.addEventListener('drop', function (e) {
                var files = e.dataTransfer && e.dataTransfer.files ? e.dataTransfer.files : [];
                if (files.length) handleFiles(files);
            });

            fileInput.addEventListener('change', function () {
                if (this.files && this.files.length) handleFiles(this.files);
            });

            filePreview.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-file')) {
                    fileInput.value = '';
                    filePreview.innerHTML = '';
                }
            });

            function handleFiles(files) {
                if (files.length > 1) {
                    alert('Silakan pilih hanya 1 file.');
                    fileInput.value = '';
                    return;
                }

                var file = files[0];
                // Validate type (basic)
                var allowedTypes = ['video/mp4', 'video/webm', 'video/mpeg'];
                var allowedExt = ['.mp4', '.mpg', '.mpeg', '.webm'];
                var fileNameLower = (file.name || '').toLowerCase();
                var hasAllowedExt = allowedExt.some(function(ext){ return fileNameLower.endsWith(ext); });
                if (!allowedTypes.includes(file.type) && !hasAllowedExt) {
                    alert('Format tidak didukung. Gunakan MP4, MPG/MPEG, atau WEBM.');
                    fileInput.value = '';
                    return;
                }

                // Validate size
                if (file.size > maxBytes) {
                    alert('Ukuran file melebihi 300MB.');
                    fileInput.value = '';
                    return;
                }

                // Clear preview and render
                filePreview.innerHTML = '';
                var fileItem = document.createElement('div');
                fileItem.className = 'file-preview__item';
                fileItem.innerHTML = '<span class="file-preview__name">' + escapeHtml(file.name) + '</span>' +
                    '<span class="file-preview__size">' + formatBytes(file.size) + '</span>' +
                    '<span class="remove-file" aria-label="Remove">×</span>';
                filePreview.appendChild(fileItem);

                // Reflect to input
                var dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                fileInput.files = dataTransfer.files;
            }

            function formatBytes(bytes, decimals) {
                if (bytes === 0) return '0 Bytes';
                var k = 1024;
                var dm = decimals || 2;
                var sizes = ['Bytes', 'KB', 'MB', 'GB'];
                var i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }

            function escapeHtml(str) {
                return String(str)
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;')
                    .replace(/'/g, '&#039;');
            }
        });
    } else {
        document.addEventListener('DOMContentLoaded', function () {
            var dropZone = document.querySelector('.drop-zone');
            var fileInput = document.getElementById('project_file');
            var filePreview = document.querySelector('.file-preview');

            dropZone.addEventListener('dragover', function (e) {
                e.preventDefault();
                dropZone.classList.add('drop-zone--over');
            });

            dropZone.addEventListener('dragleave', function () {
                dropZone.classList.remove('drop-zone--over');
            });

            dropZone.addEventListener('drop', function (e) {
                e.preventDefault();
                dropZone.classList.remove('drop-zone--over');

                var files = e.dataTransfer.files;
                handleFiles(files);
            });

            fileInput.addEventListener('change', function () {
                var files = this.files;
                handleFiles(files);
            });

            filePreview.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-file')) {
                e.target.parentElement.remove();
                }
            });

            function handleFiles(files) {
                // Check if more than one file is selected
                if (files.length > 1) {
                    alert('Please select only one file.');
                    fileInput.value = '';
                    return;
                }

                // Clear existing file preview items
                filePreview.innerHTML = '';

                // Handle the selected file
                var file = files[0];

                var fileItem = document.createElement('div');
                fileItem.classList.add('file-preview__item');
                fileItem.innerHTML = `
                <span>Selected Proposal File: ${file.name}</span>
                <span>${formatBytes(file.size)}</span>
                <span class="remove-file">x</span>
                `;
                filePreview.appendChild(fileItem);

                // Update file input value to reflect selected file
                fileInput.files = files;
            }

            // Reset file input value
            filePreview.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-file')) {
                    fileInput.value = '';
                    fileSelected = false;
                }
            });

            // // Update file input value to null if no file has been selected
            // fileInput.addEventListener('change', function () {
            //     if (!fileSelected) {
            //         fileInput.value = '';
            //     }
            // });

            function formatBytes(bytes, decimals = 2) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const dm = decimals < 0 ? 0 : decimals;
                const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }
        }); 
    }
</script>

<!-- Link platform detection JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var linkInput = document.getElementById('video_link');
        var platformEl = document.getElementById('video-link-platform');
        if (!linkInput || !platformEl) return;

        function detectPlatform(url) {
            var u = (url || '').toLowerCase();
            if (u.includes('youtube.com') || u.includes('youtu.be')) return 'YouTube';
            if (u.includes('drive.google.com')) return 'Google Drive';
            if (u.includes('vimeo.com')) return 'Vimeo';
            return null;
        }

        function updatePlatform() {
            var info = detectPlatform(linkInput.value);
            if (info) {
                platformEl.style.display = 'block';
                platformEl.innerHTML = '<span class="badge bg-info">Platform: ' + info + '</span>';
            } else {
                platformEl.style.display = 'none';
                platformEl.innerHTML = '';
            }
        }

        linkInput.addEventListener('input', updatePlatform);
        updatePlatform();
    });
</script>

<script>
    if (formType !== 'UPLOAD_VIDEO') {
        document.addEventListener('DOMContentLoaded', function () {
            var changeFileRadios = document.querySelectorAll('input[name="change_file"]');
            var newFileUpload = document.getElementById('new-file-upload');

            changeFileRadios.forEach(function (radio) {
                radio.addEventListener('change', function () {
                    if (this.value === 'yes') {
                        newFileUpload.style.display = 'block';
                    } else {
                        newFileUpload.style.display = 'none';
                    }
                });
            });
        });
    }
</script>

<script>
    if (formType !== 'UPLOAD_VIDEO') {
        // Inisialisasi semua tooltip di halaman
        document.addEventListener("DOMContentLoaded", function(){
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    }
</script>
