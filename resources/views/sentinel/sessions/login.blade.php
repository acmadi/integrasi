@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')


<!-- ============================================================== -->

<div class="blok_header">
    <div class="header"  style="height: 150px;position: relative; margin-top:100px;">
      <div class="logo" style="height: 150px;position: absolute; float:left; left:0px;" >
          <a href="{{ route('home') }}">
              <img  width="100px" border="0" height="120px" src="{{asset('asset/images/header.png')}}" alt="logo" height="71" border="0" width="85"></a>
          </div>
          <div class="judul" style="width: 100%;" >
             <h1> --------Integrasi FIle ---------</h1>
             <p> --------Integrasi FIle --------- </p>
             <p> --------Integrasi FIle --------- </p>
             <p> --------Integrasi FIle --------- </p>
             <!-- <p>Telp : 0321 - 321753, 39594 </p> -->
              <hr >
          </div>
          <div class="logox" style="height: 150px;position: absolute; float:right; right: 0px;">
                        <a href="{{ route('home')}}">
                        <img width="100px" border="0" height="120px"  src="{{asset('asset/images/header.png')}}" alt="logo"></a>
                    </div>
      </div>
      <!-- <div class="clr"></div> -->
      <div class="header_text_bg">
          <!-- <div class="clr"></div> -->
          <div id="header" style="margin-top:20px;">
            <h1>Applikasi Integrasi </h1>
            <h3>Silahkan Login</h3>
        </div> 
    </div>       
</div>    


<form method="POST" action="{{ route('sentinel.session.store') }}" name="loginx" id="loginx"accept-charset="utf-8"><fieldset>
    <input name="_token" value="{{ csrf_token() }}" type="hidden">
    <legend>

        <a href="{{ route('sentinel.login') }}" class="easyui-linkbutton">Login Page</a>    
        <!--  //
    <a href="{{ route('sentinel.register.form') }}" class="easyui-linkbutton">Register </a> -->
    </legend>
    <table width="100%">
        <tbody><tr>
          <td>Username</td>
          <td>:</td>
          <td>
            <input class="form-control" placeholder="admin@admin.com" autofocus="autofocus" name="email" type="text" value="user@user.com">
          <!-- <input name="email" value="j@gmail.com" id="username" class="input-teks-login" autocomplete="off" size="30" placeholder="Masukkan username....." type="text"></td> -->
      </tr>
      <tr>       
        <td>Password</td>
        <td>:</td>
        <td>
        <input class="form-control" placeholder="sentryadmin" name="password" value="sentryuser" type="password">
        <!-- <input name="password" value="" id="password" class="input-teks-login" autocomplete="off" size="30" placeholder="Masukkan password....." type="password"></td> -->
    </tr>
    <tr>       
        <td>Password</td>
        <td>:</td>
        <td>    <label>
            <input name="rememberMe" value="rememberMe" type="checkbox"> Remember Me
            <!-- <input name="remember" type="checkbox"> Remember Me -->
        </label></td>
    </tr>
</tbody></table>        
</fieldset>
<fieldset class="tblFooters">
  <div id="error">
  </div>
  <button class="right"name="submit" type="submit" id="submit" class="easyui-linkbutton" data-options="iconCls:'icon-lock_open'">Login</button>
<!--   <a class="btn btn-link kiri" href="{{ route('sentinel.forgot.form') }}"><i class="fa fa-key"></i>
Forgot Password</a> -->
  <!-- <a href="/password/email" class="easyui-linkbutton" >Forgot Your Password?</a> -->
</fieldset>
</form>

<!-- Scripts -->
<div id="footer" align="center">
  <p>Copyright &copy; Achmadi Corp. 2015</p>
</div>



@stop