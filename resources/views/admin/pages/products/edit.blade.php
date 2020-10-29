@extends('admin.layouts.default')
@section('title', 'Edit Product')
@section('content')
	<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Edit Product</strong>
                <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('products.index') }}" role="button">Product Listing</a>
            </div>
            <form action="{{ route('products.update', $product->id) }}" method="POST" class="form-horizontal">
                @method('PUT')
                @csrf
                <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Product Name</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $product->name }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="description" class="form-control-label">Description</label></div>
                            <div class="col-12 col-md-9">
                                <textarea name="description" id="description" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $product->description }}</textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="price" class=" form-control-label">Price</label></div>
                            <div class="col-12 col-md-4">
                                <input type="number" id="price" name="price" class="form-control text-right @error('price') is-invalid @enderror" value="{{ old('price') ? old('price') : $product->price }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="UOM" class=" form-control-label">UOM</label></div>
                            <div class="col-12 col-md-4">
                                <input type="text" id="UOM" name="UOM" class="form-control @error('UOM') is-invalid @enderror" value="{{ old('UOM') ? old('UOM') : $product->UOM }}" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="currency_code" class=" form-control-label">Currency Code</label></div>
                            <div class="col-12 col-md-4">
                                <input type="text" id="currency_code" name="currency_code" class="form-control @error('currency_code') is-invalid @enderror" value="{{ old('currency_code') ? old('currency_code') : $product->currency_code }}">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="activeYN" class=" form-control-label">Active YN?</label></div>
                            <div class="col-12 col-md-2">
                                <select name="activeYN" class="form-control">
                                    <option {{ ($product->activeYN == "0" ? "selected" : "") }} value="0">No</option>
                                    <option {{ ($product->activeYN == "1" ? "selected" : "") }} value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="best_priceYN" class=" form-control-label">Active YN?</label></div>
                            <div class="col-12 col-md-2">
                                <select name="best_priceYN" class="form-control">
                                    <option {{ ($product->best_priceYN == "0" ? "selected" : "") }} value="0">No</option>
                                    <option {{ ($product->best_priceYN == "1" ? "selected" : "") }} value="1">Yes</option>
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
@endpush

@push('after-script')
<script src="{{ asset('admin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script>
    /*tinymce.init({
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
    });*/



    tinymce.init({
      selector: 'textarea#description',
      height: 400,
      menubar: false,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste code help wordcount'
      ],
      toolbar: 'undo redo | formatselect | ' +
      'bold italic backcolor | alignleft aligncenter ' +
      'alignright alignjustify | bullist numlist outdent indent | ' +
      'removeformat | help',
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });
</script>
@endpush