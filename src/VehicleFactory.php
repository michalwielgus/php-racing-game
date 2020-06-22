<?php


namespace Game;


class VehicleFactory
{
    const CAR = "car";
    const MOTORCYCLE = "motorcycle";
    const TRUCK = "truck";

    public static function factory(string $type, string $name): VehicleInterface
    {
        $vehicle = null;

        switch ($type) {
            case self::CAR:
                $vehicle = new Car($name);
                break;
            case self::MOTORCYCLE:
                $vehicle = new Motorcycle($name);
                break;
            case self::TRUCK:
                $vehicle = new Truck($name);
                break;
            default:
                throw new \Exception("Could not recognize type");
        }

        return $vehicle;
    }
}