@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Cities</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update City</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.cities.update', $cities->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <lable for="">Country</lable>
                                        <select name="country" id="" class="form-control select2 {{ hasError($errors, 'country') }}">
                                            <option value="">Select</option>
                                            @foreach ($countries as $country)
                                            <option @selected($cities->country_id === $country->id) value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <lable for="">State</lable>
                                        <select name="state" id="" class="form-control select2 {{ hasError($errors, 'state') }}">
                                            <option value="">Select</option>
                                            @foreach ($states as $state)
                                            <option @selected($cities->state_id === $state->id) value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <lable for="">City Name</lable>
                                        <input type="text" class="form-control {{ hasError($errors, 'name') }}" name="name" value="{{ old('name', $cities->name) }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
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
