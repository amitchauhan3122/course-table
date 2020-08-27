<h2><?= $title; ?></h2>
<tabLe class="table table-hover">
        <tr  class="post-date">
            <th>Subject_id</th>
            <th>Subject_name</th>
            <th>Course Name</th>
            <th>No. of classes</th>
            <th>Fees</th>
            <th>Created_at</th>
            <th>Actions</th>
        </tr>
    <?php foreach($posts as $post) : ?>
        <tr>
            <td><?= $post['id']; ?></td>
            <td><?= $post['subject_name']; ?></td>
            <td><a href="<?= site_url('courses/course_detail/'.$post['course_id']); ?>"><?= $post['course_name']; ?></a></td>
            <td><?= $post['classes']; ?></td>
            <td><?= $post['fees']; ?></td>
            <td><?= $post['created_at']; ?></td>
            <td>
                <a class="button btn btn-primary edit btn-xs" href="<?= base_url(); ?>subjects/edit/<?= $post['subject_name']; ?>">Edit</a>
                <?= form_open('subjects/delete/'. $post['id']); ?>
                <input type="submit" value="Delete" class="button btn btn-danger btn-xs"/>
                </form>
            </td>
        </tr>   
    <?php endforeach; ?>
</table>