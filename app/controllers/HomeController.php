<?php

class HomeController
{

    private $tripModel;
    public function __construct()
    {
        $this->tripModel = new Trip();
        $this->bookingModel = new Booking();

        $bookings = $this->bookingModel->sum(['trips.id', 'trips.start', 'trips.time', 'trips.seats'], 'bookings.seats', 'JOIN', 'WHERE trips.id = bookings.trip_id AND bookings.status = "active" AND trips.status = "active"', 'trips.time, trips.destination, trips.departure, trips.start, trips.end');
        foreach ($bookings as $booking) {
            $id = $booking['id'];
            if ($booking['start'] == date('Y-m-d')) {
                if ($booking['time'] < date('H:i:s')) {
                    $tripStatus = $this->tripModel->update(["status" => EXPIRED], $id);
                    return $tripStatus;
                }
            }
            if ($booking['start'] < date('Y-m-d')) {
                $tripStatus = $this->tripModel->update(["status" => EXPIRED], $id);
                return $tripStatus;
            }
            if ($booking['seats'] == $booking['sum_seat']) {
                $tripStatus = $this->tripModel->update(["status" => EXPIRED], $id);
                return $tripStatus;
            }
        }
    }

    public function index()
    {
        // var_dump(currentUserRole());
        // die();

        if (!isLoggedIn()) return redirect("choose");
        if (isLoggedIn() && currentUserRole() == CLIENT) {
            $trips = $this->tripModel->getLastLeft(['destination', 'image', 'price'], 'description', "WHERE status = 'ACTIVE'", "LIMIT 0,6");
            return view('home', ["trips" => $trips]);
        }
    }
}
