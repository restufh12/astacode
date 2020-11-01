@extends('admin.layouts.default')
@section('title', 'Subscriber Listing')
@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Subscriber Listing</strong>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tableSubscriber">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ nl2br($subscriber->email) }}</td>
                            <td width="10%">
                                <form action="{{ route('subscribers.destroy', $subscriber->id) }}" method="post" id="delete_{{$subscriber->id}}" class="d-inline deletesubmit">
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
        $('#tableSubscriber').DataTable();
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