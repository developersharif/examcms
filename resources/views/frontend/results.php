<?php

use Carbon\Carbon;

__header__();
?>
<div class="container">
    <div class="row">
        <div class="col col-md-12 mx-auto">
            <h2>Exam Results:</h2>
            <ul class="list-group">
                <?php foreach ($results as $result) :
                    $marks = json_decode($result->teacher_marks);
                    $marks = array_sum($marks);
                    $teacher = userinfo($result->teacher_id)->name;
                    $subject = exam_table($result->question_id)->subject;

                ?>
                <li class="list-group-item">
                    <p><span class="badge badge-pill badge-primary"><?php print $subject; ?></span></p>
                    <p>Marks: <?php print $marks; ?></p>
                    <p>Teacher: <?php print $teacher; ?></p>
                    <p>Published:<?php print Carbon::parse($result->created_at)->diffForHumans(); ?></p>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>
</div>
<?php __footer__(); ?>