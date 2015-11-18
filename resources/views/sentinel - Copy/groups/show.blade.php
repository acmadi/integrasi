
<h4>{{ $group['name'] }} Group</h4>
<div class="well clearfix">
	<div class="col-md-10">
	    <strong>Permissions:</strong>
	    <ul>
	    	@foreach ($group->getPermissions() as $key => $value)
	    		<li>{{ ucfirst($key) }}</li>
	    	@endforeach
	    </ul>
	</div>
	<div class="col-md-2">
		<a class="btn btn-primary" href="{{ route('sentinel.groups.edit', array($group->hash)) }}">Edit Group Name </a>
	</div> 
</div>
<hr />
<h4> Edit Group Akses</h4>
<div>

{!! $listAkses !!}
    {{-- dd($group->akses->toArray()) --}}{{-- many to Many string(85) "select * from `akses` where `akses`.`group_id` = ? and `akses`.`group_id` is not null"  --}}
    {{-- dd($group->with('akses')) --}}
    {{-- dd($group->with('akses')->get()->toArray()) --}}
</div>

