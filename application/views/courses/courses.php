<h2><?= $title ?></h2>
<tabLe class="table table-hover">
        <tr  class="post-date">
            <th>Index</th>
            <th>Course_name</th>
            <th>Duration</th>
            <th>fees</th>
            <th>Total fees</th>
            <th>No_of_classes</th>
            <th>Total_classes</th>
            <th>No_of_subjects</th>
            <th>Total_subjects</th>
            <th>Actions</th>
        </tr>
        
    <?php foreach($posts as $post) : ?>
        <tr>
            <td><?= $post['id']; ?></td>
            <td><a href="<?= site_url('courses/course_detail/'.$post['id']); ?>"><?= $post['course_name']; ?></a></td>
            <td><?= $post['duration']; ?></td>
            <td><?= $post['fees']; ?></td>
            <td><?= $post['total_fees']; ?></td>
            <td><?= $post['classes']; ?></td>
            <td><?= $post['total_classes']; ?></td>
            <td><?= $post['subject']; ?></td>
            <td><?= $post['total_subjects']; ?></td>
            <td>
                <a class="button btn-xs btn btn-primary edit" href="<?= base_url(); ?>courses/edit/<?= $post['id']; ?>">Edit</a>
                <?= form_open('courses/delete/'. $post['id']); ?>
                <input type="submit" value="Delete" class="button btn-xs btn btn-danger"/>
                </form>
            </td>
        </tr>   
    <?php endforeach; ?>
</table>
