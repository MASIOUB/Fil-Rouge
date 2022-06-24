<?php


class AdminController
{
    private $userModel;
    private $agencyModel;
    private $tripModel;
    private $bookingModel;

    public function __construct()
    {
        $this->userModel = new User();
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

        if (isLoggedIn() && isAdmin()) {
            $users = $this->userModel->fetchAll();
            $agencies = $this->agencyModel->fetchAll();
            $trips = $this->tripModel->fetchAll();
            $bookings = $this->bookingModel->fetchAll();
            $countUsers = count($users);
            $countAgencies = count($agencies);
            $countTrips = count($trips);
            $countBookings = count($bookings);
            return view("admin/dashboard", ['users' => $countUsers, 'agencies' => $countAgencies, 'trips' => $countTrips, 'bookings' => $countBookings]);
        } else {
            return redirect('home');
        }
    }

    public function showProfile($id_user)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {
            $id_user = currentId();
            $user = $this->userModel->fetchById($id_user);
            if (!$user) {
                return view('choose');
            } else {
                return view('admin/profile', ['user' => $user]);
            }
        } else {
            return redirect('home');
        }
    }

    public function updateProfile($id_user)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {
            $user = $this->userModel->fetchById($id_user);
            if (!$user) {
                echo "user not found";
            }

            if (isPostRequest()) {
                $dataUser = $this->userModel->update($_POST, $id_user);
                if ($dataUser) {
                    return redirect("admin/showProfile/$id_user");
                }
                return redirect("admin/updateProfile/$id_user");
            } else {
                return view('admin/updateProfile', ['user' => $user]);
            }
        } else {
            return redirect('home');
        }
    }

    public function user()
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {
            $users = $this->userModel->fetchAll();
            return view("admin/user", ["users" => $users]);
        } else {
            return redirect('home');
        }
    }

    public function deleteUser($id)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {
            $user = $this->userModel->fetchById($id);
            if (!$user) return redirect('admin/dashboard');
            $isUserExist = $this->userModel->update(["status" => "deleted"], $id);
            if ($isUserExist) return redirect('admin/dashboard');
        } else {
            return redirect('home');
        }
    }

    public function trip()
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {
            $trips = $this->tripModel->fetchAll();
            return view("admin/trip", ["trips" => $trips]);
        } else {
            return redirect('home');
        }
    }

    public function cancelTrip($id)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {

            $trip = $this->tripModel->fetchById($id);
            if (!$trip) {
                return redirect("admin");
            }

            $dataTrip = $this->tripModel->update(["status" => CANCELD], $id);
            if ($dataTrip) {
                return redirect("admin/trip");
            } else {
                return view('admin/trip');
            }
        } else {
            return redirect('home');
        }
    }

    public function deleteTrip($id)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {
            $trip = $this->tripModel->fetchById($id);
            if (!$trip) return redirect('admin/dashboard');
            $isTripExist = $this->tripModel->update(["status" => "deleted"], $id);
            if ($isTripExist) return redirect('admin/dashboard');
        } else {
            return redirect('home');
        }
    }

    public function agency()
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {
            $agencies = $this->agencyModel->fetchAll();
            return view("admin/agency", ["agencies" => $agencies]);
        } else {
            return redirect('home');
        }
    }

    public function deleteAgency($id)
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {
            $agency = $this->agencyModel->fetchById($id);
            if (!$agency) return redirect('admin/dashboard');
            $isAgencyExist = $this->agencyModel->update(["status" => "deleted"], $id);
            if ($isAgencyExist) return redirect('admin/dashboard');
        } else {
            return redirect('home');
        }
    }

    public function booking()
    {
        if (!isLoggedIn()) return redirect("choose");

        if (isLoggedIn() && isAdmin()) {
            $bookings = $this->bookingModel->join("bookings.id, bookings.status, trips.departure, trips.destination, trips.start, trips.end,trips.time, bookings.seats, trips.price", "INNER JOIN trips ON trips.id = bookings.trip_id");
            return view("admin/booking", ["bookings" => $bookings]);
        } else {
            return redirect('home');
        }
    }
}
