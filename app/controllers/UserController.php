<?php

class UserController
{

    private $tripModel;
    private $agencyModel;
    private $bookingModel;
    public function __construct()
    {
        $this->tripModel = new Trip();
        $this->agencyModel = new Agency();
        $this->bookingModel = new Booking();

        // $bookings = $this->bookingModel->sum(['trips.id', 'trips.start', 'trips.time', 'trips.seats'], 'bookings.seats', 'JOIN', 'WHERE trips.id = bookings.trip_id AND bookings.status = "active" AND trips.status = "active"', 'trips.time, trips.destination, trips.departure, trips.start, trips.end');
        // print_r($bookings);
        // foreach ($bookings as $booking) {
        //     $id = $booking['id'];
        //     if($booking['start'] > date('Y-m-d') || $booking['time'] > date('H:i:s') || $booking['seats'] = $booking['sum_seat']){
        //         $tripStatus = $this->tripModel->update(["status" => EXPIRED], $id);
        //         return $tripStatus;
        //     }
        // }

        $bookings = $this->bookingModel->sum(['trips.id', 'trips.start', 'trips.time', 'trips.seats'], 'bookings.seats', 'JOIN', 'WHERE trips.id = bookings.trip_id AND bookings.status = "active" AND trips.status = "active"', 'trips.time, trips.destination, trips.departure, trips.start, trips.end');
        foreach ($bookings as $booking) {
            $id = $booking['id'];
            // if ($booking['start'] = date('Y-m-d')) {
            //     if ($booking['time'] > date('H:i:s')) {
            //         $tripStatus = $this->tripModel->update(["status" => EXPIRED], $id);
            //         return $tripStatus;
            //     }
            // }
            // if ($booking['start'] > date('Y-m-d')) {
            //     $tripStatus = $this->tripModel->update(["status" => EXPIRED], $id);
            //     return $tripStatus;
            // }
            // if ($booking['seats'] = $booking['sum_seat']) {
            //     $tripStatus = $this->tripModel->update(["status" => EXPIRED], $id);
            //     return $tripStatus;
            // }
        }
    }

    public function index()
    {
        return view('home');
    }

    public function trip()
    {
        if (isPostRequest()) {
            $trips = $this->tripModel->fetchAll("WHERE destination = :destination, start = :start, status = 'ACTIVE'", $_POST);
        } else {
            $bookings = $this->bookingModel->sum(['trips.id', 'trips.start', 'trips.time', 'trips.seats'], 'bookings.seats', 'JOIN', 'WHERE trips.id = bookings.trip_id AND bookings.status = "active" AND trips.status = "active"', 'trips.time, trips.destination, trips.departure, trips.start, trips.end');
            foreach ($bookings as $booking) {
                # code...
            }
            $trips = $this->tripModel->fetchAll("WHERE status = 'ACTIVE'");
            if (!$trips) return view('user/trip');
            return view('user/trip', ["trips" => $trips]);
        }
    }

    public function agency()
    {
        return view('user/agency');
    }
}
