<h2><?= $title; ?></h2>
<?= validation_errors(); ?>
<?= form_open_multipart('students/register'); ?>
  <!-- <input type="hidden" name="id" value="" /> -->
  <div class="form-group">
    <label>Student_name</label>
    <input type="text" name="student" class="form-control" placeholder="Student_name*">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="email" class="form-control" placeholder="Enter mail id*">
  </div>
  <div class="form-group">
    <label>password</label>
    <input type="text" name="password" class="form-control" placeholder="password*">
  </div>
  <div class="form-group">
    <label>Confirm password</label>
    <input type="text" name="confirm" class="form-control" placeholder="Confirm-password*">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>