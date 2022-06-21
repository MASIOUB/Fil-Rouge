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
            if ($booking['seats'] = $booking['sum_seat']) {
                $tripStatus = $this->tripModel->update(["status" => EXPIRED], $id);
                return $tripStatus;
            }
        }
    }

    public function index()
    {
        if (!isLoggedIn()) return redirect("agency/login");

        else {
            $trips = $this->tripModel->fetchAll();
            return view("agency/dashboard", ["trips" => $trips]);
        }
    }

    public function register()
    {
        if (isPostRequest()) {
            $data = [...$_POST, "password" => password_hash($_POST["password"], PASSWORD_ARGON2I)];
            $agencyId = $this->agencyModel->create($data);
            $id = $this->agencyModel->getLastRow();

            if ($agencyId) {
                createSession(["id" => $id['id'], ...$data]);
                return redirect("agency");
            }
        } else {
            return view("agency/register");
        }
    }

    public function login()
    {
        if (isPostRequest() && verify(["email", "password"], $_POST)) {
            $agency = $this->agencyModel->fetchOne("WHERE email = :email", ["email" => $_POST["email"]]);
            if (!$agency || !password_verify($_POST["password"], $agency["password"])) {
                return view("agency/login");
            }

            createSession($agency);
            return redirect("agency");
        } else {
            return view("agency/login");
        }
    }

    public function addTrip()
    {
        if (!isLoggedIn()) return redirect("agency/login");

        if (isPostRequest()) {

            $image=$_FILES['image']['name'];
            $dest='C:/xampp/new/htdocs/tst/public/uploads/' .basename($image);
            move_uploaded_file($_FILES['image']['tmp_name'], $dest);

            $agencyId = currentId();
            $data = [...$_POST, "agency_id" => $agencyId, 'image' => $image, 'status' => ACTIVE];
            $trip = $this->tripModel->create($data);
            if ($trip) {
                // print_r($trip);
                // die();
                redirect("agency/index");
            }
        } else {
            return view("agency/addTrip");
        }
    }

    public function updateTrip($id)
    {
        if (!isLoggedIn()) return redirect("agency/login");

        $trip = $this->tripModel->fetchById($id);
        if (!$trip) {
            return redirect("agency");
        }

        if (isPostRequest()) {
            $dataTrip = $this->tripModel->update($_POST, $id);
            if ($dataTrip) {
                return redirect("agency");
            }
            return redirect("agency/updateTrip/$id");
        } else {
            return view("agency/updateTrip");
        }
    }

    public function cancelTrip($id)
    {
        if (!isLoggedIn()) return redirect("agency/login");

        $trip = $this->tripModel->fetchById($id);
        if (!$trip) {
            return redirect("agency");
        }

        $dataTrip = $this->tripModel->update(["status" => CANCELD], $id);
        if ($dataTrip) {
            // return redirect("agency");
            echo "hello hello";
            die();
        } else {
            echo "page not found!!!!";
            die();
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
