@extends('admin.layouts.default')
@section('title', 'Article Listing')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong>Article Listing</strong>
            <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('articles.create') }}" role="button"><i class="fa fa-plus"></i> Add Article</a>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tableArticle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($articles as $article)
                    @php
                        $photosrc = ( $article->photo == url('/storage') ? asset('admin/images/default.png') : url($article->photo) );
                    @endphp
	                    <tr>
	                        <td>{{ $loop->index+1 }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ date('d/m/Y', strtotime($article->d_ate)) }}</td>
	                        <td>{{ (strlen($article->description) > 130 ? substr($article->description,0,130)."..." : $article->description) }} </td>
                            <td class="custom-w-100"><img src="{{ $photosrc }}" class="img-thumbnail custom-w-100"/></td>
	                        <td width="10%">
	                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-primary btn-sm">
		                            <i class="fa fa-pencil"></i>
		                        </a>
		                        <form action="{{ route('articles.destroy', $article->id) }}" method="post" id="delete_{{$article->id}}" class="d-inline deletesubmit">
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
        $('#tableArticle').DataTable();
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