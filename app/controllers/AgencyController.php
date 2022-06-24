<?php

class AgencyController
{

    private $agencyModel;
    private $tripModel;
    private $bookingModel;

    public function __construct()
    {
        $this->agencyModel = new Agency();
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

        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {

            $id = currentId();
            $trips = $this->tripModel->fetchAll('WHERE agency_id = :id', ['id' => $id]);
            $users = $this->bookingModel->join("users.*", "JOIN users ON users.id = bookings.user_id JOIN trips ON trips.id = bookings.trip_id and trips.agency_id = :agency_id", "", ['agency_id' => $id]);
            $bookings = $this->bookingModel->join("bookings.*", "JOIN trips ON trips.id = bookings.trip_id AND trips.agency_id = :agency_id", "", ['agency_id' => $id]);
            $countUsers = count($users);
            $countTrips = count($trips);
            $countBookings = count($bookings);
            return view("agency/dashboard", ["trips" => $countTrips, "users" => $countUsers, "bookings" => $countBookings]);
        } else {
            return redirect('home');
        }
    }

    public function register()
    {

        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {
            if (isPostRequest()) {
                $data = [...$_POST, "password" => password_hash($_POST["password"], PASSWORD_ARGON2I)];
                $agencyId = $this->agencyModel->create($data);
                $id = $this->agencyModel->getLastRow();

                if ($agencyId) {
                    createAgencySession(["id" => $id['id'], ...$data]);
                    return redirect("agency");
                }
            } else {
                return view("agency/register");
            }
        } else {
            return redirect('home');
        }
    }

    public function login()
    {

        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {
            if (isPostRequest() && verify(["email", "password"], $_POST)) {
                $agency = $this->agencyModel->fetchOne("WHERE email = :email", ["email" => $_POST["email"]]);
                if (!$agency || !password_verify($_POST["password"], $agency["password"])) {
                    return view("agency/login");
                }

                createAgencySession($agency);
                return redirect("agency");
            } else {
                return view("agency/login");
            }
        } else {
            return redirect('home');
        }
    }

    public function showProfile($id_user)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {
            $id_user = currentId();
            $user = $this->userModel->fetchById($id_user);
            if (!$user) {
                return view('choose');
            } else {
                return view('agency/profile', ['user' => $user]);
            }
        } else {
            return redirect('home');
        }
    }

    public function user()
    {

        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {

            $id = currentId();
            $users = $this->bookingModel->join("users.*", "JOIN users ON users.id = bookings.user_id JOIN trips ON trips.id = bookings.trip_id and trips.agency_id = :agency_id", "", ['agency_id' => $id]);
            return view("agency/user", ["users" => $users]);
        } else {
            return redirect('home');
        }
    }

    public function trip()
    {

        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {

            $id = currentId();
            $trips = $this->tripModel->fetchAll('WHERE agency_id = :agency_id', ['agency_id' => $id]);
            return view("agency/trip", ["trips" => $trips]);
        } else {
            return redirect('home');
        }
    }

    public function addTrip()
    {

        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {

            if (isPostRequest()) {

                $image = $_FILES['image']['name'];
                $dest = 'C:/xampp/new/htdocs/tst/public/uploads/' . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $dest);

                $agencyId = currentId();
                $data = [...$_POST, "agency_id" => $agencyId, 'image' => $image, 'status' => ACTIVE];
                $trip = $this->tripModel->create($data);
                if ($trip) {
                    return redirect("agency/trip");
                }
            } else {
                return view("agency/addTrip");
            }
        } else {
            return redirect('home');
        }
    }

    public function updateTrip($id)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {
            $trip = $this->tripModel->fetchById($id);
            if (!$trip) {
                return redirect("agency");
            }

            if (isPostRequest()) {

                $image = $_FILES['image']['name'];
                $dest = 'C:/xampp/new/htdocs/tst/public/uploads/' . basename($image);
                move_uploaded_file($_FILES['image']['tmp_name'], $dest);

                $data = [...$_POST, 'image' => $image];

                $dataTrip = $this->tripModel->update($data, $id);
                if ($dataTrip) {
                    return redirect("agency/updateTrip/$id");
                }
                return redirect("agency/updateTrip/$id");
            } else {
                return view("agency/updateTrip", ['trip' => $trip]);
            }
        } else {
            return redirect('home');
        }
    }

    public function cancelTrip($id)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {

            $trip = $this->tripModel->fetchById($id);
            if (!$trip) {
                return redirect("agency");
            }

            $dataTrip = $this->tripModel->update(["status" => CANCELD], $id);
            if ($dataTrip) {
                return redirect("agency/trip");
            } else {
                return view('agency/trip');
            }
        } else {
            return redirect('home');
        }
    }

    public function booking()
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {
            $id = currentId();
            $bookings = $this->bookingModel->join("bookings.*, trips.*", "JOIN trips ON trips.id = bookings.trip_id AND trips.agency_id = :agency_id", "", ['agency_id' => $id]);
            return view("agency/booking", ["bookings" => $bookings]);
        } else {
            return redirect('home');
        }
    }

    public function cancelBooking($id)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && !isClient() && !isAdmin()) {

            $booking = $this->bookingModel->fetchById($id);
            if (!$booking) {
                echo 'hello';
                die();
                return redirect('agency/booking');
            }

            $dataBooking = $this->bookingModel->update(['status' => CANCELD], $id);
            if ($dataBooking) {
                echo 'updated';
                die();
                return redirect('agency/booking');
            } else {
                return view('agency/booking');
            }
        } else {
            return redirect('home');
        }
    }

    public function test()
    {
        $bookings = $this->bookingModel->sum(['trips.id', 'trips.start', 'trips.time', 'trips.seats'], 'bookings.seats', 'JOIN', 'WHERE trips.id = bookings.trip_id AND bookings.status = "active" AND trips.status = "active"', 'trips.time, trips.destination, trips.departure, trips.start, trips.end');
        print_r($bookings);
        echo date('H:i:s');
        die();
    }
}
