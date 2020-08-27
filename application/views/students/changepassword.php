<h2><?= $title; ?></h2>
<?= form_open('students/changepassword'); ?>
  <div class="form-group">
    <label>Old password</label>
    <input type="text" name="old_password" class="form-control" placeholder="Enter old password*"  required autofocus>
  </div>
  <div class="form-group">
    <label>New password</label>
    <input type="text" name="new_password" class="form-control" placeholder="Enter new password*"  required autofocus>
  </div>
  <button type="submit" class="btn btn-primary">UPDATE</button>
</form>