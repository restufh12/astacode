@extends('admin.layouts.default')
@section('title', 'Portfolio Gallery Listing')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Portfolio Gallery - {{$portfolio->project_name}}</strong>
            <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('portfolio-galleries.create') }}" role="button"><i class="fa fa-plus"></i> Add Portfolio Gallery</a>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tablePortfolioGallery" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Project Name</th>
                        <th>Photo</th>
                        <th>Default</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($portfolio_galleries as $portfolio_gallery)
                    @php
                        $photosrc = ( $portfolio_gallery->photo == url('/storage') ? asset('admin/images/default.png') : url($portfolio_gallery->photo) );
                    @endphp
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $portfolio_gallery->portfolio->project_name }}</td>
                            <td class="custom-w-50"><img src="{{ $photosrc }}" class="img-thumbnail custom-w-50"/></td>
                            <td>{{ ($portfolio_gallery->defaultYN=="1"?"Yes" : "No") }}</td>
                            <td width="10%">
                                <a href="{{ route('portfolio-galleries.edit', $portfolio_gallery->id) }}" class="btn btn-primary btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ route('portfolio-galleries.destroy', $portfolio_gallery->id) }}" method="post" id="delete_{{$portfolio_gallery->id}}" class="d-inline deletesubmit">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm">
                                      <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('after-script')
<script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function() {
        // DATATABLES
        $('#tablePortfolioGallery').DataTable();
        // CONFIRM DELETE
        $(".deletesubmit").click(function(event) {
            event.preventDefault();
            var id = this.id;
            $.confirm({
                title: 'Confirm!',
                content: 'Are You Sure Want To Delete?',
                buttons: {
                    confirm: {
                        text: 'Yes',
                        btnClass: 'btn-red',
                        keys: ['enter'],
                        action: function(){
                            $("#"+id).submit();
                        }
                    },
                    cancel: function () {

                    }
                }
            });
        });
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