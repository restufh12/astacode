@extends('admin.layouts.default')
@section('title', 'Create Portfolio')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create Portfolio</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('portfolios.index') }}" role="button">Portfolio Listing</a>
            </div>
            <form action="{{ route('portfolios.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="project_name" class=" form-control-label">Project Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="project_name" name="project_name" class="form-control @error('project_name') is-invalid @enderror" value="{{ old('project_name') }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="category" class=" form-control-label">Category</label></div>
                            <div class="col-12 col-md-4">
                                <select name="category" id="category" class="form-control" required>
                                    <option value=""></option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->category}}">{{$category->category}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="client_id" class=" form-control-label">Client</label></div>
                            <div class="col-12 col-md-4">
                                <select name="client_id" id="client_id" class="form-control" required>
                                    <option value=""></option>
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="project_date" class=" form-control-label">Project Date</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" id="project_date" name="project_date" class="form-control @error('project_date') is-invalid @enderror" value="{{ old('project_date') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="project_url" class=" form-control-label">Project URL</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="project_url" name="project_url" class="form-control @error('project_url') is-invalid @enderror" value="{{ old('project_url') }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="project_desc" class="form-control-label">Description</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="project_desc" id="project_desc" rows="5" class="form-control @error('project_desc') is-invalid @enderror">{{ old('project_desc') }}</textarea>
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection--single{
        height: 38px !important;
        padding: 5px !important;
    }
</style>
@endpush

@push('after-script')
<script>
    var $ = jQuery;
    $(document).ready(function() {
        $('#category').select2({
            tags: true
        });
        $('#client_id').select2();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endpush