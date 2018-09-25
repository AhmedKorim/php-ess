<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0


$subject = getFromTable($db, 'id', h($id));

?>

<?php $page_title = 'Show Subject'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<div id="content">
    <a class="back-link" href="<?php echo url_for('/staff/subjects/index.php'); ?>">&laquo; Back to List</a>
    <div class="subject show">
        <h1> subject : <?php echo h($subject['menu_name']) ?></h1>
        <div class="attributes">
            <dl>
                <dt>Menu Item</dt>
                <dd><?php echo $subject['menu_name'] ?></dd>
            </dl>
            <dl>
                <dt>position</dt>
                <dd><?php echo $subject['position'] ?></dd>
            </dl>
            <dl>
                <dt>visible</dt>
                <dd><?php echo $subject['visible'] == 1 ? 'true' : 'false' ?></dd>
            </dl>
        </div>
    </div>
</div>
