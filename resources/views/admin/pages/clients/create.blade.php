@extends('admin.layouts.default')
@section('title', 'Create Client')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create Client</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('clients.index') }}" role="button">Client Listing</a>
            </div>
            <form action="{{ route('clients.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="logo" class=" form-control-label">Logo</label></div>
                            <div class="col-12 col-md-9">
                                <input type="file" accept="image/*" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="description" class="form-control-label">Description</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="url" class=" form-control-label">Company URL</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ old('url') }}">
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-md">
                        <i class="fa fa-dot-circle-o"></i> Create
                    </button>
                    <button type="reset" class="btn btn-danger btn-md">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('after-style')
@endpush

@push('after-script')
@endpush