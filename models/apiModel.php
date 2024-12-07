<?php 

class ApiModel{
    public $api;
    public function __construct(){
        $this->api =new Database();
    }

    public function fetchTransaction($password, $accountNumber, $token) {
        $url = "https://api.web2m.com/historyapiacbv3/$password/$accountNumber/$token";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
        
        $response = curl_exec($ch);
    
        if (curl_errno($ch)) {
            echo 'Lỗi cURL:'. curl_error($ch);
        }
    
        return json_decode($response, true);
    }

    public function update($id){
        $sql = "UPDATE transactions SET status = 1 WHERE id = $id";
        return $this->api->excute($sql);
    }
    
}