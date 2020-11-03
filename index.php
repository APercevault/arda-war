<?php

$dbopts = parse_url(getenv('DATABASE_URL'));
$app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
               array(
                'pdo.server' => array(
                   'driver'   => 'pgsql',
                   'user' => $dbopts["khfcstkveeyuai"],
                   'password' => $dbopts["83266405a0e788ec4deb36dec675e71aac5ea904bf18719953e563135de1c99e"],
                   'host' => $dbopts["ec2-34-238-26-109.compute-1.amazonaws.com
                   "],
                   'port' => $dbopts["5432"],
                   'dbname' => ltrim($dbopts["path"],'/')
                   )
               )
);

$app->get('/db/', function() use($app) {
    $st = $app['pdo']->prepare('SELECT name FROM test_table');
    $st->execute();
  
    $names = array();
    while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
      $app['monolog']->addDebug('Row ' . $row['name']);
      $names[] = $row;
    }
  
    return $app['twig']->render('database.twig', array(
      'names' => $names
    ));
  });