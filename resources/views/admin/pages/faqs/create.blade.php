@extends('admin.layouts.default')
@section('title', 'Create FAQ')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create FAQ</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('faqs.index') }}" role="button">FAQ Listing</a>
            </div>
            <form action="{{ route('faqs.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="question" class="form-control-label">Question</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="question" id="question" rows="5" class="form-control @error('question') is-invalid @enderror" required>{{ old('question') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="answer" class="form-control-label">Answer</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="answer" id="answer" rows="5" class="form-control @error('answer') is-invalid @enderror" required>{{ old('answer') }}</textarea>
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