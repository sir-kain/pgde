<?php
$container->setParameter('database_driver', 'pdo_mysql');
$container->setParameter('database_host', 'johnny.heliohost.org');
$container->setParameter('database_port', 3306);
$container->setParameter('database_name', 'ahmadouw_pgde');
$container->setParameter('database_user', 'ahmadouw');
$container->setParameter('database_password', '6508013awn');
$container->setParameter('secret', getenv('secret'));
$container->setParameter('locale', 'fr');
$container->setParameter('mailer_transport', 'gmail');
$container->setParameter('mailer_host', 'smtp.gmail.com');
$container->setParameter('mailer_user', 'fpublique2018@gmail.com');
$container->setParameter('mailer_password', 'Fpublique@2018');