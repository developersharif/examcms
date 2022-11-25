<?php __admin_header__();
?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Attend Table</h6>
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
                        <th>Subject</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($attends as $exam) :
                        $student = student_table($exam->student_id);
                        $question = exam_table($exam->question_id);
                    ?>
                    <tr>
                        <td><?php print $student->name; ?></td>
                        <td><?php print $student->department; ?></td>
                        <td><?php print $student->session; ?></td>
                        <td><?php print ucwords($student->semester); ?></td>
                        <td><?php print ucwords($student->section); ?></td>
                        <td><a href="<?php url('admin/check/');
                                            print $exam->id; ?>"><?php print $question->subject; ?> </a>
                        </td>
                        <td><?php print $exam->created_at; ?></td>

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