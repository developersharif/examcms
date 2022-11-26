<?php

use Carbon\Carbon;

__header__(); ?>


<div class="container">
    <h2>Exams:</h2>
    <ul class="list-group">
        <?php foreach ($exams as $exam) : ?>
        <li class="list-group-item clearfix">
            <a href="exam/<?php print $exam->id; ?>"><img class="img-responsive img-rounded"
                    src="https://avatars.dicebear.com/api/identicon/<?php print $exam->subject; ?>.svg" alt="" />
                <h5 class="list-group-item-heading">
                    <?php print $exam->name; ?>
                    <span class="badge badge-pill badge-primary"><?php print $exam->subject; ?></span>
                </h5>
            </a>
            <p class=" list-group-item-text ">
                Teacher: <?php print userinfo($exam->teacher_id)->name; ?> <br />
                Marks: <?php print   $exam->total_mark;
                            $end = Carbon::create($exam->end);
                            $class = ($end->greaterThan(Carbon::now())) ? 'bg-success' : 'bg-danger';
                            ?> <br />
                <b class="<?php print $class; ?> text-white">Start:
                </b><?php
                        print(Carbon::parse($exam->start)->toDayDateTimeString()); ?>
                <b> End:</b> <?php print(Carbon::parse($exam->end)->toDayDateTimeString()); ?>
            </p>

        </li>
        <?php endforeach; ?>

    </ul>
</div>

<?php __footer__(); ?>