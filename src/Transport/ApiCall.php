<?php
namespace Demo\Usersmanagement\Transport;

use Illuminate\Http\Request;
use App\Models\Disburse;
use Validator;
use Lang;

class ApiCall
{
    const base_url = "https://jsonplaceholder.typicode.com/";

    const get_all_user = 'users';
    const get_detail_user = 'users/';

    const POST = 1;
    const GET = 2;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function http_request($url, $method, $data){
        $ch = curl_init(); 

        $headr = array();
        $headr[] = 'Content-type: application/x-www-form-urlencoded';

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        $output = curl_exec($ch); 
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);      
        $resp['status'] = (int) $httpcode;
        $resp['data'] = $output;

        return $resp;
    }
}
