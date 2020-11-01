@extends('admin.layouts.default')
@section('title', 'Update Article')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Update Articles</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('articles.index') }}" role="button">Articles Listing</a>
            </div>
            <form action="{{ route('articles.update', $article->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body card-block">

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="title" class=" form-control-label">Title</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') ? old('title') : $article->title }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="d_ate" class=" form-control-label">Project Date</label></div>
                            <div class="col-12 col-md-3">
                                <input type="date" id="d_ate" name="d_ate" class="form-control @error('d_ate') is-invalid @enderror" value="{{ old('d_ate') ? old('d_ate') : $article->d_ate }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="description" class="form-control-label">Description</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $article->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="photo" class=" form-control-label">Photo</label></div>
                            <div class="col-12 col-md-6">
                                <input type="file" accept="image/*" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror" value="{{ $article->photo }}">
                                <input type="hidden" id="hidden_file" name="hidden_file" value="{{$article->getOriginal('photo')}}">
                            </div>
                            <div class="col col-md-3">
                                @php
                                    $photosrc = ( $article->photo == url('/storage') ? asset('admin/images/default.png') : url($article->photo) );
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
<script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        height: 500,
        selector: 'textarea#description',
        relative_urls : false,
        remove_script_host : false,
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
        image_advtab: true ,

        external_filemanager_path:"{{asset('admin/assets/filemanager')."/"}}",
        filemanager_title:"File Manager" ,
        external_plugins: { "filemanager" : "{{asset('admin/assets/vendor/tinymce/plugins/responsivefilemanager/plugin.min.js')}}"}
    });
</script>
@endpush