@extends('admin.layouts.default')
@section('title', 'Client Listing')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong>Client Listing</strong>
            <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('clients.create') }}" role="button"><i class="fa fa-plus"></i> Add Client</a>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tableClients">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Logo</th>
                        <th>Description</th>
                        <th>Company URL</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($clients as $client)
                    @php
                        $logosrc = ( $client->logo == url('/storage') ? asset('admin/images/default.png') : url($client->logo) );
                    @endphp
	                    <tr>
	                        <td>{{ $loop->index+1 }}</td>
	                        <td>{{ $client->name }}</td>
                            <td class="custom-w-100"><img src="{{ $logosrc }}" class="img-thumbnail custom-w-100"/></td>
	                        <td>{!! nl2br($client->description) !!}</td>
                            <td>{{ $client->url }}</td>
	                        <td width="10%">
	                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm">
		                            <i class="fa fa-pencil"></i>
		                        </a>
		                        <form action="{{ route('clients.destroy', $client->id) }}" method="post" id="delete_{{$client->id}}" class="d-inline deletesubmit">
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
        // TOOLTIP
        $('[data-toggle="tooltip"]').tooltip();
        // DATATABLES
        $('#tableClients').DataTable();
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