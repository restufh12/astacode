@extends('admin.layouts.default')
@section('title', 'Create Team')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create Team</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('teams.index') }}" role="button">Team Listing</a>
            </div>
            <form action="{{ route('teams.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="position" class=" form-control-label">Position</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ old('position') }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="notes" class="form-control-label">Notes</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="notes" id="notes" rows="5" class="form-control @error('notes') is-invalid @enderror" required>{{ old('notes') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="link_twitter" class=" form-control-label">Link Twitter</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link_twitter" name="link_twitter" class="form-control @error('link_twitter') is-invalid @enderror" value="{{ old('link_twitter') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="link_instagram" class=" form-control-label">Link Instagram</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link_instagram" name="link_instagram" class="form-control @error('link_instagram') is-invalid @enderror" value="{{ old('link_instagram') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="link_facebook" class=" form-control-label">Link Facebook</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link_facebook" name="link_facebook" class="form-control @error('link_facebook') is-invalid @enderror" value="{{ old('link_facebook') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="link_linkedin" class=" form-control-label">Link Linkedin</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link_linkedin" name="link_linkedin" class="form-control @error('link_linkedin') is-invalid @enderror" value="{{ old('link_linkedin') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
                            <div class="col-12 col-md-9">
                                <input type="file" accept="image/*" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ old('photo') }}" required>
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