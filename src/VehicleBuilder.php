<?php


namespace Game;


class VehicleBuilder
{
    private $name;
    private $type;

    const CAR = VehicleFactory::CAR;
    const MOTORCYCLE = VehicleFactory::MOTORCYCLE;
    const TRUCK = VehicleFactory::TRUCK;

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function build(): VehicleInterface
    {
        $vehicle = "";

        switch ($this->type) {
            case self::CAR:
            case self::MOTORCYCLE:
            case self::TRUCK:
                $vehicle = VehicleFactory::factory($this->type, $this->name);
                break;
            default:
                throw new \Exception("Could not recognize type");
        }

        return $vehicle;
    }
}