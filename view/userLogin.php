<div class="col-sm-10 text-left">
    <div class="form-clean">
        <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/login" method="post">
            <h2 class="text-center">Login</h2>
            <div class="form-group">
                <input class="form-control is-invalid" type="email" name="email" placeholder="Email">
                <small class="form-text text-danger">Please enter a correct email address.</small>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="form-control">
                    <div class="checkbox">
                        <label class="control-label">
                            <input type="checkbox" name="remember" />Remember me for 30 days
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right" type="submit">Log In</button>
            </div>
                <a class="text-primary already" href="<?php echo $GLOBALS["ROOT_URL"]; ?>/password/request">Opps, I forgot my password.</a><br>
                <a class="text-primary already" href="<?php echo $GLOBALS[" ROOT_URL"]; ?>/register">Register here.</a>
        </form>
    </div>
</div>