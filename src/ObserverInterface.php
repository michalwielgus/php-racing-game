<?php

namespace Game;

interface ObserverInterface
{
    public function notify(string $event): void;
}