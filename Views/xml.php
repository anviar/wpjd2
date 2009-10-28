<?php
header('Content-Type: application/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<webpresence>
    <status><?php echo $data['status']; ?></status>
    <show><?php echo (!empty($data['show']) ? $data['show'] : ''); ?></show>
    <login><?php echo $data['last-login']; ?></login>
    <logout><?php echo $data['last-logout']; ?></logout>
</webpresence>