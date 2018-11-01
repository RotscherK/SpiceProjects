<?php

use domain\Program;
use domain\Provider;

isset($this->provider) ? $provider = $this->provider : $provider = new Provider();
isset($this->program) ? $program = $this->program : $program = new Program();

?>

<!DOCTYPE html>
<html>
<body>
<p>Dear <?php echo $this->firstname; ?></p>
<p>The course <?php echo $program->getName; ?> provided by <?php echo $provider->getName; ?> is expired.</p>
<p>Kind regards</p>
<p>Spice Projects Team</p>
</body>
</html>