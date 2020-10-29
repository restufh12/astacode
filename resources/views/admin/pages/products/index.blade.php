@extends('admin.layouts.default')
@section('title', 'Product Listing')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong>Product Listing</strong>
            <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('products.create') }}" role="button"><i class="fa fa-plus"></i> Add Product</a>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tableProduct">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>UOM</th>
                        <th>Currency</th>
                        <th>Active YN</th>
                        <th>Best Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($products as $product)
	                    <tr>
	                        <td>{{ $loop->index+1 }}</td>
                            <td>{{ $product->name }}</td>
	                        <td>{!! nl2br($product->description) !!}</td>
	                        <td>{{ number_format($product->price,2) }}</td>
                            <td>{{ $product->UOM }}</td>
                            <td>{{ $product->currency_code }}</td>
                            <td>{{ ($product->activeYN=="1"?"Yes" : "No") }}</td>
                            <td>{{ ($product->best_priceYN=="1"?"Yes" : "No") }}</td>
	                        <td width="10%">
	                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
		                            <i class="fa fa-pencil"></i>
		                        </a>
		                        <form action="{{ route('products.destroy', $product->id) }}" method="post" id="delete_{{$product->id}}" class="d-inline deletesubmit">
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
        $('#tableProduct').DataTable();
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