<?php

class HomeController
{

    private $tripModel;
    public function __construct()
    {
        $this->tripModel = new Trip();
    }

    public function index()
    {
        // $bookings = $this->bookingModel->sum(['trips.id', 'trips.start', 'trips.time', 'trips.seats'], 'bookings.seats', 'JOIN', 'trips.time, trips.destination, trips.departure, trips.start, trips.end');
        $trips = $this->tripModel->getLastLeft(['destination', 'image', 'price'],'description',"","LIMIT 0,6");
        // print_r($trips);
        // die();
        return view('home', ["trips" => $trips]);
    }

}