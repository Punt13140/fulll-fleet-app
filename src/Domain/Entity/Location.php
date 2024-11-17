<?php

namespace FleetApp\Domain\Entity;


final readonly class Location
{
    public function __construct(
        private float  $latitude,
        private float  $longitude,
        private ?float $altitude = null,
    )
    {
        $this->validateCoordinates();
    }

    private function validateCoordinates(): void
    {
        if ($this->latitude < -90 || $this->latitude > 90) {
            throw new \InvalidArgumentException('Invalid latitude value');
        }
        if ($this->longitude < -180 || $this->longitude > 180) {
            throw new \InvalidArgumentException('Invalid longitude value');
        }
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function getAltitude(): ?float
    {
        return $this->altitude;
    }
}