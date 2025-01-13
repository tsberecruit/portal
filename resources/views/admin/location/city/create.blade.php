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
                        <h4>Create a City</h4>

                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.cities.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable for="">Country</lable>
                                        <select name="country" id="" class="form-control select2 country {{ hasError($errors, 'country') }}">
                                            <option value="">Select</option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable for="">State</lable>
                                        <select name="state" id="" class="form-control select2 state {{ hasError($errors, 'state') }}">
                                            <option value="">Select</option>

                                        </select>
                                        <x-input-error :messages="$errors->get('state')" class="mt-2" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <lable for="">City Name</lable>
                                        <input type="text" class="form-control {{ hasError($errors, 'city') }}" name="city" value="{{ old('city') }}">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('.country').on('change', function() {
            let country_id = $(this).val();

            $.ajax({
                method: 'GET',
                url: '{{ route("admin.get-states", ":id") }}'.replace(":id", country_id),
                data: {},
                success: function(response) {
                    let html = '';

                    $.each(response, function(index, value) {
                        html += `<option value"$(value.id)" >${value.name}</option>`
                    });
                    $('.state').html(html);

                },
                error: function(xhr, status, error) {

                }

            })
        })
    })
</script>
@endpush
