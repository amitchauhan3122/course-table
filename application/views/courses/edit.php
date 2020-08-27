<h2><?= $title; ?></h2>

<?= validation_errors(); ?>
<?= form_open_multipart('courses/update'); ?>
  <input type="hidden" name="id" value="<?= $post['id'] ?>"/>
  <div class="form-group">
    <label>Course_name</label>
    <input type="text" name="course_name" class="form-control" placeholder="Add Course" value="<?= $post['course_name'] ?>"/>
  </div>
  <div class="form-group">
    <label>Duration</label>
    <input type="text" name="duration" class="form-control" placeholder="Add duration" value="<?= $post['duration'] ?>"/>
  </div>
  <div class="form-group">
    <label>Total_Fees</label>
    <input type="text" name="total_fees" class="form-control" placeholder="Add total_fees" value="<?= $post['total_fees'] ?>"/>
  </div>
  <div class="form-group">
    <label>Total_subjects</label>
    <input type="text" name="total_subjects" class="form-control" placeholder="Add total_subjects" value="<?= $post['total_subjects'] ?>"/>
  </div>
  <div class="form-group">
    <label>Total_classes</label>
    <input type="text" name="total_classes" class="form-control" placeholder="Add total_classes" value="<?= $post['total_classes'] ?>"/>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>