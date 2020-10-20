@extends('admin.layouts.default')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong class="card-title">Service Listing</strong>
            <a class="btn btn-success float-sm-right" href="{{ route('services.create') }}" role="button"><i class="fa fa-plus"></i> Add Service</a>
        </div>
        <div>
            <table class="table table-hover">
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
                	@forelse($services as $service)
	                    <tr>
	                        <td>{{ $loop->index+1 }}</td>
	                        <td>
	                            <div class="round-img">
	                                <i class="icon-upload-show {{ ($service->service_icon == '' ? 'fa fa-ban' : $service->service_icon) }}"></i>
	                            </div>
	                        </td>
	                        <td>{{ $service->service_name }}</td>
	                        <td>{{ nl2br($service->description) }}</td>
	                        <td width="10%">
	                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary btn-sm">
		                            <i class="fa fa-pencil"></i>
		                        </a>
		                        <form action="{{ route('services.destroy', $service->id) }}" method="post" class="d-inline">
	                            @csrf
	                            @method('delete')
	                            <button class="btn btn-danger btn-sm">
	                              <i class="fa fa-trash"></i>
	                            </button>
	                          </form>
	                        </td>
	                    </tr>
                	@empty
                		<tr>
                          <td colspan="5" class="text-center p-5">
                            Empty Data
                          </td>
                        </tr>
                	@endforelse

                </tbody>
            </table>
        </div> <!-- /.table-stats -->
    </div>
@endsection

@push('after-script')
<script type="text/javascript">
    
</script>
@endpush