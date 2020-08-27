<h2><?= $title; ?></h2>
<?php
// echo "<pre>";
//   print_r($post);
//   print_r($courses);
//   die;
  ?>
<?= validation_errors(); ?>
<?= form_open_multipart('subjects/update'); ?>
  <input type="hidden" name="id" value="<?= $post['id'] ?>"/>
  <div class="form-group">
    <label>Subject_name</label>
    <input type="text" name="subject" class="form-control" placeholder="Add Subject" value="<?= $post['subject_name'] ?>"/>
  </div>
  <div class="form-group">
	  <label>Courses</label>
	  <select name="course_id" class="form-control">
		  <?php foreach($courses as $course): ?>
		  	<option value="<?= $course['id']; ?>" <?= $course['id'] == $post['course_id'] ? 'selected' : ''?>><?= $course['course_name']; ?></option>
		  <?php endforeach; ?>
	  </select>
  </div>
  <div class="form-group">
    <label>No. of classes</label>
    <input type="text" name="classes" class="form-control" placeholder="Add classes" value="<?= $post['classes'] ?>"/>
  </div>
  <div class="form-group">
    <label>Fees</label>
    <input type="text" name="fees" class="form-control" placeholder="Add Fees" value="<?= $post['fees'] ?>"/>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>