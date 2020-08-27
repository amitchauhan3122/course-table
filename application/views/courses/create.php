<h2><?= $title; ?></h2>

<?= validation_errors(); ?>
<?= form_open_multipart('courses/create'); ?>
  <div class="form-group">
    <label>Course_name</label>
    <input type="text" name="course" class="form-control" placeholder="Add Course"/>
  </div>
  <div class="form-group">
    <label>Duration</label>
    <input type="text" name="duration" class="form-control" placeholder="Add duration">
  </div>
  <div class="form-group">
    <label>Total_fees</label>
    <input type="text" name="total_fees" class="form-control" placeholder="Add total_fees">
  </div>
  <div class="form-group">
    <label>Total_Subjects</label>
    <input type="text" name="total_subjects" class="form-control" placeholder="Add total_subjects">
  </div>
  <div class="form-group">
    <label>Total_classes</label>
    <input type="text" name="total_classes" class="form-control" placeholder="Add total_classes">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>