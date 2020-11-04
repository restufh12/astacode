@extends('admin.layouts.default')
@section('title', 'Create Skill')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Create Skill</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('skills.index') }}" role="button">Skill Listing</a>
            </div>
            <form action="{{ route('skills.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="skill_name" class=" form-control-label">Skill</label></div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="skill_name" name="skill_name" class="form-control @error('skill_name') is-invalid @enderror" value="{{ old('skill_name') }}" required>
                        </div>
                    </div>
                </div>
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="skill_name" class=" form-control-label">Score</label></div>
                        <div class="col-12 col-md-9">
                            <input name="skill_score" id="skill_score" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0"/ required="">
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/css/bootstrap-slider.min.css" integrity="sha512-3q8fi8M0VS+X/3n64Ndpp6Bit7oXSiyCnzmlx6IDBLGlY5euFySyJ46RUlqIVs0DPCGOypqP8IRk/EyPvU28mQ==" crossorigin="anonymous" />
@endpush

@push('after-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/11.0.2/bootstrap-slider.min.js"></script>
<script>
    var $ = jQuery;
    $("#skill_score").slider({
        tooltip: 'always'
    });
</script>
@endpush