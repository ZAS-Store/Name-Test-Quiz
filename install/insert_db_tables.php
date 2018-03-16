<?php

$insert_query = $db->query("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."test (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `unic_result` varchar(200) NOT NULL DEFAULT 'FALSE-RES',
  `life_result` varchar(200) NOT NULL DEFAULT 'DELAY',
  `rcount` int(123) NOT NULL DEFAULT '1000',
  `views` int(123) NOT NULL,
  `nombreseo` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  `time` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;"
);	    

if($insert_query)
    $insert = TABLE_PREFIX.'test Successful insertion Table <br />';
else
    $insert = TABLE_PREFIX.'test failed insertion Table <br />';

$insert_query = $db->query("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."result (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_test` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `save_result` varchar(200) NOT NULL DEFAULT 'No',
  `use_avatar` int(1) NOT NULL DEFAULT '1',
  `use_friend` int(1) NOT NULL DEFAULT '1',
  `user_av` varchar(250) NOT NULL DEFAULT 's: 150, x: 93, y: 86',
  `friend_av1` varchar(250) NOT NULL DEFAULT 's: 150, x: 93, y: 250',
  `friend_av2` varchar(250) NOT NULL,
  `friend_av3` varchar(250) NOT NULL,  
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;"
);

if($insert_query)
    $insert .= TABLE_PREFIX.'result Successful insertion Table <br />';
else
    $insert .= TABLE_PREFIX.'result failed insertion Table <br />';

$insert_query = $db->query("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."view (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(200) NOT NULL,
  `region` varchar(200) NOT NULL,
  `views` int(123) NOT NULL,
  `uid` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;"
);	    

if($insert_query)
    $insert .= TABLE_PREFIX.'visitas Successful insertion Table <br />';
else
    $insert .= TABLE_PREFIX.'visitas failed insertion Table <br />';

$insert_query = $db->query("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."region (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region` varchar(200) NOT NULL,
  `views` int(123) NOT NULL,
  `time` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;"
);	    

if($insert_query)
    $insert .= TABLE_PREFIX.'pais Successful insertion Table <br />';
else
    $insert .= TABLE_PREFIX.'pais failed insertion Table <br />';

$insert_query = $db->query("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."users (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_on` varchar(20) NOT NULL,
  `active` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;"
);

if($insert_query)
    $insert .= TABLE_PREFIX.'users Successful insertion Table <br />';
else
    $insert .= TABLE_PREFIX.'users failed insertion Table <br />';

$insert_query = $db->query("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."users_test (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `fid` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `id_result` varchar(80) NOT NULL,
  `result` varchar(200) NOT NULL,
  `time_inc` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;"
);

if($insert_query)
    $insert .= TABLE_PREFIX.'users_test Successful insertion Table <br />';
else
    $insert .= TABLE_PREFIX.'users_test failed insertion Table <br />';

$insert_query = $db->query("CREATE TABLE IF NOT EXISTS ".TABLE_PREFIX."config (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `siteName` varchar(100) NOT NULL,
  `siteDescription` varchar(500) NOT NULL,
  `siteUri` varchar(200) NOT NULL,
  `FanPage` varchar(200) NOT NULL,
  `FB_ID` varchar(200) NOT NULL,
  `analytics_ID` varchar(200) NOT NULL,
  `ads_720` text CHARACTER SET utf8 NOT NULL,
  `ads_300` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;"
);

if($insert_query)
    $insert .= TABLE_PREFIX.'config Successful insertion Table <br />';
else
    $insert .= TABLE_PREFIX.'config failed insertion Table <br />';
