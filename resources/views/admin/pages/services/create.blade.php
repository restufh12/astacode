@extends('admin.layouts.default')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                Create <strong>Service</strong>
            </div>
            <form action="{{ route('services.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="service_name" class=" form-control-label">Service Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="service_name" name="service_name" class="form-control @error('service_name') is-invalid @enderror" value="{{ old('service_name') }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="description" class="form-control-label">Description</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" rows="9" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="service_icon" class=" form-control-label">Service Icon</label></div>
                            <div class="col-12 col-md-4">
                                <input type="text" id="service_icon" name="service_icon" class="form-control @error('service_icon') is-invalid @enderror" readonly value="{{ old('service_icon') }}" required>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-md">
                        <i class="fa fa-dot-circle-o"></i> Submit
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
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/simple-iconpicker/simple-iconpicker.min.css') }}">
@endpush

@push('after-script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="{{ asset('admin/assets/vendor/simple-iconpicker/simple-iconpicker.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      $('#service_icon').iconpicker("#service_icon");
    });
</script>
@endpush