<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <form action="{{ route('candidate.profile.basic-info.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-3">
                <x-image-preview :height="200" :width="200" :source="$candidate?->image" />
                <div class="form-group">
                    <label class="font-sm color-text-mutted mb-10">Upload Profile Picture *</label>
                    <input name="profile_picture" class="form-control {{ $errors->has('profile_picture') ? 'is-invalid' : '' }}"
                        type="file" value="">
                    <x-input-error :messages="$errors->get('profile_picture')" class="mt-2" />
                </div>

                {{-- <x-image-preview :height="200" :width="200" :source="$companyInfo?->logo" /> --}}
                    <div class="form-group">
                        <label class="font-sm color-text-mutted mb-10">Upload CV * <span class="text-primary">{{ $candidate?->cv ? 'Successfully attached.' : '' }}</span></label>
                        <input name="cv" class="form-control {{ $errors->has('cv') ? 'is-invalid' : '' }}"
                            type="file" value="">
                        <x-input-error :messages="$errors->get('cv')" class="mt-2" />
                    </div>
            </div>

            <div class="col-md-9">
                <div  class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Full Name *</label>
                            <input name="full_name" class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}"
                                type="text" value="{{ $candidate?->full_name }}">
                            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Title/Tagline *</label>
                            <input name="title" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                                type="text" value="{{ $candidate?->title }}">
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group select-style">
                            <label class="font-sm color-text-mutted mb-10">Experience Level *</label>

                                <select name="experience_level" id="" class="{{ $errors->has('experience_level') ? 'is-invalid' : '' }} form-icons select-active">

                                    @foreach ($experiences as $experience)
                                    <option @selected($experience->id === $candidate?->experience_id) value="{{ $experience->id }}">{{ $experience->name }}</option>
                                    @endforeach
                                </select>
                            <x-input-error :messages="$errors->get('experience_level')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Website *</label>
                            <input name="website" class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                type="text" value="{{ $candidate?->website }}">
                            <x-input-error :messages="$errors->get('website')" class="mt-2" />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="font-sm color-text-mutted mb-10">Date of Birth *</label>
                            <input name="date_of_birth" class="form-control datepicker {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}"
                                type="text" value="{{ $candidate?->birth_date }}">
                            <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="box-button mt-15">
            <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
        </div>
    </form>
</div>
