<?php

use view\TemplateView;
use http\HTTPException;

isset($this->exceptionCode) ? $exceptionCode = $this->exceptionCode : $exceptionCode = '404';
isset($this->exceptionText) ? $exceptionText = $this->exceptionText : $exceptionText = 'Page not found';

?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form method="post">
            <h2 class="text-center">Spice Project</h2>
            <div class="text">
                <h3 class="text-center"><?php echo $exceptionCode; ?><strong> <?php echo $exceptionText;?> </strong>    </h3>
                <p class="text-center">We couldn't find this url on our server. Maybe you'd like to try our <a href="<?php echo $GLOBALS["ROOT_URL"]; ?>">homepage</a> instead? </p>


            </div>
        </form>
    </div>
</div>