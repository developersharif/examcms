<?php

use Carbon\Carbon;

__admin_header__();
$question_info = exam_table($answer->question_id);
$student = student_table($answer->student_id);
$answers = $answer->answers;
$answers = json_decode($answers);
$question = json_decode($question_info->questions);

?>
<div class="row">
    <div class="col col-md-11 mx-auto">
        <div class="card">
            <div class=" card-header">
                <h3><?php print $question_info->name; ?></h3>
                <hr>
                <p><?php print $question_info->department . ' (' . $question_info->session . ') ' . $question_info->semester . ' semester'; ?>
                </p>
                <p>Section: <?php print ucwords($question_info->section); ?></p>
                <p>Subject: <?php print $question_info->subject; ?></p>
                <p>Marks: <?php print $question_info->total_mark; ?></p>
                <p>Name: <?php print $student->name; ?></p>
                <p>Roll: <?php print $student->roll; ?></p>
                <p>Submitted at <?php print Carbon::parse($answer->created_at)->toDayDateTimeString(); ?></p>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <?php $counter = 0;
                    foreach ($answers as $answer) {

                    ?>

                    <div class="card border-info mb-4 ">

                        <div class="d-flex justify-content-between align-items-center card-header " id="h1">
                            <span>Question <?php print $counter; ?></span>
                            <button type="button" data-toggle="collapse" data-target="#q1" aria-expanded="false"
                                aria-controls="q1" class="btn btn-light"><svg width="1em" height="1em"
                                    viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </button>
                        </div>
                        <div id="q1" class="collapse show" aria-labelledby="h1">
                            <div class="card-body">
                                <p><b><?php print $question->questions[$counter]->question; ?></b>
                                    <span class="float-right">x
                                        <?php print $question->questions[$counter]->marks;; ?></span>
                                </p>


                                <div class="answer">
                                    <p>
                                        <?php print $answer->answers; ?>
                                    </p>
                                    <input type="number" name="marks[]" class="form-control" placeholder="Marks"
                                        style="width:40%">
                                </div>



                            </div>

                        </div>
                    </div>
                    <?php
                        $counter++;
                    } ?>
                    <input type="submit" value="submit" name="submit" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>

<?php __admin_footer__(); ?>