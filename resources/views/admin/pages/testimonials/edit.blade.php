@extends('admin.layouts.default')
@section('title', 'Update Testimonial')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Update Testimonial</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('testimonials.index') }}" role="button">Testimonial Listing</a>
            </div>
            <form action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body card-block">

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $testimonial->name }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="notes" class="form-control-label">Notes</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="notes" id="notes" rows="5" class="form-control @error('notes') is-invalid @enderror" required>{{ old('notes') ? old('notes') : $testimonial->notes }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
                            <div class="col-12 col-md-6">
                                <input type="file" accept="image/*" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ $testimonial->photo }}">
                                <input type="hidden" id="hidden_file" name="hidden_file" value="{{$testimonial->getOriginal('photo')}}">
                            </div>
                            <div class="col col-md-3">
                                @php
                                    $photosrc = ( $testimonial->photo == url('/storage') ? asset('admin/images/default.png') : url($testimonial->photo) );
                                @endphp
                                <img src="{{ $photosrc }}" class="img-thumbnail custom-w-100"/>
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