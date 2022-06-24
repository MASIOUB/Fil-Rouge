<?php

class UserController
{

    private $tripModel;
    private $agencyModel;
    private $bookingModel;
    private $userModel;
    private $commentModel;
    public function __construct()
    {
        $this->tripModel = new Trip();
        $this->agencyModel = new Agency();
        $this->bookingModel = new Booking();
        $this->userModel = new User();
        $this->commentModel = new Comment();

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
        return view('home');
    }

    public function trip()
    {
        if (isPostRequest()) {
            $trips = $this->tripModel->fetchAll("WHERE departure = :departure and start = :start and status = 'ACTIVE'", $_POST);
            if ($trips) {
                return view('user/trip', ['trips' => $trips]);
            } else {
                // $msg = 'agency not found';
                view('user/trip');
            }
        } else {
            $trips = $this->tripModel->fetchAll("WHERE status = 'ACTIVE'");
            if (!$trips) return view('user/trip');
            return view('user/trip', ["trips" => $trips]);
        }
    }

    public function agency()
    {
        if (isPostRequest()) {
            // $msg = '';
            $agencies = $this->agencyModel->fetchAll("WHERE name = :name", $_POST);
            // var_dump($agencies);
            // die();
            if ($agencies) {
                return view('user/agency', ['agencies' => $agencies]);
            } else {
                // $msg = 'agency not found';
                view('user/agency');
            }
        } else {
            $agencies = $this->agencyModel->fetchAll();
            if (!$agencies) return view('user/agency');
            return view('user/agency', ["agencies" => $agencies]);
        }
    }

    public function history()
    {
        // if (!isLoggedIn()) return redirect("login");
        $userId = currentId();
        $isBookingExist = $this->bookingModel->join("bookings.id, bookings.status, trips.departure, trips.destination, trips.start, trips.end,trips.time, bookings.seats, trips.price", "INNER JOIN trips ON trips.id = bookings.trip_id", "WHERE bookings.user_id = :id", ["id" => $userId]);
        // print_r($isBookingExist);
        // die();
        if ($isBookingExist) {
            $bookingExist = ["bookings" => $isBookingExist];
            return view("user/history", $bookingExist);
        }
        return view("user/history");
    }

    public function addBooking($id_trip)
    {
        $trip = $this->tripModel->fetchById($id_trip);
        if (!$trip) {
            return redirect('user/addBooking');
        }
        if (isPostRequest()) {
            $bookingData = [
                'user_id' => currentId(),
                'trip_id' => $id_trip,
                'status' => ACTIVE,
                ...$_POST
            ];
            $isBookingCreated = $this->bookingModel->create($bookingData);
            if ($isBookingCreated) {
                return redirect('user');
            }
            return redirect("user/addBooking/$id_trip");
        } else {
            return view('user/addBooking', ['trip' => $trip]);
        }
    }

    public function cancelBooking($id_booking)
    {
        // $msg = "";
        // if (!isLoggedIn()) return redirect("login");
        $booking = $this->bookingModel->fetchById($id_booking);
        if (!$booking) {
            // $msg = "booking not deleted";
            return redirect("user/history");
            // echo "booking not exist";
            // die();
        }
        $isBookingExist = $this->bookingModel->update(['status' => CANCELD], $id_booking);
        // if ($isBookingExist) return redirect("user/history");
        if (!$isBookingExist) {
            echo "booking not deleted";
            die();
        } else {
            echo "booking is deleted";
            die();
        }
    }

    public function showAgency($id_agency)
    {
        $id_user = currentId();
        $user = $this->agencyModel->fetchById($id_user);
        // var_dump($user);
        // die();
        $agency = $this->agencyModel->fetchById($id_agency);
        if (!$agency) {
            return view('user/showAgency');
        } else {
            // $id_user = currentId();
            if (isPostRequest()) {
                $data = [...$_POST, 'agency_id' => $id_agency, 'user_id' => $id_user];
                $comment = $this->commentModel->create($data);
                if ($comment) {
                    return redirect("user/showAgency/$id_agency",);
                }
            }
            $comments = $this->commentModel->join('users.username, users.image, comments.content, comments.created_at', 'INNER JOIN users ON users.id = :id_user', 'WHERE comments.agency_id = :id_agency', ['id_user' => $id_user, 'id_agency' => $id_agency]);
            return view("user/showAgency", ["agency" => $agency, "comments" => $comments, "user" => $user]);
        }
    }

    public function showTrip($id_trip)
    {
        $user_id = currentId();
        // $trip = $this->tripModel->fetchById($id_trip);
        $trip = $this->tripModel->oneJoin('agencies.name, agencies.id as id_agency, trips.*', 'INNER JOIN agencies ON agencies.id = trips.agency_id', 'WHERE trips.id = :trip_id', ['trip_id' => $id_trip]);
        // print_r($trip['name']);
        // die();
        if (!$trip) {
            return view('user/trip');
        }else{
            return view('user/showTrip', ['trip' => $trip]);
        }
    }

    public function showProfile($id_user)
    {
        $id_user = currentId();
        $user = $this->userModel->fetchById($id_user);
        if (!$user) {
            return view('login');
        } else {
            return view('user/profile', ['user' => $user]);
        }
    }

    public function updateProfile($id_user)
    {
        $user = $this->userModel->fetchById($id_user);
        if (!$user) {
            echo "user not found";
        }

        if (isPostRequest()) {
            $dataUser = $this->userModel->update($_POST, $id_user);
            if ($dataUser) {
                return redirect("user/showProfile/$id_user");
            }
            return redirect("user/updateProfile/$id_user");
        } else {
            return view('user/updateProfile', ['user' => $user]);
        }
    }
}
