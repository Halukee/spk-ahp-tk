<form action="<?= BASEURL ?>/public/template/AdminLTE-3.2.0/index3.html" method="post" id="form-submit">
  <div class="form-group">
    <input type="text" name="email_username_users" class="form-control" placeholder="Email atau Username">
  </div>
  <div class="form-group mb-3">
    <input type="password" name="password_users" class="form-control" placeholder="Password">
  </div>
  <div class="row">
    <div class="col-8">
      <div class="icheck-primary">
        <input type="checkbox" id="remember">
        <label for="remember">
          Remember Me
        </label>
      </div>
    </div>
    <!-- /.col -->
    <div class="col-4">
      <button type="submit" class="btn btn-primary btn-block submit">Sign In</button>
    </div>
    <!-- /.col -->
  </div>
</form>