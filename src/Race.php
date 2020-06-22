<?php

namespace Game;

class Race implements Observable
{
    private $distance;
    private $numberOfTours = 5;
    private $weather;

    use ObserverTrait;

    public function __construct(Weather $weather, float $distance = 5)
    {
        $this->distance = $distance;
        $this->weather = $weather;
    }

    public function run(): void
    {
        echo "Game has been started... \n";
        $this->displayInfoAboutRace();
        foreach (range(1, $this->numberOfTours) as $currentTour) {
            $this->makeTour($currentTour);
        }
        $this->displayWinners();
    }

    private function displayInfoAboutRace(): void
    {
        echo "\nDistance to race: \t {$this->distance} km.";
        echo sprintf("\nNumber of vehicles: \t %d\n", count($this->vehicles));
    }

    private function makeTour(int $tour): void
    {
        $this->weather->randomizeWeather();
        $this->displayTourInfo($tour);
        foreach ($this->observers as $observer) {
            $observer->notify('nextTurn');
        }
    }

    private function displayTourInfo(int $tour): void
    {
        echo "\nTour {$tour} has just begun:";
        echo "\n {$this->weather}";
    }

    private function displayWinners(): void
    {
        $winners = $this->getWinners();
        echo "\n\nWINNERS:";
        foreach ($winners as $category => $winner) {
            echo "\n" . $winner->getName() . " win in category $category with total distance traveled:" . $winner->getDistanceTraveled() . "km.";
        }

        echo "\n\n";
    }

    private function getWinners(): array
    {
        $winners = [];
        foreach ($this->observers as $vehicle) {
            $category = $vehicle->getType();

            if (!isset($winners[$category])) {
                $winners[$category] = $vehicle;
            } else {
                $currentLeaderDistance = $winners[$category]->getDistanceTraveled();
                $currentVehicleDistance = $vehicle->getDistanceTraveled();
                $winners[$category] = $currentLeaderDistance < $currentVehicleDistance ? $vehicle : $winners[$category];
            }
        }
        return $winners;
    }

    public function addVehicle(VehicleInterface $vehicle): void
    {
        $this->addObserver($vehicle);
    }

}