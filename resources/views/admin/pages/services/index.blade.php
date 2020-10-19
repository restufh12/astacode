@extends('admin.layouts.default')
@section('content')
	<div class="card">
        <div class="card-header">
            <strong class="card-title">Service Listing</strong>
        </div>
        <div class="table-stats order-table ov-h">
            <table class="table ">
                <thead>
                    <tr>
                        <th class="serial">No</th>
                        <th class="avatar">Icon</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="serial">1.</td>
                        <td class="avatar">
                            <div class="round-img">
                                <a href="#"><img class="rounded-circle" src="images/avatar/1.jpg" alt=""></a>
                            </div>
                        </td>
                        <td> #5469 </td>
                        <td> <span class="name">Louis Stanley</span> </td>
                        <td>
                            <span class="badge badge-complete">Complete</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> <!-- /.table-stats -->
    </div>
@endsection

@push('after-script')
<script type="text/javascript">
    
</script>
@endpush