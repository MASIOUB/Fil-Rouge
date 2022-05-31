<?php

class RegisterController
{

    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }

    public function index()
    {
        if (isPostRequest()) {
            $data = [ ...$_POST, "role" => CLIENT, "password" => password_hash($_POST["password"], PASSWORD_ARGON2I)];
            $userId = $this->userModel->create($data);
            $id = $this->userModel->getLastId();

            if ($userId) {
                createUserSession(["id" => $id['id'], ...$data]);
                return redirect("/");
            }
        } else {
            return view("register");
        }
    }
}