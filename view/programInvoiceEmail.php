<?php

use domain\Provider;

isset($this->provider) ? $provider = $this->provider : $provider = new Provider();

?>

<!DOCTYPE html>
<html>
<body>
<p>Dear Ladies and Gentlemen</p>
<p>Please find attached monthly invoice for the provider <?php echo $provider->getName(); ?>. </p>
<p>Kind regards</p>
<p>Your Spice Projects Team</p>
</body>
</html>