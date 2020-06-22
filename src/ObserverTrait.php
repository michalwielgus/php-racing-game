<?php

namespace Game;

trait ObserverTrait
{
    private $observers = [];

    public function addObserver(ObserverInterface $observer)
    {
        $this->observers[] = $observer;
    }
}