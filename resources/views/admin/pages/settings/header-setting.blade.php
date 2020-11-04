@extends('admin.layouts.default')
@section('title', 'Header Setting')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit Header Setting</strong>
            </div>
            <form action="{{ route('header.settings.update', $header->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="about_us" class="form-control-label">About Us</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="about_us" id="about_us" rows="5" class="form-control @error('about_us') is-invalid @enderror" required>{{ old('about_us') ? old('about_us') : $header->about_us }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="why_us" class="form-control-label">Why Us</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="why_us" id="why_us" rows="5" class="form-control @error('why_us') is-invalid @enderror" required>{{ old('why_us') ? old('why_us') : $header->why_us }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="skills" class="form-control-label">Skills</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="skills" id="skills" rows="5" class="form-control @error('skills') is-invalid @enderror" required>{{ old('skills') ? old('skills') : $header->skills }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="services" class="form-control-label">Services</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="services" id="services" rows="5" class="form-control @error('services') is-invalid @enderror" required>{{ old('services') ? old('services') : $header->services }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="call_to_action" class="form-control-label">Call To Action</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="call_to_action" id="call_to_action" rows="5" class="form-control @error('call_to_action') is-invalid @enderror" required>{{ old('call_to_action') ? old('call_to_action') : $header->call_to_action }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="portfolios" class="form-control-label">Portfolios</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="portfolios" id="portfolios" rows="5" class="form-control @error('portfolios') is-invalid @enderror" required>{{ old('portfolios') ? old('portfolios') : $header->portfolios }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="teams" class="form-control-label">Teams</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="teams" id="teams" rows="5" class="form-control @error('teams') is-invalid @enderror" required>{{ old('teams') ? old('teams') : $header->teams }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="pricing" class="form-control-label">Pricing</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="pricing" id="pricing" rows="5" class="form-control @error('pricing') is-invalid @enderror" required>{{ old('pricing') ? old('pricing') : $header->pricing }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="faqs" class="form-control-label">Faqs</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="faqs" id="faqs" rows="5" class="form-control @error('faqs') is-invalid @enderror" required>{{ old('faqs') ? old('faqs') : $header->faqs }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="testimonials" class="form-control-label">Testimonials</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="testimonials" id="testimonials" rows="5" class="form-control @error('testimonials') is-invalid @enderror" required>{{ old('testimonials') ? old('testimonials') : $header->testimonials }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="articles" class="form-control-label">Articles</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="articles" id="articles" rows="5" class="form-control @error('articles') is-invalid @enderror" required>{{ old('articles') ? old('articles') : $header->articles }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="contact" class="form-control-label">Contact</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="contact" id="contact" rows="5" class="form-control @error('contact') is-invalid @enderror" required>{{ old('contact') ? old('contact') : $header->contact }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="join_our_newsletter" class="form-control-label">Join Our Newsletter</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="join_our_newsletter" id="join_our_newsletter" rows="5" class="form-control @error('join_our_newsletter') is-invalid @enderror" required>{{ old('join_our_newsletter') ? old('join_our_newsletter') : $header->join_our_newsletter }}</textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="our_social_network" class="form-control-label">Our Social Network</label></div>
                        <div class="col-12 col-md-9">
                            <textarea name="our_social_network" id="our_social_network" rows="5" class="form-control @error('our_social_network') is-invalid @enderror" required>{{ old('our_social_network') ? old('our_social_network') : $header->our_social_network }}</textarea>
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
<script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">  

	// NOTIFICATION
    @if(Session::has('message'))
        toastr.options.positionClass = 'toast-bottom-right';
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>
@endpush