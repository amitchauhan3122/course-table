<h2><?= $title; ?></h2>

<?= validation_errors(); ?>
<?= form_open_multipart('subjects/create'); ?>
  <!-- <input type="hidden" name="id" value="" /> -->
  <div class="form-group">
    <label>Subject_name</label>
    <input type="text" name="subject" class="form-control" placeholder="Add Subject">
  </div>
  <div class="form-group">
	  <label>Courses</label>
	  <select name="id" class="form-control">
		  <?php foreach($courses as $course): ?>
		  	<option value="<?= $course['id']; ?>"><?= $course['course_name']; ?></option>
		  <?php endforeach; ?>
	  </select>
  </div>
  <div class="form-group">
    <label>No. of classes</label>
    <input type="text" name="classes" class="form-control" placeholder="Add classes">
  </div>
  <div class="form-group">
    <label>Fees</label>
    <input type="text" name="fees" class="form-control" placeholder="Add Fees">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>