<?php


namespace Game;


abstract class AbstractVehicle implements VehicleInterface, ObserverInterface
{
    protected $name;
    protected $maxSpeed = 0;
    protected $distanceTraveled = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function notify(string $event): void
    {
        if ($event === "nextTurn") {
            $this->move();
        }
    }

    public function move(): void
    {
        $this->preMove();
        echo "\n Moving " . $this->getType() . "({$this->getName()}) by {$this->distanceTraveled} km.";
        $this->postMove();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return (new \ReflectionClass($this))->getShortName();
    }

    public function getDistanceTraveled(): float
    {
        return $this->distanceTraveled;
    }

    protected function postMove()
    {
    }

    abstract protected function preMove(): void;
}