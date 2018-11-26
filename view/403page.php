<?php
/**
 * Created by PhpStorm.
 * User: timothyapplewhite
 * Date: 26.11.18
 * Time: 09:05
 */

use view\TemplateView;
use http\HTTPException;

isset($this->exceptionCode) ? $exceptionCode = $this->exceptionCode : $exceptionCode = '403';
isset($this->exceptionText) ? $exceptionText = $this->exceptionText : $exceptionText = 'Access denied';

?>

<div class="col-sm-10 text-left blue-background">
    <div class="form-clean">
        <form method="post">
            <h2 class="text-center">Spice Project</h2>
            <div class="text">
                <h3 class="text-center"><?php echo $exceptionCode; ?><strong> <?php echo $exceptionText;?> </strong>    </h3>
                <p class="text-center">You do not have sufficient rights to access this site <br>
                    <a href="<?php echo $GLOBALS["ROOT_URL"]; ?>">homepage</a> instead? </p>


            </div>
        </form>
    </div>
</div>