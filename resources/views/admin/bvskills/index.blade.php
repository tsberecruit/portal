@extends('admin.layouts.master')

@section('contents')
    <section class="section">
        <div class="section-header">
            <h1>Behavioural Skills</h1>
        </div>

        <div class="section-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Behavioural Skills</h4>
                        <div class="card-header-form">
                            <form action="{{ route('admin.bvskills.index') }}" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                    <div class="input-group-btn">
                                        <button type="submit" style="height: 40px;" class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a href="{{ route('admin.bvskills.create') }}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i>Create New</a>
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
                                    @forelse ($bvskills as $bvskill)
                                    <tr>
                                        <td>{{ $bvskill->name }}</td>
                                        <td>{{ $bvskill->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.bvskills.edit', $bvskill->id) }}" class="btn-small btn btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.bvskills.destroy', $bvskill->id) }}" class="btn-small btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
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
                            @if($bvskills->hasPages())
                                {{ $bvskills->withQueryString()->links() }}
                            @endif
                        </nav>

                      </div>

                </div>
            </div>
        </div>
    </section>

@endsection
