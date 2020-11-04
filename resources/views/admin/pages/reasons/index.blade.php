@extends('admin.layouts.default')
@section('title', 'Reason Listing')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong>Reason Listing</strong>
            <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('reasons.create') }}" role="button"><i class="fa fa-plus"></i> Add Reason</a>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tableReason">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Reason</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($reasons as $reason)
	                    <tr>
	                        <td>{{ $loop->index+1 }}</td>
	                        <td>{!! nl2br($reason->question) !!}</td>
	                        <td>{!! nl2br($reason->description) !!}</td>
	                        <td width="10%">
	                            <a href="{{ route('reasons.edit', $reason->id) }}" class="btn btn-primary btn-sm">
		                            <i class="fa fa-pencil"></i>
		                        </a>
		                        <form action="{{ route('reasons.destroy', $reason->id) }}" method="post" id="delete_{{$reason->id}}" class="d-inline deletesubmit">
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
        $('#tableReason').DataTable();
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