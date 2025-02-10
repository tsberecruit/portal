<div class="tab-pane fade show" id="pills-experience" role="tabpanel" aria-labelledby="pills-experience-tab">
    <div>
        <div class="d-flex justify-content-between">
            <h4>Experience</h4>
            <button class="btn btn-primary" onclick="$('#ExperienceForm').trigger('reset'); editId = ''; editMode=false"
                data-bs-toggle="modal" data-bs-target="#experienceModal">Add Experience</button>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Period</th>
                    <th>Roles/Responsibilities</th>
                    <th style="width: 15%">Action</th>
                </tr>
            </thead>
            <tbody class="experience-tbody">
                @forelse ($candidateExperiences as $experience)
                    <tr>
                        <td>{{ $experience->job_title }}</td>
                        <td>{{ $experience->company }}</td>
                        <td>{{ $experience->department }}</td>
                        <td>{{ $experience->designation }}</td>
                        <td>{{ $experience->start }} -
                            {{ $experience->currently_working === 1 ? 'Current' : $experience->end }}
                        </td>
                        <td>{{ $experience->responsibilities }}</td>
                        <td>
                            <a href="{{ route('candidate.experience.edit', $experience->id) }}"
                                class="btn-sm btn btn-primary edit-experience" data-bs-toggle="modal"
                                data-bs-target="#experienceModal"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('candidate.experience.destroy', $experience->id) }}"
                                class="btn-sm btn btn-danger delete-experience"><i class="fas fa-trash-alt"></i></a>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Data Found</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>



    <br>
    <br>
    <div>
        <div class="d-flex justify-content-between">
            <h4>Education</h4>
            <button class="btn btn-primary" onclick="$('#EducationForm').trigger('reset'); editId = ''; editMode=false"
                data-bs-toggle="modal" data-bs-target="#educationModal">Add Education</button>
        </div>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Institution</th>
                    <th>Course</th>
                    <th>Lavel</th>
                    <th>Degree</th>
                    <th>Year</th>
                    <th style="width: 15%">Action</th>
                </tr>
            </thead>
            <tbody class="education-tbody">
            @forelse ($candidateEducation as $education)
                <tr>
                    <td>{{ $education->institution }}</td>
                    <td>{{ $education->course }}</td>
                    <td>{{ $education->level }}</td>
                    <td>{{ $education->degree }}</td>
                    <td>{{ $education->year }}</td>
                    <td>
                        <a href="{{ route("candidate.education.edit", $education->id) }}" class="btn-sm btn btn-primary edit-education"
                            data-bs-toggle="modal" data-bs-target="#educationModal"><i class="fas fa-edit"></i></a>
                        <a href="{{ route("candidate.education.destroy", $education->id) }}" class="btn-sm btn btn-danger delete-education"><i
                                class="fas fa-trash-alt"></i></a>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Data Found</td>
                </tr>
            @endforelse


            </tbody>
        </table>
    </div>

</div>
