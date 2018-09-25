<?php require_once('../../../private/initialize.php'); ?>

<?php
include_once('../../../private/query_functions.php');
$subject_set = getAll($db, "pages");
$pages = [];
while ($page = mysqli_fetch_assoc($subject_set)) {
    $pages[] = $page;
}


?>

<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
    <div class="pages listing">
        <h1>Pages</h1>
        <div class="actions">
            <a class="action" href="<?php echo url_for('/staff/pages/new.php'); ?>">Create New Page</a>
        </div>
        <table class="list">
            <tr>
                <th>ID</th>
                <th>Subject_ID</th>
                <th>Position</th>
                <th>Visible</th>
                <th>Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($pages as $page) { ?>
                <tr>
                    <td><?php echo h($page['id']); ?></td>
                    <td><?php echo h($page['subject_id']); ?></td>
                    <td><?php echo h($page['position']); ?></td>
                    <td><?php echo $page['visible'] == 1 ? 'true' : 'false'; ?></td>
                    <td><?php echo h($page['menu_name']); ?></td>
                    <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($page['id']))); ?>">View</a></td>
                    <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($page['id']))); ?>">Edit</a></td>
                    <td><a class="action" href="">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
        <?php
        mysqli_free_result($subject_set);





        ?>
    </div>
</div>
<?php include(SHARED_PATH . '/staff_footer.php'); ?>
