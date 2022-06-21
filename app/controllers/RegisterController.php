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
            $id = $this->userModel->getLastRow("LIMIT 0,1");

            if ($userId) {
                createSession(["id" => $id['id'], ...$data]);
                return redirect("/");
            }
        } else {
            return view("register");
        }
    }
}