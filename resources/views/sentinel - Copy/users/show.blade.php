<div style="padding:10px; margin:10px 0px 10px 20px; ">
	

    <?php
        // Determine the edit profile route
        if (($user->email == Sentry::getUser()->email)) {
            $editAction = route('sentinel.profile.edit');
        } else {
            $editAction =  action('\\Sentinel\Controllers\UserController@edit', [$user->hash]);
        }
    ?>

	<h1>Account Profile : {{ $user->email }}</h1>
	<hr>
	
  	<div class="well clearfix">
	    <div class="col-md-8">
		    @if ($user->first_name)
		    	<p><strong>First Name:</strong> {{ $user->first_name }} </p>
			@endif
			@if ($user->last_name)
		    	<p><strong>Last Name:</strong> {{ $user->last_name }} </p>
			@endif
		    <p><strong>Email:</strong> {{ $user->email }}</p>
	
		    
		</div>
		<div class="col-md-4">
			<p><em>Account created: {{ $user->created_at }}</em></p>
			<p><em>Last Updated: {{ $user->updated_at }}</em></p>
			<p><em>Last Login: {{ $user->last_login }}</em></p>
			<button id="EditProfile" class="btn btn-primary"  href="#" data-link="{{ $editAction }}">Edit Profile</button>
			<!-- <button class="btn btn-primary" onClick="location.href='{{ $editAction }}'">Edit Profile</button> -->

		</div>
	</div>

	<h4>Group Memberships:</h4>
	<?php $userGroups = $user->getGroups(); ?>
	<div class="well">
	    <ul>
	    	@if (count($userGroups) >= 1)
		    	@foreach ($userGroups as $group)
					<li>{{ $group['name'] }}</li>
				@endforeach
			@else 
				<li>No Group Memberships.</li>
			@endif
	    </ul>
	</div>
	
	<!-- <hr /> -->

	<!-- <h4>User Object</h4> --}}
	<div>
		<p>{{-- dd($user) --}}</p>
	</div>
	-->
</div>
<script type="text/javascript">
	// <a id="btn" href="#">easyui</a>
	$('#EditProfile').linkbutton({
	    iconCls: 'icon-search'
	});

	$(function(){
	    $('#EditProfile').bind('click', function(){
	        // alert('EditProfile');
	        var link= $(this).attr('data-link');
	        $('#dialog-x').dialog({
	        				title: 'Edit Profile',
	        				width: 500,
	        				height: 500,
	        				modal:true,	
	        				href: link,
	        				// fit:true,
	        				buttons:[{
	        					text:'Submit',
	        					handler:function (){							
	        						handler
	        						}
	        					},{
	        					text:'Close ',
	        					handler:function(){
	        						$('#dialog-x').dialog('close');
	        					}
	        				}]
	        			});	
	        	$('#dialog-x').dialog('open');
	        // console.log(link);
	    });
	});

</script>
