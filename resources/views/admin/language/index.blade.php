@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Language</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Languages</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.languages.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                    <div class="input-group-btn">
                                        <button type="submit" style="height: 40px;" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('admin.languages.create') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i>Create New</a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th style="width: 20%">Action</th>
                                </tr>
                                <tbody>
                                    @forelse ($languages as $language)
                                    <tr>
                                        <td>{{ $language->name }}</td>
                                        <td>{{ $language->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.languages.edit', $language->id) }}" class="btn-small btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.languages.destroy', $language->id) }}" class="btn-small btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center">No result found!</td>
                                    </tr>
                                    @endforelse


                                </tbody>

                            </table>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <nav class="d-inline-block">
                            @if($languages->hasPages())
                                {{ $languages->withQueryString()->links() }}
                            @endif
                        </nav>

                      </div>

                </div>
            </div>
        </div>
    </section>

@endsection
