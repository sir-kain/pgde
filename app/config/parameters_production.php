<?php

$container->setParameter('database_driver', 'pdo_mysql');
$container->setParameter('database_host', 'johnny.heliohost.org');
$container->setParameter('database_port', 3306);
$container->setParameter('database_name', 'sirkane_pgde');
$container->setParameter('database_user', 'sirkane_pgdeus');
$container->setParameter('database_password', 'passer@1');
$container->setParameter('secret', 'db1b548114372a7701e95e2282052750165a6241');
$container->setParameter('locale', 'fr');
$container->setParameter('mailer_transport', 'gmail');
$container->setParameter('mailer_host', 'smtp.gmail.com');
$container->setParameter('mailer_user', 'fpublique2018@gmail.com');
$container->setParameter('mailer_password', 'Fpublique@2018');