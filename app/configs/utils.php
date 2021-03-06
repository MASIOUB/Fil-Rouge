<?php

function view($path, $data = [])
{
    extract($data);
    $path = dirname(__DIR__)."/resources/views/$path.php";
    if (file_exists($path)){
        require_once $path;
    }
    else{
        die ("View doesn't exist");
    }
}

function createLink($path)
{
    $path = trim($path, "/");
    return "/enjoy-travel/$path";
}

function redirect($path)
{
    header("location: /enjoy-travel/$path");
}

function isPostRequest()
{
    return $_SERVER["REQUEST_METHOD"] === "POST";
}

function verify($required, $data): bool
{
    foreach ($required as $value) {
        if (empty($data[$value])) {
            return false;
        }
    }
    return true;
}

function createSession($user)
{
    if (!isset($_SESSION)) {
        @session_start();
    }
    $_SESSION["id"] = $user["id"];
    $_SESSION["role"] = $user["role"];
    $_SESSION["username"] = $user["username"];
}

function createAgencySession($agency)
{
    if (!isset($_SESSION)) {
        @session_start();
    }
    $_SESSION["id"] = $agency["id"];
    $_SESSION["name"] = $agency["name"];
}



function isLoggedIn()
{
    if (!isset($_SESSION)) {
        @session_start();
    }
    return isset($_SESSION["id"]) && !empty($_SESSION["id"]);
}

function isAdmin()
{
    return currentUserRole() === ADMIN;
}

function isClient()
{
    return currentUserRole() === CLIENT;

}

function currentId()
{
    isLoggedIn();
    return $_SESSION["id"] ?? null; // nullish coalescing
}

function currentUserRole(){
    if(!isLoggedIn()) return null;
    return $_SESSION["role"];
}

function currentUsername(){
    if(!isLoggedIn()) return null;
    return $_SESSION["username"];
}