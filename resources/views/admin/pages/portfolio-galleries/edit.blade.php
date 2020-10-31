@extends('admin.layouts.default')
@section('title', 'Edit Portfolio Gallery')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit Portfolio Gallery</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('portfolio-galleries.index') }}" role="button">Portfolio Gallery Listing</a>
            </div>
            <form action="{{ route('portfolio-galleries.update', $portfolio_gallery->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body card-block">
                   <div class="row form-group">
                        <div class="col col-md-3"><label for="portfolio_id" class=" form-control-label">Project Name</label></div>
                        <div class="col-12 col-md-9">
                            <select name="portfolio_id" id="portfolio_id" class="form-control" required>
                                <option value=""></option>
                                @foreach($portfolios as $portfolio)
                                    @php
                                        if($portfolio->id==$portfolio_gallery->portfolio_id){
                                            $selected = "selected";
                                        } else {
                                            $selected = "";
                                        }
                                    @endphp
                                    <option {{$selected}} value="{{$portfolio->id}}">{{$portfolio->project_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
                        <div class="col-12 col-md-6">
                            <input type="file" accept="image/*" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ $portfolio_gallery->photo }}">
                            <input type="hidden" id="hidden_file" name="hidden_file" value="{{$portfolio_gallery->getOriginal('photo')}}">
                        </div>
                        <div class="col col-md-3">
                            @php
                                $photosrc = ( $portfolio_gallery->photo == url('/storage') ? asset('admin/images/default.png') : url($portfolio_gallery->photo) );
                            @endphp
                            <img src="{{ $photosrc }}" class="img-thumbnail custom-w-100"/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="defaultYN" class=" form-control-label">Default Photo</label></div>
                        <div class="col-12 col-md-2">
                            <select name="defaultYN" class="form-control" required>
                                <option {{ ($portfolio_gallery->defaultYN == "0" ? "selected" : "") }} value="0">No</option>
                                <option {{ ($portfolio_gallery->defaultYN == "1" ? "selected" : "") }} value="1">Yes</option>
                            </select>
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
        $('#portfolio_id').select2();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endpush