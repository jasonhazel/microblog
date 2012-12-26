<?php
$f3->set('UI','app/views/');
$f3->set('AUTOLOAD','app/;');
$f3->set('DEBUG', 2);

$f3->set('DB', new DB\SQL(
    'mysql:host=localhost;port=3306;dbname=mrhazel',
    'mrhazel',
    'DV6B4cAJmxKu42Cw'
));


