<?php __admin_header__(); ?>

<div class="row">
    <div class="col col-md-10 mx-auto">
        <?php notify('add_exam'); ?>
        <h2>Create Student Examination.</h2>
        <form action="" method="post">
            <?php set_csrf(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Exam Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Exam Name">
            </div>
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="Department" class="form-label">Department</label>
                    <select name="department" id="department" class="form-control">
                        <option>Computer</option>
                        <option>Electrical</option>
                        <option>Mechanical</option>
                        <option>Civil</option>
                        <option>Power</option>
                    </select>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="session" class="form-label">Session</label>
                    <select name="session" id="session" class="form-control">
                        <option>19-20</option>
                        <option>21-22</option>
                        <option>23-24</option>
                    </select>
                </div>

                <div class="mb-3 col-md-3">
                    <label for="semester" class="form-label">semester</label>
                    <select name="semester" id="semester" class="form-control">
                        <option>1st</option>
                        <option>2nd</option>
                        <option>3rd</option>
                        <option>4th</option>
                        <option>5th</option>
                        <option>6th</option>
                        <option>7th</option>
                        <option>8th</option>
                    </select>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="section" class="form-label">Section</label>
                    <select name="section" id="section" class="form-control">
                        <option>A</option>
                        <option>B</option>
                    </select>
                </div>

                <div class="mb-3 col-md-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject Name">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="marks" class="form-label">Marks</label>
                    <input type="number" class="form-control" id="marks" name="total_marks" placeholder="Total Marks">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="start" class="form-label">Start Exam</label>
                    <input type="datetime-local" class="form-control" id="start" name="date_start" required>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="end" class="form-label">End Exam</label>
                    <input type="datetime-local" class="form-control" id="end" name="date_end" required>
                </div>
            </div>

            <div class="form-row fieldGroup">


                <div class="form-group col-md-12 ">
                    <b> Questions: </b> <a href="javascript:void(0)"
                        class="btn btn-primary btn-sm addMore float-right"><span class="bi bi-plus"
                            aria-hidden="true"></span> Add</a>
                </div>
                <hr>
                <div class="input-group" id="questions_">
                    <div class="form-group col-md-9">
                        <input type="text" name="questions[]" class="form-control" placeholder="question " />
                    </div>
                    <div class="form-group col-md-2">
                        <input type="number" name="marks[]" class="form-control" placeholder="marks" />
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Create">
        </form>
    </div>
</div>






<!-- copy of input fields group -->
<div class="form-group fieldGroupCopy options_form" style="display: none;">

    <div class="input-group options_form " id="questions_">
        <div class="form-group col-md-9">
            <input type="text" name="questions[]" id="question" class="form-control" placeholder="Question" />
        </div>
        <div class="form-group col-md-2">
            <input type="text" name="marks[]" id="marks" class="form-control" placeholder="marks" />
        </div>

        <div class="form-group col-md-1">
            <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-sm remove"><span
                    class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> x </a>
        </div>
    </div>

</div>


<?php __admin_footer__(); ?>
<script>
$(document).ready(function() {

    //group add limit
    var counter = 1;

    //add more fields group
    $(".addMore").click(function() {
        counter++;
        //$(".fieldGroupCopy #question").attr('placeholder', 'question ' + counter);
        var fieldHTML = '<div class="form-group col col-md-12">' + $(".fieldGroupCopy").html() +
            '</div>';
        $('body').find('#questions_:last').after(fieldHTML);



    });

    //remove fields group
    $("body").on("click", ".remove", function() {
        $(this).parents(".options_form").remove();
    });

});
</script>