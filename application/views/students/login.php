<h2><?= $title; ?></h2>
<?php

?>
<?= validation_errors(); ?>
<?= form_open('students/login'); ?>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" placeholder="Enter mail id*"  required autofocus>
  </div>
  <div class="form-group">
    <label>password</label>
    <input type="text" name="password" class="form-control" placeholder="password*"  required autofocus>
  </div>
  <a class="btn btn-link" href="<?= base_url('students/forgot_password') ?>" class="btn btn-primary">Forgot password</a></br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>