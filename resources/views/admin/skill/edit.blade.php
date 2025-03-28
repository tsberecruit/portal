@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Professions</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Skill</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.skills.update', $skill->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <lable for="">Name</lable>
                                <input type="text" class="form-control {{ hasError($errors, 'name') }}" name="name" value="{{ old('name', $skill->name) }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
