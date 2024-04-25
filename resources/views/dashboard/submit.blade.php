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
                            Please Complete Your Profile Before Submit
                        </p>

                        <a href="/profile" class="btn btn-sm btn-outline-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="card mb-4">
            <h4 class="card-header">Submit Your Project</h4>
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
                                                    <select class="form-select" id="role" aria-label="Select Role" name="member_role[]" required>
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
                                                        aria-describedby="floatingInputLink" required />
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
                                                        aria-describedby="floatingInputLink" required />
                                                    <label for="floatingInput">LinkedIn Link</label>
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
                                        $domiciles = json_decode($member->member_domicile);
                                    @endphp

                                    @for ($i = 0; $i < count($project_links ?? []); $i++)
                                    <div class="mb-3 section-content p-2">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInput" name="project_link[]"
                                                        value="{{ isset($project_links[$i]) ? $project_links[$i] : '' }}" placeholder="https://"
                                                        aria-describedby="floatingInputLink" required />
                                                    <label for="floatingInput">Link (Github/Website/Drive/Other Link)</label>
                                                    <div id="floatingInputLink" class="form-text">
                                                        https://github.com/username
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="floatingInput" name="project_desc[]"
                                                        value="{{ isset($project_descs[$i]) ? $project_descs[$i] : '' }}" placeholder="This project is about.."
                                                        aria-describedby="floatingInputLink" required />
                                                    <label for="floatingInput">Description</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <button type="button" class="btn btn-danger remove-link-btn">Remove Item</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endfor
                                @endforeach
                                <!-- Project Links will be dynamically added here -->
                            </div>
                            <div class="text-center mb-5">
                                <button class="btn btn-success d-block" type="button" id="add-link-btn">Add Link</button>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <hr class="my-3">
                            <h5>Proposal (PDF)</h5>
                            <label for="project_file" class="drop-zone">
                                <span class="drop-zone__prompt">Drag & Drop or click here to choose .pdf file</span>
                                <input type="file" name="project_file" id="project_file" class="drop-zone__input" accept=".pdf" style="display: none;" required>
                            </label>
                            <div class="file-preview"></div>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        @if (Auth::user()->project_desc == null)
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
        var currentMembers = {{ $count }};
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
                                    <select class="form-select" id="role" aria-label="Select Role" name="member_role[]" required>
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
                                        aria-describedby="floatingInputLink" required />
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
                                        aria-describedby="floatingInputLink" required />
                                    <label for="floatingInput">LinkedIn Link</label>
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

        document.getElementById('team-members').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-member-btn')) {
                e.target.parentElement.parentElement.remove();
                currentMembers--;
                toggleAddMemberButton();
            }
        });
    });
</script>

<!-- Add link JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var maxLinks = 9;
        var currentLinks = 0;

        document.getElementById('add-link-btn').addEventListener('click', function () {
            if (currentLinks < maxLinks) {
                var linksContainer = document.getElementById('links');
                var newLinkDiv = document.createElement('div');
                newLinkDiv.innerHTML = `
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
                `;
                linksContainer.appendChild(newLinkDiv);
                currentLinks++;
            }
        });

        document.getElementById('links').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-link-btn')) {
                e.target.parentElement.parentElement.remove();
                currentLinks--;
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