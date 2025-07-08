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
                    <a class="text-info mb-0" href="https://drive.google.com/file/d/1-fUyljC23hBpwSYU08n7HYZqBeOe0fO-/view?usp=sharing">Guideline</a>
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

        @else
            <div class="alert alert-success">
                <strong>Your form has been submitted.</strong> Thank you for your participation, and best of luck!<br/>You may still resubmit the form if needed.
            </div>
        @endif

        <form action="{{ route('posts.update',Auth::user()->id) }}" method="POST" id="mainForm" enctype="multipart/form-data">
            <div class="section-content mb-4">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="team_name" name="team_name" value="{{ Auth::user()->team_name }}" placeholder="Team Name" required />
                                <label for="team_name">Team Name</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <select class="form-select" id="submit_for" name="submit_for" required>
                                    <option value="" disabled {{ empty(Auth::user()->submit_for) ? 'selected' : '' }}>Pilih tipe</option>
                                    <option value="Profesional" {{ Auth::user()->submit_for === 'Profesional' ? 'selected' : '' }}>Profesional</option>
                                    <option value="Mahasiswa" {{ Auth::user()->submit_for === 'Mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                                </select>
                                <label for="submit_for">Profesional atau Mahasiswa</label>
                                <div class="invalid-feedback">Silakan pilih salah satu.</div>
                            </div>
                        </div>
                        <!-- <div class="col-12 col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="institution" name="institution" value="{{ Auth::user()->institution }}" placeholder="Institution/Organization/Community" required />
                                <label for="institution">Institution/Organization/Community</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div> -->
                        <div class="col-12 col-md-6">
                            <div class="form-floating mb-3 position-relative">
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="institution" 
                                    name="institution" 
                                    value="{{ Auth::user()->institution }}" 
                                    placeholder="Institution/Organization/Community" 
                                    required
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="right"
                                    title="Isi dengan nama institusi, organisasi, atau komunitas tempat Anda berasal secara lengkap. cth: Bank Rakyat Indonesia." 
                                />
                                <label for="institution">Institution/Organization/Community</label>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <hr class="my-3">
                            <h5>Team Members (max. 4)</h5>
                            <div id="team-members">
                                @if (Auth::user()->member_name == null)
                                    <div class="mb-3 section-content p-2">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" name="member_name[]"
                                                        placeholder="Member Name" required />
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
                                                        placeholder="Member Domicile" required />
                                                    <label for="floatingInput">Domicile</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="floatingInput" name="member_email[]"
                                                        placeholder="Member Email" required />
                                                    <label for="floatingInput">Email</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" id="floatingInput" name="member_date_of_birth[]"
                                                        placeholder="Member Date of Birth" required />
                                                    <label for="floatingInput">Date of Birth</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput" name="member_profession[]"
                                                        placeholder="Member Profession" required />
                                                    <label for="floatingInput">Profession</label>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInput" name="member_github_url[]"
                                                        placeholder="Github Link" />
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
                                                        placeholder="CV Document or LinkedIn Link" />
                                                    <label for="floatingInput">CV Document or LinkedIn Link</label>
                                                    <div id="floatingInputLink" class="form-text text-white">
                                                        https://linkedin.com/in/username
                                                    </div>
                                                    <div class="invalid-feedback"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @foreach($members as $member)
                                    @php
                                        $names = json_decode($member->member_name);
                                        $identities = json_decode($member->member_identity);
                                        $roles = json_decode($member->member_role);
                                        $domiciles = json_decode($member->member_domicile);
                                        $emails = json_decode($member->member_email);
                                        $date_of_births = json_decode($member->member_date_of_birth);
                                        $professions = json_decode($member->member_profession);
                                        $github_urls = json_decode($member->member_github_url);
                                        $linkedin_urls = json_decode($member->member_linkedin_url);
                                    @endphp

                                    @for ($i = 0; $i < count($names ?? []); $i++)
                                        <div class="mb-3 section-content p-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" name="member_name[]"
                                                            value="{{ isset($names[$i]) ? $names[$i] : '' }}" placeholder="Member Name" required />
                                                        <label for="floatingInput">Name</label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select role-select" name="member_role[]" placeholder="Member Role" required>
                                                            <option value="">Select Role</option>
                                                            <option value="leader" {{ $roles[$i] == 'leader' ? 'selected' : '' }}>Group Leader</option>
                                                            <option value="member" {{ $roles[$i] == 'member' ? 'selected' : '' }}>Member</option>
                                                        </select>
                                                        <label for="role">Role</label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" name="member_identity[]"
                                                        value="{{ isset($identities[$i]) ? $identities[$i] : '' }}" placeholder="Identity No./KTP/Passport" required />
                                                        <label for="floatingInput">Identity No./KTP/Passport</label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" name="member_domicile[]"
                                                            value="{{ $domiciles[$i] }}" placeholder="Member Domicile" required />
                                                        <label for="floatingInput">Domicile</label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control @error('member_email.*') is-invalid @enderror" id="floatingInput" name="member_email[]"
                                                            value="{{ $emails[$i] }}" placeholder="Member Email" required />
                                                            @error('member_email.*')
                                                                <div class="invalid-feedback">Please fill with valid email address.</div>
                                                            @enderror
                                                        <label for="floatingInput">Email</label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="floatingInput" name="member_date_of_birth[]"
                                                            value="{{ $date_of_births[$i] }}" placeholder="Member Date of Birth" required />
                                                        <label for="floatingInput">Date of Birth</label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" name="member_profession[]"
                                                            value="{{ $professions[$i] }}" placeholder="Member Profession" required />
                                                        <label for="floatingInput">Profession</label>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-lg-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingInput" name="member_github_url[]"
                                                            value="{{ $github_urls[$i] }}" placeholder="Github Link" />
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
                                                            value="{{ $linkedin_urls[$i] }}" placeholder="CV Document or LinkedIn Link" />
                                                        <label for="floatingInput">CV Document or LinkedIn Link</label>
                                                        <div id="floatingInputLink" class="form-text text-white">
                                                            https://linkedin.com/in/username
                                                        </div>
                                                        <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                @if ($i != 0)
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-danger remove-member-btn">Remove Member</button>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endfor
                                @endforeach
                                <!-- Team members will be dynamically added here -->
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success" type="button" id="add-member-btn">Add Team Member</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <hr class="my-3">
                            <h5>Additional Information</h5>
                            <div id="links">
                                @foreach($members as $member)
                                    @php
                                        $project_links = json_decode($member->project_link);
                                        $project_descs = json_decode($member->project_desc);
                                    @endphp

                                    @for ($i = 0; $i < count($project_links ?? []); $i++)
                                        <div class="mb-3 section-content p-2">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" name="project_link[]"
                                                            value="{{ isset($project_links[$i]) ? $project_links[$i] : '' }}" placeholder="Link"
                                                            aria-describedby="floatingInputLink" />
                                                            <label for="floatingInput">Link (Github/Website/Drive/Other Link)</label>
                                                            <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" name="project_desc[]"
                                                            value="{{ $project_descs[$i] }}" placeholder="Description"
                                                            aria-describedby="floatingInputLink" />
                                                            <label for="floatingInput">Description</label>
                                                            <div class="invalid-feedback"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="button" class="btn btn-danger remove-link-btn">Remove Link</button>
                                            </div>
                                        </div>
                                    @endfor
                                @endforeach
                                <!-- Team links will be dynamically added here -->
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success" type="button" id="add-link-btn">Add Link</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <hr class="my-3">
                            <h5>Proposal (PDF max. 50mb)</h5>
                            @if (Auth::user()->project_file != null)
                                <div class="mb-3">
                                    <p class="mb-0">
                                        Uploaded Proposal File: 
                                        <a class="text-white" href="{{ asset('/storage/save/' . Auth::user()->project_file) }}" target="_blank">
                                            <u><strong>{{ Auth::user()->project_file }}</strong></u>
                                        </a>
                                    </p>
                                    <label>
                                        <input type="radio" name="change_file" value="no" checked> Keep current file
                                    </label>
                                    <label>
                                        <input type="radio" name="change_file" value="yes"> Upload new file
                                    </label>
                                    <div id="new-file-upload" style="display: none;">
                                        <label for="project_file" class="drop-zone">
                                            <span class="drop-zone__prompt">Drag & Drop or click here to choose new .pdf file</span>
                                            <input type="file" name="project_file" id="project_file" class="drop-zone__input" accept=".pdf" style="display: none;">
                                        </label>
                                        <div class="file-preview"></div>
                                    </div>
                                </div>
                            @else
                                <label for="project_file" class="drop-zone">
                                    <span class="drop-zone__prompt">Drag & Drop or click here to choose .pdf file</span>
                                    <input type="file" name="project_file" id="project_file" class="drop-zone__input" accept=".pdf" style="display: none;" placeholder="File Project">
                                    <div class="invalid-feedback">Project file is required</div>
                                </label>
                                <div class="file-preview"></div>
                            @endif
                        </div>
                    </div>
                    
                    <input type="hidden" name="submitted" id="submittedInput" value="" placeholder="Team Name">
                    <div class="text-center mt-5">
                        <button class="btn btn-success" name="action" value="save" id="saveButton">Save Form</button>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="button" class="btn btn-primary" id="submitButton" data-bs-toggle="modal" data-bs-target="@if (Auth::user()->otp_verified_at == null) #verifyModal @else #confirmModal @endif">Submit</button>
            </div>
        </form>
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

<!-- Validation and Submit JS -->
<script>
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
</script>

<!-- Add member JS -->
<script>
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
</script>

<!-- Add link JS -->
<script>
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
</script>

<!-- Upload File JS -->
<script>
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
</script>
<script>
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
</script>

<script>
    // Inisialisasi semua tooltip di halaman
    document.addEventListener("DOMContentLoaded", function(){
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(function (tooltipTriggerEl) {
            new bootstrap.Tooltip(tooltipTriggerEl)
        })
    });
</script>
