@extends(config('sentinel.layout'))

{{-- Web site Title --}}
@section('title')
Log In
@stop

{{-- Content --}}
@section('content')

<!-- <div class="row">
    <div class="col-md-4 col-md-offset-4">
        <form method="POST" action="{{ route('sentinel.session.store') }}" accept-charset="UTF-8">

            <h2 class="form-signin-heading">Sign In</h2>

            <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Email" autofocus="autofocus" name="email" type="text" value="{{ Input::old('email') }}">
                {{ ($errors->has('email') ? $errors->first('email') : '') }}
            </div>

            <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                <input class="form-control" placeholder="Password" name="password" value="" type="password">
                {{ ($errors->has('password') ?  $errors->first('password') : '') }}
            </div>

            <label class="checkbox">
                <input name="rememberMe" value="rememberMe" type="checkbox"> Remember Me
            </label>

            <input name="_token" value="{{ csrf_token() }}" type="hidden">
            <input class="btn btn-primary" value="Sign In" type="submit">
            <a class="btn btn-link" href="{{ route('sentinel.forgot.form') }}">Forgot Password</a>

        </form>
    </div>
</div> -->

<!-- ============================================================== -->

<div class="blok_header">
    <div class="header">
      <div class="logo">
          <a href="{{ route('home') }}">
              <img src="login_files/logo_koperasi_150.htm" alt="logo" height="71" border="0" width="85"></a>
          </div>
          <div class="judul">
              <h1>Aplikasi SPPD </h1>
              <p>Pemerintah Kabupaten Kota Mojokerto </p>
              <p>Alamat : Jl. ........................ </p>
          </div>
          <div class="clr"></div>
      </div>
      <div class="clr"></div>
      <div class="header_text_bg">
          <div class="clr"></div>
          <div id="header">
            <h1>Applikasi SPPD </h1>
            <h3>Silahkan Login</h3>
        </div> 
    </div>       
</div>    


<form method="POST" action="{{ route('sentinel.session.store') }}" accept-charset="utf-8"><fieldset>
    <input name="_token" value="{{ csrf_token() }}" type="hidden">
    <legend>

        <a href="http://akuntan.herokuapp.com/auth/login" class="easyui-linkbutton">Login Page</a>
        <a href="http://akuntan.herokuapp.com/auth/register" class="easyui-linkbutton">Register </a>
    </legend>
    <table width="100%">
        <tbody><tr>
          <td>Username</td>
          <td>:</td>
          <td>
            <input class="form-control" placeholder="Email" autofocus="autofocus" name="email" type="text" value="{{ Input::old('email') }}">
          <!-- <input name="email" value="j@gmail.com" id="username" class="input-teks-login" autocomplete="off" size="30" placeholder="Masukkan username....." type="text"></td> -->
      </tr>
      <tr>       
        <td>Password</td>
        <td>:</td>
        <td>
        <input class="form-control" placeholder="Password" name="password" value="" type="password">
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
  </div><a class="btn btn-link" href="{{ route('sentinel.forgot.form') }}">Forgot Password</a>
  <button name="submit" type="submit" id="submit" class="easyui-linkbutton" data-options="iconCls:'icon-lock_open'">Login</button>
  <!-- <a href="/password/email" class="easyui-linkbutton" >Forgot Your Password?</a> -->
</fieldset>
</form>

<!-- Scripts -->
<div id="footer" align="center">
  <p>Copyright &copy; Achmadi Corp. 2015</p>
</div>



@stop