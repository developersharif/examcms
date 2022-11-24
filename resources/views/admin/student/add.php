<?php __admin_header__(); ?>

<div class="row">
    <div class="col col-md-8 mx-auto">
        <?php notify('add_student'); ?>
        <h2>Create Student Account.</h2>
        <form action="" method="post">
            <?php set_csrf(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Student Name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Student Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <div class="row">
                <div class="mb-3 col-md-4">
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
                <div class="mb-3 col-md-2">
                    <label for="section" class="form-label">Section</label>
                    <select name="section" id="section" class="form-control">
                        <option>A</option>
                        <option>B</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label for="roll" class="form-label">Roll</label>
                <input type="number" class="form-control" id="roll" name="roll" placeholder="Board Roll">
            </div>
            <input type="submit" class="btn btn-primary" name="submit" value="Add Student">
        </form>
    </div>
</div>




<?php __admin_footer__(); ?>