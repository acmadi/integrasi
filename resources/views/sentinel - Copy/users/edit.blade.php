
<?php
    // Pull the custom fields from config
$isProfileUpdate = ($user->email == Sentry::getUser()->email);
$customFields = config('sentinel.additional_user_fields');

    // Determine the form post route
if ($isProfileUpdate) {
    $profileFormAction = route('sentinel.profile.update');
    $passwordFormAction = route('sentinel.profile.password');
} else {
    $profileFormAction =  route('sentinel.users.update', $user->hash);
    $passwordFormAction = route('sentinel.password.change', $user->hash);
}
?>



@if (! empty($customFields))
{{-- <div class="row"> --}}
{{-- <h4>Profile</h4> --}}
{{-- <div class="well"> --}}
<form method="POST" class="elegant-aero" action="{{ $profileFormAction }}" accept-charset="UTF-8" >
    <h1> 
        Edit
        @if ($isProfileUpdate)
        Your
        @else
        {{ $user->email }}'s
        @endif
        Account
        {{-- <span>Please fill all the texts in the fields.</span> --}}
    </h1>

    <input name="_method" value="PUT" type="hidden">
    <input name="_token" value="{{ csrf_token() }}" type="hidden">

    @foreach(config('sentinel.additional_user_fields') as $field => $rules)
    <div class="form-group {{ ($errors->has($field)) ? 'has-error' : '' }}" for="{{ $field }}">
        <label for="{{ $field }}" class="col-sm-2 control-label">
            <span>{{ ucwords(str_replace('_',' ',$field)) }}</span>
            <input class="form-control" name="{{ $field }}" type="text" value="{{ Input::old($field) ? Input::old($field) : $user->$field }}">
            {{ ($errors->has($field) ? $errors->first($field) : '') }}
        </label>
            <!--     <div class="col-sm-10">
                   
        </div> -->
    </div>
    @endforeach
    <label>
        <span>&nbsp;</span> 
        <input value="Submit Changes" type="submit" class="button"> 
    </label> 
           <!--  <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input class="btn btn-primary" value="Submit Changes" type="submit">
                </div>
            </div> -->
    </form>
        {{-- </div> --}}
        {{-- </div> --}}
        @endif
        <hr>
        @if (Sentry::getUser()->hasAccess('admin') && ($user->hash != Sentry::getUser()->hash))
   
            <form method="POST"  class="elegant-aero" action="{{ route('sentinel.users.memberships', $user->hash) }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                <h1> 
                    Group Memberships
                    {{-- <span>Please fill all the texts in the fields.</span> --}}
                </h1>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        @foreach($groups as $group)
                        <label class="checkbox-inline">
                            <input type="checkbox" name="groups[{{ $group->name }}]" value="1" {{ ($user->inGroup($group) ? 'checked' : '') }}> {{ $group->name }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input name="_token" value="{{ csrf_token() }}" type="hidden">
                        <input class="btn btn-primary" value="Update Memberships" type="submit">
                    </div>
                </div>

            </form>
  
    <hr>

    @endif


    <form method="POST"  class="elegant-aero" action="{{ $passwordFormAction }}" accept-charset="UTF-8" class="form-inline" role="form">
        <h1> 
            Change Password

            {{-- <span>Please fill all the texts in the fields.</span> --}}
        </h1>

        @if(! Sentry::getUser()->hasAccess('admin'))
        <div class="form-group {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
            <label for="oldPassword" class="sr-only"><span>Old Password</span>
            <input class="form-control" placeholder="Old Password" name="oldPassword" value="" id="oldPassword" type="text">
            </label>
        </div>
        @endif

        <!-- <div class="form-group {{ $errors->has('newPassword') ? 'has-error' : '' }}"> -->
        <label for="newPassword" class="sr-only"><span>New Password</span>
        <input class="form-control" placeholder="New Password" name="newPassword" value="" id="newPassword" type="password">
        </label>
        <!-- </div> -->

        <!-- <div class="form-group {{ $errors->has('newPassword_confirmation') ? 'has-error' : '' }}"> -->
    <label> <span> Confirm your password</span>
        <input class="form-control" placeholder="Confirm New Password" name="newPassword_confirmation" value="" id="newPassword_confirmation" type="password">
    </label>
    <!-- </div> -->

    <label>
        <span>&nbsp;</span> 
        <input class="btn btn-primary" value="Change Password" type="submit">
    </label>
    <input name="_token" value="{{ csrf_token() }}" type="hidden">

    {{ ($errors->has('oldPassword') ? '<br />' . $errors->first('oldPassword') : '') }}
    {{ ($errors->has('newPassword') ?  '<br />' . $errors->first('newPassword') : '') }}
    {{ ($errors->has('newPassword_confirmation') ? '<br />' . $errors->first('newPassword_confirmation') : '') }}

</form>
<!-- <form method="POST"  class="elegant-aero" action="{{ $passwordFormAction }}" accept-charset="UTF-8" class="form-inline" role="form">

<form class="elegant-aero" method="post" action="">
    <h1>Contact Form 
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
        <span>Your Name :</span>
        <input type="text" placeholder="Your Full Name" name="name" id="name">
    </label>

    <label>
        <span>Your Email :</span>
        <input type="email" placeholder="Valid Email Address" name="email" id="email">
    </label>

    <label>
        <span>Message :</span>
        <textarea placeholder="Your Message to Us" name="message" id="message"></textarea>
    </label> 
    <label>
        <span>Subject :</span>
        <select name="selection">
        <option value="Job Inquiry">Job Inquiry</option>
        <option value="General Question">General Question</option>
        </select>
    </label>    
    <label>
        <span>&nbsp;</span> 
        <input type="button" value="Send" class="button"> 
    </label>    
</form>
 -->
