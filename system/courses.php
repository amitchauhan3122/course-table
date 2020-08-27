<h2><?= $title ?></h2>
<tabLe class="table table-hover">
        <tr  class="post-date">
            <th>Course_name</th>
            <th>Duration</th>
            <th>Fees</th>
            <th>No. of classes</th>
            <th>No. of subjects</th>
            <th>Created_at</th>
            <th>Actions</th>
        </tr>
    <?php foreach($posts as $post) : ?>
        <tr>
            <td><a href="<?= site_url('/courses/posts/'.$post['id']); ?>"><?= $post['course_name']; ?></a></td>
            <td><?= $post['duration']; ?></td>
            <td><?= $post['fees']; ?></td>
            <td><?= $post['no_of_classes']; ?></td>
            <td><?= $post['no_of_subjects']; ?></td>
            <td><?= $post['created_at']; ?></td>
            <td>
                <a class="btn btn-primary edit" href="<?= base_url(); ?>posts/edit/<?= $post['course_name']; ?>">Edit</a>
                <?= form_open('courses/delete/'. $post['id']); ?>
                <input type="submit" value="Delete" class="btn btn-danger"/>
                </form>
            </td>
        </tr>   
    <?php endforeach; ?>
</table>