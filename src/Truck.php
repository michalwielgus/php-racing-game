<?php

namespace Game;

class Truck extends AbstractVehicle
{
    protected $maxSpeed = 150;

    protected function preMove(): void
    {
        $this->distanceTraveled += $this->maxSpeed * rand(80, 100) / 100;
    }
}