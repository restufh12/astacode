@extends('admin.layouts.default')
@section('title', 'Team Listing')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong>Team Listing</strong>
            <a class="btn btn-outline-primary float-sm-right btn-sm" href="{{ route('teams.create') }}" role="button"><i class="fa fa-plus"></i> Add Team</a>
        </div>
        <div class="card-container">
            <table class="table table-hover" id="tableTeams">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Notes</th>
                        <th>Photo</th>
                        <th>Social Media</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                	@foreach($teams as $team)
                    @php
                        $photosrc = ( $team->photo == url('/storage') ? asset('admin/images/default.png') : url($team->photo) );
                    @endphp
	                    <tr>
	                        <td>{{ $loop->index+1 }}</td>
	                        <td>{{ $team->name }}</td>
	                        <td>{{ $team->position }}</td>
	                        <td>{!! nl2br($team->notes) !!}</td>
                            <td class="custom-w-100"><img src="{{ $photosrc }}" class="img-thumbnail custom-w-100"/></td>
                            <td align="center">
                                {!! ($team->link_twitter != '' ? '<a href="'.$team->link_twitter.'" data-toggle="tooltip" title="'.$team->link_twitter.'" target="_blank"><i class="fa fa-twitter icon-link icon-social-size"></i></a><br>' : '') !!}
                                {!! ($team->link_instagram != '' ? '<a href="'.$team->link_instagram.'" data-toggle="tooltip" title="'.$team->link_instagram.'" target="_blank"><i class="fa fa-instagram icon-link icon-social-size"></i></a><br>' : '') !!}
                                {!! ($team->link_facebook != '' ? '<a href="'.$team->link_facebook.'" data-toggle="tooltip" title="'.$team->link_facebook.'" target="_blank"><i class="fa fa-facebook icon-link icon-social-size"></i></a><br>' : '') !!}
                                {!! ($team->link_linkedin != '' ? '<a href="'.$team->link_linkedin.'" data-toggle="tooltip" title="'.$team->link_linkedin.'" target="_blank"><i class="fa fa-linkedin icon-link icon-social-size"></i></a>' : '') !!}
                            </td>
	                        <td width="10%">
	                            <a href="{{ route('teams.edit', $team->id) }}" class="btn btn-primary btn-sm">
		                            <i class="fa fa-pencil"></i>
		                        </a>
		                        <form action="{{ route('teams.destroy', $team->id) }}" method="post" id="delete_{{$team->id}}" class="d-inline deletesubmit">
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
        $('#tableTeams').DataTable();
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