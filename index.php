<?php

require_once __DIR__ . '/vendor/autoload.php';

use \Game\Race;
use \Game\Weather;
use \Game\VehicleFactory;
use \Game\VehicleBuilder;
use \Game\ShinyCar;

$b = new DI\ContainerBuilder();
$b->addDefinitions(
    [
        'VehicleBuilder' => DI\create(VehicleBuilder::class),
        'Weather' => DI\factory(
            [
                Weather::class,
                'getInstance'
            ]
        ),
        'Race' => DI\create(Race::class)->constructor(DI\get('Weather'))
    ]
);
$container = $b->build();

$builder = $container->get("VehicleBuilder");
$race = $container->get('Race');

// Building cars
$builder->setType(VehicleFactory::CAR);

$builder->setName("Michał");
$race->addVehicle($builder->build());

$builder->setName("Marysia");
$race->addVehicle(new ShinyCar($builder->build()));

$builder->setName("Paulina");
$race->addVehicle($builder->build());

// Building motorcycles
$builder->setType(VehicleFactory::MOTORCYCLE);

$builder->setName("Sławek");
$race->addVehicle($builder->build());

$builder->setName("Monika");
$race->addVehicle($builder->build());

// Building trucks
$builder->setType(VehicleFactory::TRUCK);

$builder->setName("Paweł");
$race->addVehicle($builder->build());

$builder->setName("Artur");
$race->addVehicle($builder->build());

$race->run();