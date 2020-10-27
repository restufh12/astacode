@extends('admin.layouts.default')
@section('title', 'Service Listing')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong>Service Listing</strong>
            <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('services.create') }}" role="button"><i class="fa fa-plus"></i> Add Service</a>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tableServices">
                <thead>
                    <tr>
                        <th class="serial">No</th>
                        <th class="avatar">Icon</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($services as $service)
	                    <tr>
	                        <td>{{ $loop->index+1 }}</td>
	                        <td>
	                            <div class="round-img">
	                                <i class="icon-upload-show {{ ($service->service_icon == '' ? 'fa fa-ban' : $service->service_icon) }}"></i>
	                            </div>
	                        </td>
	                        <td>{{ $service->service_name }}</td>
	                        <td>{!! nl2br($service->description) !!}</td>
	                        <td width="10%">
	                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm">
		                            <i class="fa fa-pencil"></i>
		                        </a>
		                        <form action="{{ route('services.destroy', $service->id) }}" method="post" id="delete_{{$service->id}}" class="d-inline deletesubmit">
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
        $('#tableServices').DataTable();
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