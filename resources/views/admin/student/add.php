<?php __admin_header__(); ?>

<div class="row">
    <div class="col col-md-6 mx-auto">
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
            <div class="mb-3">
                <label for="Department" class="form-label">Department</label>
                <select name="department" id="department" class="form-control">
                    <option>Computer</option>
                    <option>Electrical</option>
                    <option>Mechanical</option>
                    <option>Civil</option>
                    <option>Power</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="section" class="form-label">Section</label>
                <select name="section" id="section" class="form-control">
                    <option>A</option>
                    <option>B</option>
                </select>
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