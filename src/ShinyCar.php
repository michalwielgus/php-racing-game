<?php

namespace Game;

class ShinyCar implements VehicleInterface, ObserverInterface
{
    private $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function notify(string $event): void
    {
        $this->car->notify($event);
    }

    public function move(): void
    {
        ob_start();
        $this->car->move();
        ob_end_clean();

        echo "\n Moving and shining Car(" . $this->car->getName() . ") by " . $this->car->getDistanceTraveled() . "km.";
    }

    public function getDistanceTraveled(): float
    {
        return $this->car->getDistanceTraveled();
    }

    public function getType(): string
    {
        return $this->car->getType();
    }

    public function getName(): string
    {
        return $this->car->getName();
    }
}