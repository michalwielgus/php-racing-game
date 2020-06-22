<?php

namespace Game;

class Weather
{
    private $currentWeather = self::SHINING;
    private static $instance;

    const SHINING = "shining";
    const RAINING = "raining";

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function isRaining(): bool
    {
        return $this->currentWeather === self::RAINING;
    }

    public function randomizeWeather(): void
    {
        $this->currentWeather = 0 === random_int(0, 2) ? self::RAINING : self::SHINING;
    }

    public function __toString(): string
    {
        return "Current weather: {$this->currentWeather}";
    }
}