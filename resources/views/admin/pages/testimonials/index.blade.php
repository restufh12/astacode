@extends('admin.layouts.default')
@section('title', 'Testimonial Listing')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong>Testimonial Listing</strong>
            <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('testimonials.create') }}" role="button"><i class="fa fa-plus"></i> Add Testimonial</a>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tableTestimonial">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Notes</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($testimonials as $testimonial)
                    @php
                        $photosrc = ( $testimonial->photo == url('/storage') ? asset('admin/images/default.png') : url($testimonial->photo) );
                    @endphp
	                    <tr>
	                        <td>{{ $loop->index+1 }}</td>
	                        <td>{{ $testimonial->name }}</td>
	                        <td>{!! nl2br($testimonial->notes) !!}</td>
                            <td class="custom-w-100"><img src="{{ $photosrc }}" class="img-thumbnail custom-w-100"/></td>
	                        <td width="10%">
	                            <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-primary btn-sm">
		                            <i class="fa fa-pencil"></i>
		                        </a>
		                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="post" id="delete_{{$testimonial->id}}" class="d-inline deletesubmit">
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
        </div> <!-- /.table-stats -->
    </div>
@endsection

@push('after-script')
<script type="text/javascript">
    var $ = jQuery;
    $(document).ready(function() {
        // DATATABLES
        $('#tableTestimonial').DataTable();
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