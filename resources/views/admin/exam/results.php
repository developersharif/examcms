<?php

use Carbon\Carbon;

__admin_header__(); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Result Table</h6>
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
                        <th>Subject</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result) :
                        $student = student_table($result->student_id);
                        $student_name = $student->name;
                        $student_department = $student->department;
                        $student_session = $student->session;
                        $student_semester = $student->semester;
                        $student_section = $student->section;
                        $exam = exam_table($result->question_id);
                        $subject = $exam->subject;
                        $result = array_sum(json_decode($result->teacher_marks));

                    ?>
                    <tr>
                        <td><?php print $student_name; ?></td>
                        <td><?php print $student_department; ?></td>
                        <td><?php print $student_session; ?></td>
                        <td><?php print $student_semester; ?></td>
                        <td><?php print strtoupper($student_section); ?></td>
                        <td><?php print $result; ?></td>
                        <td><?php print $subject; ?></td>
                        <td><?php print Carbon::parse($exam->created_at)->toDayDateTimeString(); ?></td>
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