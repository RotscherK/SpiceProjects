<?php

isset($this->exceptionCode) ? $exceptionCode = $this->exceptionCode : $exceptionCode = '404';
isset($this->exceptionText) ? $exceptionText = $this->exceptionText : $exceptionText = 'Page not found';

?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form method="post">
            <h2 class="text-center">Spice Project</h2>
            <div class="text">
                <h3 class="text-center"><?php echo $exceptionCode; ?><strong> <?php echo $exceptionText;?> </strong></h3>
                <p class="text-center"><?php if($exceptionCode == "403"): echo "The action could not be completed due to existing dependencies.<br>
                    If you are trying to delete a provider, please make sure that it is not listed in any program first.<br>
                    If you are trying to delete a user, please check that it is not listed as an administrator for any provider.<br>"; endif; ?></p>
                <p class="text-center">Get back to the <a href="<?php echo $GLOBALS["ROOT_URL"]; ?>">homepage</a></p>
            </div>
        </form>
    </div>
</div>