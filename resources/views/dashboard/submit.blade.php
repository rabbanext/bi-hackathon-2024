@extends('dashboard.layouts.main')

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="section-title pb-2 my-5">
          <h2>Submission</h2>
          <p>Submit Proposal</p>
        </div>
        @if (Auth::user()->otp_verified_at == null && Auth::user()->type == "user")
            <div class="section-content mb-3">
              <div class="d-flex align-items-end row">
                <div class="col-sm-8">
                    <h5 class="card-title">Verify Your WhatsApp Number</h5>
                    <div class="card-body">
                        <p class="mb-4">
                          Please Verify Your WhatsApp Number (<strong>0{{ Auth::user()->nowa }}</strong>)
                        </p>
                        <a href="/verify-wa" class="btn btn-sm btn-info">Verify Your WhatsApp Number</a>
                    </div>
                </div>
              </div>
            </div>
        @else
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
            <div class="section-content mb-4">
                <div class="card-body">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                    @endif
                    <form action="{{ route('posts.update',Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <!-- Team Name -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="team_name" value="{{ Auth::user()->team_name }}" placeholder="Team Name" aria-describedby="floatingInputLink" required />
                                    <label for="team_name">Team Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Institution -->
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="institution" value="{{ Auth::user()->institution }}" placeholder="Institution/Organization/Community" aria-describedby="floatingInputLink" required />
                                    <label for="institution">Institution/Organization/Community</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <hr class="my-3">
                                <h5>Team Members (max. 4):</h5>
                                <div id="team-members">
                                    @foreach($members as $member)
                                        @php
                                            $names = json_decode($member->member_name);
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
                                                                value="{{ isset($names[$i]) ? $names[$i] : '' }}" placeholder="John Doel"
                                                                aria-describedby="floatingInputLink" required />
                                                            <label for="floatingInput"><Map></Map>Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select role-select" aria-label="Select Role" name="member_role[]" required>
                                                                <option value="">Select Role</option>
                                                                <option value="leader" {{ $roles[$i] == 'leader' ? 'selected' : '' }}>Group Leader</option>
                                                                <option value="member" {{ $roles[$i] == 'member' ? 'selected' : '' }}>Member</option>
                                                            </select>
                                                            <label for="role">Role</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" name="member_domicile[]"
                                                                value="{{ $domiciles[$i] }}" placeholder="Jakarta"
                                                                aria-describedby="floatingInputLink" required />
                                                            <label for="floatingInput">Domicile</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="email" class="form-control" id="floatingInput" name="member_email[]"
                                                                value="{{ $emails[$i] }}" placeholder="johndoel@gmail.com"
                                                                aria-describedby="floatingInputLink" required />
                                                            <label for="floatingInput">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="date" class="form-control" id="floatingInput" name="member_date_of_birth[]"
                                                                value="{{ $date_of_births[$i] }}" placeholder="Date of Birth"
                                                                aria-describedby="floatingInputLink" required />
                                                            <label for="floatingInput">Date of Birth</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" name="member_profession[]"
                                                                value="{{ $professions[$i] }}" placeholder="Engineer"
                                                                aria-describedby="floatingInputLink" required />
                                                            <label for="floatingInput">Profession</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" name="member_github_url[]"
                                                                value="{{ $github_urls[$i] }}" placeholder="https://"
                                                                aria-describedby="floatingInputLink" />
                                                            <label for="floatingInput">Github Link</label>
                                                            <div id="floatingInputLink" class="form-text">
                                                                https://github.com/username
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" name="member_linkedin_url[]"
                                                                value="{{ $linkedin_urls[$i] }}" placeholder="https://"
                                                                aria-describedby="floatingInputLink" />
                                                            <label for="floatingInput">CV Document or LinkedIn Link</label>
                                                            <div id="floatingInputLink" class="form-text">
                                                                https://linkedin.com/in/username
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="button" class="btn btn-danger remove-member-btn">Remove Member</button>
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
                                                                value="{{ isset($project_links[$i]) ? $project_links[$i] : '' }}" placeholder="John Doel"
                                                                aria-describedby="floatingInputLink" required />
                                                            <label for="floatingInput"><Map></Map>project_link</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput" name="project_desc[]"
                                                                value="{{ $project_descs[$i] }}" placeholder="Jakarta"
                                                                aria-describedby="floatingInputLink" required />
                                                            <label for="floatingInput">project_desc</label>
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
                                <h5>Proposal (PDF)</h5>
                                @if (Auth::user()->project_file != null)
                                    <div class="mb-3">
                                        <p class="mb-0">Uploaded Proposal File: <a href="{{ asset('/storage/' . Auth::user()->project_file) }}" target="_blank">{{ Auth::user()->project_file }}</a></p>
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
                                        <input type="file" name="project_file" id="project_file" class="drop-zone__input" accept=".pdf" style="display: none;">
                                    </label>
                                    <div class="file-preview"></div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="text-center">
                            @if (Auth::user()->institution == null)
                                <button type="submit" class="btn btn-primary">Submit</button>
                            @else
                                <button type="submit" class="btn btn-primary">Update</button>
                            @endif
                        </div>
                    </form>
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

<!-- Add member JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var maxMembers = 4;
        var currentMembers = {{ $countMember }};
        var addMemberBtn = document.getElementById('add-member-btn');

        function toggleAddMemberButton() {
            if (currentMembers >= maxMembers) {
                addMemberBtn.style.display = 'none';
            } else {
                addMemberBtn.style.display = 'block';
            }
        }

        toggleAddMemberButton();

        addMemberBtn.addEventListener('click', function () {
            if (currentMembers < maxMembers) {
                var teamMembersContainer = document.getElementById('team-members');
                var newMemberDiv = document.createElement('div');
                newMemberDiv.innerHTML = `
                <div class="mb-3 section-content p-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="member_name[]"
                                        placeholder="John Doel"
                                        aria-describedby="floatingInputLink" required />
                                    <label for="floatingInput"><Map></Map>Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select role-select" aria-label="Select Role" name="member_role[]" required>
                                        <option value="">Select Role</option>
                                        <option value="leader">Group Leader</option>
                                        <option value="member">Member</option>
                                    </select>
                                    <label for="role">Role</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="member_domicile[]"
                                        placeholder="Jakarta"
                                        aria-describedby="floatingInputLink" required />
                                    <label for="floatingInput">Domicile</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingInput" name="member_email[]"
                                        placeholder="johndoel@gmail.com"
                                        aria-describedby="floatingInputLink" required />
                                    <label for="floatingInput">Email</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date" class="form-control" id="floatingInput" name="member_date_of_birth[]"
                                        placeholder="Date of Birth"
                                        aria-describedby="floatingInputLink" required />
                                    <label for="floatingInput">Date of Birth</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="member_profession[]"
                                        placeholder="Engineer"
                                        aria-describedby="floatingInputLink" required />
                                    <label for="floatingInput">Profession</label>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="member_github_url[]"
                                        placeholder="https://"
                                        aria-describedby="floatingInputLink" />
                                    <label for="floatingInput">Github Link</label>
                                    <div id="floatingInputLink" class="form-text">
                                        https://github.com/username
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="member_linkedin_url[]"
                                        placeholder="https://"
                                        aria-describedby="floatingInputLink" />
                                    <label for="floatingInput">CV Document or LinkedIn Link</label>
                                    <div id="floatingInputLink" class="form-text">
                                        https://linkedin.com/in/username
                                    </div>
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
                // If more than one leader is selected, deselect the last one
                if (leaderCount > 1) {
                    e.target.value = 'member';
                    alert('Only one team member can be the leader.');
                }
            }
        });

        document.getElementById('team-members').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-member-btn')) {
                e.target.parentElement.parentElement.remove();
                currentMembers--;
                toggleAddMemberButton();
            }
        });

        document.querySelector('form').addEventListener('submit', function (e) {
            // Get the number of team members
            var numberOfTeamMembers = document.querySelectorAll('[name^="member_name"]').length;

            // If there are no team members, clear all member_* fields
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
                                    value="" placeholder="https://"
                                    aria-describedby="floatingInputLink" required />
                                <label for="floatingInput">Link (Github/Website/Drive/Other Link)</label>
                                <div id="floatingInputLink" class="form-text">
                                    https://github.com/username/repository
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingInput" name="project_desc[]"
                                    value="" placeholder="This project is about.."
                                    aria-describedby="floatingInputLink" required />
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

        // If there are no links, clear all project_* fields
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