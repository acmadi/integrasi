

<div class="easyui-layout" data-options="fit:true">
	<div data-options="region:'center'">
		<div id="tt" class="easyui-tabs" fit="true"data-options="fit:true,border:false">
			<div title="--== Profil Anda ==--">
				 <div class="easyui-layout" data-options="fit:true">
				    <div data-options="region:'west'" style="width:50%">
				    <div class="isi">
						<?php
		        // Determine the edit profile route
						if (($user->email == Sentry::getUser()->email)) {
							$editAction = route('sentinel.profile.edit');
						} else {
							$editAction =  action('\\Sentinel\Controllers\UserController@edit', [$user->hash]);
						}
						?>

						<div class="well clearfix">
							<div class="col-md-8">
								@if ($user->first_name)
								<p><strong > Nama Depan </strong> : {{ $user->first_name }} </p>
								@endif
								@if ($user->last_name)
								<p><strong>Nama Belakang </strong> : {{ $user->last_name }} </p>
								@endif
								<p><strong>Email</strong> : {{ $user->email }}</p>

							</div>
							<div class="col-md-4">
								<p><em><strong>Akun dibuat</strong>  : {{ $user->created_at }}</em></p>
								<p><em><strong>Akun terakhir diupdate</strong>  : {{ $user->updated_at }}</em></p>

								<a href="#" class="easyui-linkbutton" id="profilexx" data-options="iconCls:'fa fa-check-square-o fa-lg'" style="width:100%;height:30px;padding:8px" onClick="javascript:EditProfile('{{ $editAction }}')">
								    <span style="font-size:14px;"> Edit Profile</span>
								</a>

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
				        </div>   
				    </div>
				    <div data-options="region:'center'"style="width:20%">
				        <div id="FormProfile" fit="true" style="padding:10px;">

				        </div>
				    </div>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.easyui-layout').layout({border:false})
	$('.easyui-tabs').tabs({border:false})
	$('.easyui-datagrid').datagrid({border:false});
	$('.easyui-linkbutton').linkbutton();
	function EditProfile (url) {
		$('#FormProfile').panel({
		    // width:500,
		    href:url,
		    title:'Edit Profile '
		    // ,
		    // tools:[{
		    //     iconCls:'icon-add',
		    //     // handler:function(){alert('new')}
		    // },{
		    //     iconCls:'icon-save',
		    //     // handler:function(){alert('save')}
		    // }]
		}); 
	}
	
</script>
