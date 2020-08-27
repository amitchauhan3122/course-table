<h2><?= $title; ?></h2>
<tabLe class="table table-hover">
        <tr  class="post-date">
            <th>Subject_name</th>
            <th>Course_id</th>
            <th>No. of classes</th>
            <th>Fees</th>
            <th>Created_at</th>
            <th>Actions</th>
        </tr>
    <?php foreach($posts as $post) : ?>
        <tr>
            <td><?= $post['subject_name']; ?></td>
            <td><?= $post['course_id']; ?></td>
            <td><?= $post['classes']; ?></td>
            <td><?= $post['fees']; ?></td>
            <td><?= $post['created_at']; ?></td>
            <td>
                <a class="btn btn-primary edit" href="<?= base_url(); ?>posts/edit/<?= $post['subject_name']; ?>">Edit</a>
                <?= form_open('posts/delete/'. $post['id']); ?>
                <input type="submit" value="Delete" class="btn btn-danger"/>
                </form>
            </td>
        </tr>   
    <?php endforeach; ?>
</table>