@extends('admin.layouts.default')
@section('title', 'Portfolio Listing')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong>Portfolio Listing</strong>
            <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('portfolios.create') }}" role="button"><i class="fa fa-plus"></i> Add Portfolio</a>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tablePortfolio" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Project Name</th>
                        <th>Category</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>URL</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($portfolios as $portfolio)
	                    <tr>
	                        <td>{{ $loop->index+1 }}</td>
	                        <td>{{ $portfolio->project_name }}</td>
	                        <td>{{ $portfolio->category }}</td>
	                        <td>{{ isset($portfolio->client->name) ? $portfolio->client->name : ''  }}</td>
	                        <td>{{ date('d/m/Y', strtotime($portfolio->project_date)) }}</td>
	                        <td>{{ $portfolio->project_url }}</td>
	                        <td>{!! nl2br($portfolio->project_desc) !!}</td>
	                        <td width="13%">
                                <a href="{{ route('portfolios.gallery', $portfolio->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-image"></i>
                                </a>
	                            <a href="{{ route('portfolios.edit', $portfolio->id) }}" class="btn btn-primary btn-sm">
		                            <i class="fa fa-pencil"></i>
		                        </a>
		                        <form action="{{ route('portfolios.destroy', $portfolio->id) }}" method="post" id="delete_{{$portfolio->id}}" class="d-inline deletesubmit">
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
        $('#tablePortfolio').DataTable();
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