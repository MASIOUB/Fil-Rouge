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
    }

    public function index()
    {

        return view("admin/dashboard");
    }

    public function user()
    {
        if (!isLoggedIn()) return redirect("login");

        else {
            $users = $this->userModel->fetchAll();
            return view("admin/user", ["users" => $users]);
        }
    }

    public function deleteUser($id)
    {
        if (!isLoggedIn()) return redirect("login");

        $user = $this->userModel->fetchById($id);
        if (!$user) return redirect('admin/dashboard');
        $isUserExist = $this->userModel->update(["status" => "deleted"], $id);
        if ($isUserExist) return redirect('admin/dashboard');
    }

    public function trip()
    {
        if (!isLoggedIn()) return redirect("login");

        else {
            $trips = $this->tripModel->fetchAll();
            return view("admin/trip", ["trips" => $trips]);
        }
    }

    public function deleteTrip($id)
    {
        if (!isLoggedIn()) return redirect("login");

        $trip = $this->tripModel->fetchById($id);
        if (!$trip) return redirect('admin/dashboard');
        $isTripExist = $this->tripModel->update(["status" => "deleted"], $id);
        if ($isTripExist) return redirect('admin/dashboard');
    }

    public function agency()
    {
        if (!isLoggedIn()) return redirect("login");

        else {
            $agencies = $this->agencyModel->fetchAll();
            return view("admin/agency", ["agencies" => $agencies]);
        }
    }

    public function deleteAgency($id)
    {
        if (!isLoggedIn()) return redirect("login");

        $agency = $this->agencyModel->fetchById($id);
        if (!$agency) return redirect('admin/dashboard');
        $isAgencyExist = $this->agencyModel->update(["status" => "deleted"], $id);
        if ($isAgencyExist) return redirect('admin/dashboard');
    }

}