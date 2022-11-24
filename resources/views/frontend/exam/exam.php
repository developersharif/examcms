<?php __header__();

use Carbon\Carbon;

$questions = json_decode($exam->questions);
$start = Carbon::create($exam->start);
$end = Carbon::create($exam->end);
$isLive = ($start->lessThan(Carbon::now()) && $end->greaterThan(Carbon::now())) ? '' : 'disabled';

?>
<div class="container">

    <div class="bg-light text-center">
        <hr>
        <h3><?php print $exam->name; ?></h3>
        <hr>
        <p><?php print $exam->department . ' (' . $exam->session . ') ' . $exam->semester . ' semester'; ?></p>
        <p>Section: <?php print ucwords($exam->section); ?></p>
        <p>Subject: <?php print $exam->subject; ?></p>
        <p>Marks: <?php print $exam->total_mark; ?></p>

    </div>
    <?php notify("exam"); ?>
    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#quiz" role="tab" aria-controls="quiz"
                aria-selected="true">Questions</a>
        </li>
        <li id="countdown">
            <div class="row">
                <div class="col col-md-3 mx-auto">
                    <div>

                        <ul class=" list-group-horizontal d-flex justify-content-center">
                            <li class="list-group-item"><b>Timer</b></li>
                            <li class="list-group-item"><span id="days"></span>days</li>
                            <li class="list-group-item"><span id="hours"></span>Hours</li>
                            <li class="list-group-item"><span id="minutes"></span>Minutes</li>
                            <li class="list-group-item"><span id="seconds"></span>Seconds</li>
                        </ul>

                    </div>

                </div>
            </div>
        </li>
        <li id="content">

        </li>

    </ul>

    <div class="tab-content">
        <div class="tab-pane fade show active" id="quiz" role="tabpanel" aria-labelledby="quiz-tab">
            <?php $counter = 0;
            if (!$start->greaterThanOrEqualTo(Carbon::now())) {
            ?>
            <form action="" method="POST">
                <?php
                    foreach ($questions->questions as $question) : $counter++; ?>
                <div class="card border-info mb-4 ">

                    <div class="d-flex justify-content-between align-items-center card-header " id="h1">
                        <span>Question <?php print $counter; ?></span>
                        <button type="button" data-toggle="collapse" data-target="#q1" aria-expanded="false"
                            aria-controls="q1" class="btn btn-light"><svg width="1em" height="1em" viewBox="0 0 16 16"
                                class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </button>
                    </div>
                    <div id="q1" class="collapse show" aria-labelledby="h1">
                        <div class="card-body">
                            <p><?php print $question->question; ?>
                                <span class="float-right">x <?php print $question->marks; ?></span>
                            </p>


                            <div class="answer">
                                <input type="text" class="form-control" name="answer[]" placeholder="Write your Answer"
                                    <?php print $isLive; ?>>
                                <input type="hidden" name="marks[]" value="<?php print $question->marks ?>">
                            </div>



                        </div>

                    </div>
                </div>

                <?php endforeach; ?>
                <input type="submit" value="submit" name="submit" class="btn btn-success" <?php print $isLive; ?>>
                <?php
            } else {
                print "<h3 class='text-center text-success bg-light'>Exam will start at " . Carbon::parse($start)->toDayDateTimeString() . "</h3>";
            }


                ?>
            </form>

        </div>
    </div>
</div>
<script>
(function() {
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    //I'm adding this section so I don't have to keep updating this pen every year :-)
    //remove this if you don't need it
    let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 1,
        dayMonth = "11/13/",
        endExam = dayMonth + yyyy;

    today = mm + "/" + dd + "/" + yyyy;
    if (today > endExam) {
        endExam = dayMonth + nextYear;
    }
    //end
    endExam = "<?php print Carbon::parse($exam->end)->toDayDateTimeString(); ?>";
    const countDown = new Date(endExam).getTime(),
        x = setInterval(function() {

            const now = new Date().getTime(),
                distance = countDown - now;

            document.getElementById("days").innerText = Math.floor(distance / (day)),
                document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

            //do something later when date is reached
            if (distance < 0) {
                // document.getElementById("headline").innerText = "Time Finished!";
                document.getElementById("countdown").style.display = "none";
                let content = document.getElementById("content");
                content.style.display = "block";
                content.innerHTML = `<span class="alert alert-danger" role="alert">Time Finished!</span>`;
                clearInterval(x);
            }
            //seconds
        }, 0)
}());
</script>
<?php __footer__(); ?>