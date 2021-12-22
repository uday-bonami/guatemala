<?php
require_once "./model/bookings.php";
require_once "./model/shuttles.php";


class CalculateAvailableSeats
{
    public function __construct($suttleId)
    {
        $this->shuttles = new Shuttles();
        $this->bookings = new Bookings();
        $this->shuttleId = $suttleId;
    }

    private function getTotalPassenger()
    {
        $shuttleData = $this->shuttles->getShuttleById($this->shuttleId)[0];
        $totalPassenger = $shuttleData["passenger_capacity"];
        return $totalPassenger;
    }

    private function getTotalBookings()
    {
        $booking = $this->bookings->getBookingByShuttleId($this->shuttleId);
        $totalBooking = $this->calculateBookings($booking);
        return $totalBooking;
    }

    private function calculateBookings($bookings, $i = 0, $sum = 0)
    {
        if ($i !== count($bookings)) {
            $sum += $bookings[$i]["total_passenger"];
            $i++;
            return $this->calculateBookings($bookings, $i = $i, $sum = $sum);
        }
        return $sum;
    }

    public function getTotalSeats()
    {
        $totalPassenger = $this->getTotalPassenger();
        $totalBooking = $this->getTotalBookings();
        $restSeats = $totalPassenger - $totalBooking;
        return $restSeats;
    }
}
