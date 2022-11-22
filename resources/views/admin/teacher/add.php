<?php __admin_header__(); ?>

<div class="row">
    <div class="col col-md-6 mx-auto">
        <?php notify('add_teacher'); ?>
        <h2>Create Teacher Account.</h2>
        <form action="" method="post">
            <?php set_csrf(); ?>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Teacher Name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Teacher Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <input type="submit" class="btn btn-primary" name="submit" value="Add Teacher">
        </form>
    </div>
</div>




<?php __admin_footer__(); ?>