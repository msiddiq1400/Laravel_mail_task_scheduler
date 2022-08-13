<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\Validations\AuthValidationService;
use Illuminate\Support\Facades\Session;
use Exception;

class AuthService
{
    protected $userRepo;
    protected $validations;

    public function __construct(
        UserRepository $userRepo,
        AuthValidationService $validations
    ) {
        $this->userRepo = $userRepo;
        $this->validations = $validations;
    }
    public function register($data)
    {
        try{
            $this->saveSucessSession();
            return $this->userRepo->register($data);
        } catch(Exception $e) {
            $this->saveErrorSession();
            return false;
        }
    }

    public function saveSucessSession() {
        Session::forget('alert-danger');
        Session::flash('alert-success', 'User successfully saved');
    }

    public function saveErrorSession() {
        Session::forget('alert-success');
        Session::flash('alert-danger', 'User already Exists or Some error occured');
    }
}