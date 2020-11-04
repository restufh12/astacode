@extends('admin.layouts.default')
@section('title', 'Edit Reason')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit Reason</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('reasons.index') }}" role="button">Reason Listing</a>
            </div>
            <form action="{{ route('reasons.update', $reason->id) }}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="reason" class="form-control-label">Reason</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="reason" id="reason" rows="5" class="form-control @error('reason') is-invalid @enderror" required>{{ old('reason') ? old('reason') : $reason->reason }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="description" class="form-control-label">Description</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') ? old('description') : $reason->description }}</textarea>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-md">
                        <i class="fa fa-dot-circle-o"></i> Update
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