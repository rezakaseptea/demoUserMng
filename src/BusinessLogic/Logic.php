<?php
namespace Demo\Usersmanagement\BusinessLogic;

use Demo\Usersmanagement\Transport\ApiCall;

class Logic
{
	 /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // parent::__construct($request);
        $this->apiCall = new ApiCall();
    }
	
    public function getAllUser()
    {
    	$url = $this->apiCall::base_url.$this->apiCall::get_all_user;
        $method = $this->apiCall::GET;
        $respApiCall = $this->apiCall->http_request($url, $method, []);
        $respApiCall['status'] = (int) $respApiCall['status'];
        return $this->setReturnData($respApiCall);
    }

    public function getDetailUser($id)
    {
        $url = $this->apiCall::base_url.$this->apiCall::get_detail_user.$id;
        $method = $this->apiCall::GET;
        $respApiCall = $this->apiCall->http_request($url, $method, []);
        $respApiCall['status'] = (int) $respApiCall['status'];
        return $this->setReturnData($respApiCall);
        
    }

    public function setReturnData($resp) {
        switch ($resp['status']) {
            case 200:
                $resp['messages'] = "Success Get Data";
                break;
            case 500:
                $resp['messages'] = "Internal server error, when call the api";
                break;
            case 404:
                $resp['messages'] = "Url Not valid, Http not found";            
                break;
            default:
                # code...
                $resp['messages'] = "Cannot connect to the api, please check your internet connection";
                break;
        }
        $resp['data'] = json_decode($resp['data'], true);
        return $resp;
    }
}