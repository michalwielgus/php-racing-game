<?php


namespace Game;


interface VehicleInterface
{
    public function move(): void;

    public function getDistanceTraveled(): float;

    public function getType(): string;

    public function getName(): string;
}