<?php
require "./calculateBookings.php";

class FilterShuttle
{
    public function __construct($shuttleData, $passengerCount)
    {
        $this->shuttleData = $shuttleData;
        $this->passengerCount = (int)$passengerCount;
    }

    private function getAvailableSeats($shuttleId)
    {
        $calculateAvailableSeats = new CalculateAvailableSeats($shuttleId);
        $totalSeats = $calculateAvailableSeats->getTotalSeats();
        return $totalSeats;
    }

    public function getShuttles()
    {
        $result = array();

        foreach ($this->shuttleData as $shuttle) {
            $availableSeats = $this->getAvailableSeats($shuttle["id"]);
            if ($this->passengerCount <= $availableSeats) {
                array_push($result, $shuttle);
            }
        }

        return $result;
    }
}
