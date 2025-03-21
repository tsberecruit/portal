
@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Job Category</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Job Category</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.job-categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Icon</label>
                                <div role="iconpicker" data-align="left" name="icon" class="{{ hasError($errors, 'icon') }}" data-icon="{{ $category->icon }}"></div>
                                <x-input-error :messages="$errors->get('icon')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control {{ hasError($errors, 'name') }}" name="name" value="{{ old('name', $category->name) }}">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label for="">Show At Popular</label>
                                <select name="show_at_popular"  class="form-control {{ hasError($errors, 'show_at_popular') }}" >
                                    <option @selected($category->show_at_popular === 0) value="0">No</option>
                                    <option @selected($category->show_at_popular === 1) value="1">Yes</option>
                                </select>
                                <x-input-error :messages="$errors->get('show_at_popular')" class="mt-2" />
                            </div>
                            <div class="form-group">
                                <label for="">Show At Featured</label>
                                <select name="show_at_featured"  class="form-control {{ hasError($errors, 'show_at_featured') }}" >
                                    <option @selected($category->show_at_featured === 0) value="0">No</option>
                                    <option @selected($category->show_at_featured === 1) value="1">Yes</option>

                                </select>
                                <x-input-error :messages="$errors->get('show_at_featured')" class="mt-2" />
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
