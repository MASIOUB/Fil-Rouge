<?php

class LoginController
{

    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        if (isPostRequest() && verify(["email", "password"], $_POST)) {
            $user = $this->userModel->fetchOne("WHERE email = :email", ["email" => $_POST["email"]]);
            if (!$user || !password_verify($_POST["password"], $user["password"])) {
                return view("login");
            }

            createUserSession($user);
            if(isAdmin()){
                return redirect("/dashbord");
            }
            return redirect("/");
        } else {
            return view("login");
        }
    }
}