<?php

$insert_query = $db->query("INSERT INTO ".TABLE_PREFIX."test (`id`, `titulo`, `descripcion`, `imagen`, `rcount`, `nombreseo`, `estado`) VALUES
(1, 'Que tan Sexy eres', '&iquest;Te crees sexy? &iquest;Te lo han dicho? Aver&iacute;gualo aqu&iacute;', 'images/8690671442343442725229.jpg', 20493, 'sexy', 1),
(2, 'conoce tu alma gemela', 'descubre aqui tu alma gemela', 'images/7994171442353677748193.jpg', 24345, 'gemela', 1),
(3, '¿Qui&eacute;n te quiere INVITAR a SALIR?', '¿Qui&eacute;n te quiere INVITAR a SALIR?', 'images/7246971442354196714336.jpg', 35041, 'salir', 1),
(4, '¿Por que son buscados tu amigo y tu?', 'Descubre por que delito te buscan con tu amigo en este juego', 'images/5692471444193260728588.jpg', 12490, 'buscados', 1),
(5, '¿Cuantos hijos voy a tener?', 'descubre aqui cuantos hijos tendras', 'images/8948471447341537743170.jpg', 31000, 'hijos', 1),
(6, '¿Con QUIEN te vas a CASAR?', '¿Te da curiosidad saber con quien te vas a casar?', 'images/8263971447341680735543.jpg', 24080, 'casar', 1),
(7, 'Duelo entre amigos, ¿quien ganara?', '¿Quien es mejor mejor?', 'images/6454371447343851744556.jpg', 12560, 'duelo', 1),
(8, '¿Que EDAD creen que tienes?', '¿que edad aparentas? ¡Que esperas para descubrirlo!', 'images/5678071447344487740000.jpg', 21040, 'edad', 1);");

if($insert_query)
    $insert = TABLE_PREFIX.'test Successful insertion Data <br />';
else
    $insert = TABLE_PREFIX.'test failed insertion Data <br />';

$insert_query = $db->query("INSERT INTO ".TABLE_PREFIX."result (`id`, `id_test`, `titulo`, `descripcion`, `imagen`, `use_avatar`, `use_friend`, `user_av`, `friend_av1`, `friend_av2`, `friend_av3`) VALUES
(1, 4, 'te buscan', 'ofrecen 2.400.000 $', 'images/7923871445094110741891.png', 1, 1, 'status:200,s:103,x:77,y:58', 'status:200,s:104,x:77,y:179', '', ''),
(2, 4, 'te buscan', 'ofrecen 5.300.000 $', 'images/8473871445094226733875.png', 1, 1, 'status:200,s:103,x:77,y:58', 'status:200,s:104,x:77,y:179', '', ''),
(3, 4, 'te buscan', 'ofrecen 1.000.000 $', 'images/8835871445094067711678.png', 1, 1, 'status:200,s:103,x:77,y:58', 'status:200,s:104,x:77,y:179', '', ''),
(4, 4, 'te buscan', 'ofrecen 1.750.000 $', 'images/6204371445094196731195.png', 1, 1, 'status:200,s:103,x:77,y:58', 'status:200,s:104,x:77,y:179', '', ''),
(5, 4, 'te buscan', 'ofrecen 5.250.000 $', 'images/6314671445094142728018.png', 1, 1, 'status:200,s:103,x:77,y:58', 'status:200,s:104,x:77,y:179', '', ''),
(6, 2, 'tu alma gemela es', 'e.e no me lo esperaba', 'images/7608871446076009747632.png', 1, 1, 'status:100', 'status:200,s:131,x:222,y:113', '', ''),
(7, 1, 'que tan sexy eres', '*-* por dios que sexy xD', 'images/8817571446076611720801.png', 1, 1, 'status:200,s:131,x:39,y:75', 'status:100', '', ''),
(8, 1, 'que tan sexy eres', '*-* por dios que sexy xD', 'images/38485728974.png', 1, 1, 'status:200,s:131,x:39,y:75', 'status:100', '', ''),
(9, 1, 'que tan sexy eres', '*-* por dios que sexy xD', 'images/234234234234.png', 1, 1, 'status:200,s:131,x:39,y:75', 'status:100', '', ''),
(10, 1, 'que tan sexy eres', '*-* por dios que sexy xD', 'images/234239489238.png', 1, 1, 'status:200,s:131,x:39,y:75', 'status:100', '', ''),
(11, 1, 'que tan sexy eres', '*-* por dios que sexy xD', 'images/4533453453234.png', 1, 1, 'status:200,s:131,x:39,y:75', 'status:100', '', ''),
(12, 3, '¿Quién me quiere INVITAR a SALIR?', 'Recibi mi paga... $$$ mil cervezas nos tomamos y nos vamos de fiesta!!!  \r\nEtiqueta a {[F]} y comparte el resultado. ¡Seguro que se sorprender¡!', 'images/5730671447341025717964.png', 1, 1, 'status:100', 'status:200,s:117,x:29,y:119', '', ''),
(13, 3, '¿Quién me quiere INVITAR a SALIR?', 'Recibi mi paga... $$$ mil cervezas nos tomamos y nos vamos de fiesta!!!  \r\nEtiqueta a {[F]} Rodrigues Vieira y comparte el resultado. ¡Seguro que se sorprender¡!', 'images/6548484984948498.png', 1, 1, 'status:100', 'status:200,s:117,x:29,y:119', '', ''),
(14, 3, '¿Quién me quiere INVITAR a SALIR?', 'Recibi mi paga... $$$ mil cervezas nos tomamos y nos vamos de fiesta!!!  \r\nEtiqueta a {[F]} Rodrigues Vieira y comparte el resultado. ¡Seguro que se sorprender¡!', 'images/46549798614548454848548485.png', 1, 1, 'status:100', 'status:200,s:117,x:29,y:119', '', ''),
(15, 5, '¿Cuántos hijos voy a tener?', 'valla tendras bastantes hijos', 'images/7742771447341881720735.png', 1, 1, 'status:200,s:182,x:82,y:68', 'status:100', '', ''),
(17, 5, '¿Cuántos hijos voy a tener?', 'valla tendras bastantes hijos', 'images/1548749849848548.png', 1, 1, 'status:200,s:182,x:82,y:68', 'status:100', '', ''),
(18, 6, '¿Con quien te vas a CASAR?', 'felicidades por tu boda', 'images/6038571447342693734691.jpg', 1, 1, 'status:200,s:81,x:125,y:16', 'status:200,s:73,x:372,y:60', '', ''),
(19, 7, 'Duelo entre amigos, ¿quien ganara?', 'asi debe ser :P', 'images/7155571447344087735440.png', 1, 1, 'status:200,s:130,x:84,y:8', 'status:200,s:128,x:367,y:10', '', ''),
(20, 7, 'Duelo entre amigos, ¿quien ganara?', 'asi debe ser :P', 'images/485484848484.png', 1, 1, 'status:200,s:130,x:84,y:8', 'status:200,s:128,x:367,y:10', '', ''),
(21, 7, 'Duelo entre amigos, ¿quien ganara?', 'asi debe ser :P', 'images/45484848484848.png', 1, 1, 'status:200,s:130,x:84,y:8', 'status:200,s:128,x:367,y:10', '', ''),
(22, 7, 'Duelo entre amigos, ¿quien ganara?', 'asi debe ser :P', 'images/4485484848484487.png', 1, 1, 'status:200,s:130,x:84,y:8', 'status:200,s:128,x:367,y:10', '', ''),
(23, 8, '¿Que EDAD creen que tienes?', 'jajajaja valla sorpresa ', 'images/7311071447563550739170.png', 1, 1, 'status:200,s:126,x:113,y:133', 'status:100', '', ''),
(24, 8, '¿Que EDAD creen que tienes?', 'jajajaja valla sorpresa ', 'images/5854874888777878.png', 1, 1, 'status:200,s:126,x:113,y:133', 'status:100', '', ''),
(25, 8, '¿Que EDAD creen que tienes?', 'jajajaja valla sorpresa ', 'images/8574878748878.png', 1, 1, 'status:200,s:126,x:113,y:133', 'status:100', '', ''),
(26, 8, '¿Que EDAD creen que tienes?', 'jajajaja valla sorpresa ', 'images/41545488777874877.png', 1, 1, 'status:200,s:126,x:113,y:133', 'status:100', '', ''),
(27, 8, '¿Que EDAD creen que tienes?', 'jajajaja valla sorpresa ', 'images/487848548488478.png', 1, 1, 'status:200,s:126,x:113,y:133', 'status:100', '', '');");

if($insert_query)
    $insert .= TABLE_PREFIX.'result Successful insertion Data <br />';
else
    $insert .= TABLE_PREFIX.'result failed insertion Data <br />';

$insert_query = $db->query("INSERT INTO ".TABLE_PREFIX."users_test (`id`, `uid`, `id_result`) VALUES
(1, '10200825166989239', '1'),
(2, '10202854552643133', '1'),
(3, '996924803674777', '1'),
(4, '1120366151313492', '2'),
(5, '901908059854796', '2'),
(6, '837755886260202', '2'),
(7, '820315358022971', '2'),
(8, '871101189594375', '3'),
(9, '947365928642368', '3'),
(10, '890414301005303', '3'),
(11, '899399340105712', '3'),
(12, '840104082734893', '4'),
(13, '859838724101440', '4'),
(14, '859533657444896', '4'),
(15, '879037402166420', '5'),
(16, '937224006336928', '5'),
(17, '918051378251472', '6'),
(18, '866670440076834', '6'),
(19, '860769480657360', '6'),
(20, '927317927339114', '6'),
(21, '671592286286347', '7'),
(23, '784206111698709', '7'),
(24, '697099593757685', '7'),
(25, '812764268814072', '7'),
(26, '768318509932360', '8'),
(27, '826435477448754', '8'),
(28, '840517199376611', '8'),
(29, '882741021818500', '8'),
(30, '613029492166327', '8'),
(31, '806617586123487', '8'),
(32, '551313791674388', '8'),
(34, '712290632210103', '8'),
(35, '547865012023300', '8'),
(36, '691450864317848', '5'),
(37, '620244611445209', '5'),
(38, '364132557126320', '4');");

if($insert_query)
    $insert .= TABLE_PREFIX.'users_test Successful insertion Data <br />';
else
    $insert .= TABLE_PREFIX.'users_test failed insertion Data <br />';

$insert_query = $db->query("INSERT INTO ".TABLE_PREFIX."config (`id`, `siteName`, `siteDescription`) VALUES
(1, 'testing ZDK', 'diviertete con tus amigos con estos divertidos test!');");

if($insert_query)
    $insert .= TABLE_PREFIX.'config Successful insertion Data <br />';
else
    $insert .= TABLE_PREFIX.'config failed insertion Data <br />';