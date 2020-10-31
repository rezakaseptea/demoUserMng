<?php
namespace Demo\Usersmanagement;

use Demo\Usersmanagement\BusinessLogic\Logic;

class UserMng
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // parent::__construct($request);
        $this->logic = new Logic();
    }

    public function GetAllUsers()
    {
    	$getApiData = $this->logic->getAllUser();
        return $getApiData;
        
    }

    public function GetDetailUser($id)
    {
        $getApiData = $this->logic->getDetailUser($id);
        return $getApiData;
        
    }
}