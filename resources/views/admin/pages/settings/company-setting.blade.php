@extends('admin.layouts.default')
@section('title', 'Company Setting')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit Company Setting</strong>
            </div>
            <form action="{{ route('company.settings.update', $setting->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="company_name" class=" form-control-label">Company Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="company_name" name="company_name" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') ? old('company_name') : $setting->company_name }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="company_logo" class=" form-control-label">Company Logo</label></div>
                            <div class="col-12 col-md-6">
                                <input type="file" accept="image/*" id="company_logo" name="company_logo" class="form-control @error('company_logo') is-invalid @enderror" value="{{ $setting->company_logo }}">
                                <input type="hidden" id="hidden_file" name="hidden_file" value="{{$setting->getOriginal('company_logo')}}">
                            </div>
                            <div class="col col-md-3">
                                @php
                                    $photosrc = ( $setting->company_logo == url('/storage') ? asset('admin/images/default.png') : url($setting->company_logo) );
                                @endphp
                                <img src="{{ $photosrc }}" class="img-thumbnail custom-w-100"/>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="company_address" class="form-control-label">Company Address</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="company_address" id="company_address" rows="5" class="form-control @error('company_address') is-invalid @enderror" required>{{ old('company_address') ? old('company_address') : $setting->company_address }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="company_email" class=" form-control-label">Company Email</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="company_email" name="company_email" class="form-control @error('company_email') is-invalid @enderror" value="{{ old('company_email') ? old('company_email') : $setting->company_email }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="company_tel" class=" form-control-label">Company Telephone</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="company_tel" name="company_tel" class="form-control @error('company_tel') is-invalid @enderror" value="{{ old('company_tel') ? old('company_tel') : $setting->company_tel }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="company_wa" class=" form-control-label">Company WA</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="company_wa" name="company_wa" class="form-control @error('company_wa') is-invalid @enderror" value="{{ old('company_wa') ? old('company_wa') : $setting->company_wa }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="longitude" class=" form-control-label">Longitude</label></div>
                            <div class="col-12 col-md-3">
                                <input type="text" id="longitude" name="longitude" class="form-control @error('longitude') is-invalid @enderror" value="{{ old('longitude') ? old('longitude') : $setting->longitude }}" required>
                            </div>
                            <div class="col col-md-2"><label for="latitude" class=" form-control-label">Latitude</label></div>
                            <div class="col-3 col-md-3">
                                <input type="text" id="latitude" name="latitude" class="form-control @error('latitude') is-invalid @enderror" value="{{ old('latitude') ? old('latitude') : $setting->latitude }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="google_maps_iframe" class="form-control-label">Google Maps Frame</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="google_maps_iframe" id="google_maps_iframe" rows="5" class="form-control @error('google_maps_iframe') is-invalid @enderror" required>{{ old('google_maps_iframe') ? old('google_maps_iframe') : $setting->google_maps_iframe }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="link_twitter" class=" form-control-label">Link Twitter</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link_twitter" name="link_twitter" class="form-control @error('link_twitter') is-invalid @enderror" value="{{ old('link_twitter') ? old('link_twitter') : $setting->link_twitter }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="link_instagram" class=" form-control-label">Link Instagram</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link_instagram" name="link_instagram" class="form-control @error('link_instagram') is-invalid @enderror" value="{{ old('link_instagram') ? old('link_instagram') : $setting->link_instagram }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="link_facebook" class=" form-control-label">Link Facebook</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link_facebook" name="link_facebook" class="form-control @error('link_facebook') is-invalid @enderror" value="{{ old('link_facebook') ? old('link_facebook') : $setting->link_facebook }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="link_linkedin" class=" form-control-label">Link Linkedin</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link_linkedin" name="link_linkedin" class="form-control @error('link_linkedin') is-invalid @enderror" value="{{ old('link_linkedin') ? old('link_linkedin') : $setting->link_linkedin }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="link_skype" class=" form-control-label">Link Skype</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="link_skype" name="link_skype" class="form-control @error('link_skype') is-invalid @enderror" value="{{ old('link_skype') ? old('link_skype') : $setting->link_skype }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="slogan" class="form-control-label">Slogan</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="slogan" id="slogan" rows="5" class="form-control @error('slogan') is-invalid @enderror" required>{{ old('slogan') ? old('slogan') : $setting->slogan }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="sub_slogan" class="form-control-label">Sub Slogan</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="sub_slogan" id="sub_slogan" rows="5" class="form-control @error('sub_slogan') is-invalid @enderror" required>{{ old('sub_slogan') ? old('sub_slogan') : $setting->sub_slogan }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="video_url" class=" form-control-label">Video URL</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="video_url" name="video_url" class="form-control @error('video_url') is-invalid @enderror" value="{{ old('video_url') ? old('video_url') : $setting->video_url }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="about_us" class="form-control-label">About Us</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="about_us" id="about_us" rows="5" class="form-control @error('about_us') is-invalid @enderror">{{ old('about_us') ? old('about_us') : $setting->about_us }}</textarea>
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
	var $ = jQuery;
	$("#longitude").change(function () {
	    // var lngVal = /^-?((1?[0-7]?|[0-9]?)[0-9]|180)\.[0-9]{1,6}$/;
	    var lngVal = /^-?(\d*\.)?\d*$/;
	    if (!lngVal.test(this.value)) {
	    	$("#longitude").val('');
	       	alert('Please enter valid longitude');
	    }
	});
	$("#latitude").change(function () {
	    // var latVal = /^-?([0-8]?[0-9]|90)\.[0-9]{1,6}$/;
	    var latVal = /^-?(\d*\.)?\d*$/;
	    if (!latVal.test(this.value)) {
	    	$("#latitude").val('');
	       	alert('Please enter valid latitude');
	    }
	});

	tinymce.init({
	  selector: 'textarea#about_us',
	  height: 400,
	  menubar: 'file edit view insert format tools table tc help',
	  plugins: [
	    'advlist autolink lists link image charmap print preview anchor',
	    'searchreplace visualblocks code fullscreen',
	    'insertdatetime media table paste code help wordcount'
	  ],
	  toolbar: 'undo redo | formatselect | ' +
	  'bold italic backcolor | alignleft aligncenter ' +
	  'alignright alignjustify | bullist numlist outdent indent | ' +
	  'removeformat | help | table',
	  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
	});

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