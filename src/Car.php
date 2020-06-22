<?php

namespace Game;

class Car extends AbstractVehicle
{
    protected $maxSpeed = 300;

    protected function preMove(): void
    {
        $this->distanceTraveled += $this->maxSpeed * rand(70, 100) / 100;
    }
}