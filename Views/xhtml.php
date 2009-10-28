<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8"/>
	<title>Jabber Staus for JID <?php echo $data['collection-owner']; ?></title>
</head>
<body>
    <p>
        Status: <img src="<?php echo $image; ?>" alt="status" /> <br />
        Show : <?php echo (!empty($data['show']) ? $data['show'] : ''); ?> <br />
        Last login: <?php echo $data['last-login']; ?> <br />
        Last logout: <?php echo $data['last-logout']; ?> 
    </p>
</body>