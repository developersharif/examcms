<?php __admin_header__(); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Exam Table</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Session</th>
                        <th>Semister</th>
                        <th>Section</th>
                        <th>Marks</th>
                        <th>Start</th>
                        <th>End</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($exams as $exam) : ?>
                    <tr>
                        <td><?php print $exam->name; ?></td>
                        <td><?php print $exam->department; ?></td>
                        <td><?php print $exam->session; ?></td>
                        <td><?php print ucwords($exam->semester); ?></td>
                        <td><?php print ucwords($exam->section); ?></td>
                        <td><?php print $exam->total_mark; ?></td>
                        <td><?php print $exam->start; ?></td>
                        <td><?php print $exam->end; ?></td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<?php __admin_footer__(); ?>
<!-- Page level plugins -->
<script src="<?php asset("admin/vendor/datatables/jquery.dataTables.min.js"); ?>"></script>
<script src="<?php asset("vendor/datatables/dataTables.bootstrap4.min.js"); ?>"></script>
<script>
// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>