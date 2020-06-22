<?php

namespace Game;

class Motorcycle extends AbstractVehicle
{
    protected $maxSpeed = 250;

    protected function preMove(): void
    {
        $this->distanceTraveled += $this->maxSpeed * rand(20, 100) / 100;
        $weather = Weather::getInstance();
        if ($weather->isRaining()) {
            $this->distanceTraveled -= 20;
        }
    }

    protected function postMove(): void
    {
        $weather = Weather::getInstance();
        if ($weather->isRaining()) {
            echo " I had to slow down.";
        }
    }
}