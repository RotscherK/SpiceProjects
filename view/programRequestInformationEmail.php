<?php

use domain\Program;

isset($this->program) ? $program = $this->program : $program = new Program();

?>

<!DOCTYPE html>
<html>
<body>
<p>Dear Provider,</p>
<p>A question has been asked on one of your programs: <?php echo $program->getName(); ?>. </p>

<p>Kind regards</p>
<p>Your Spice Projects Team</p>
</body>
</html>