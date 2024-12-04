<?php 

class ApiModel{
    public $api;
    public function __construct(){
        $this->api =new Database();
    }

    public function fetchTransactionHistory($password, $accountNumber, $token) {
        $url = "https://api.web2m.com/historyapiacbv3/$password/$accountNumber/$token";
       
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
        if (curl_errno($ch)) {
            echo 'Lỗi cURL: ' . curl_error($ch);
            curl_close($ch);
            return null;
        }
    
        if ($httpCode !== 200) {
            echo "Lỗi từ API. HTTP Code: $httpCode\n";
            echo "Phản hồi từ API: $response\n";
            curl_close($ch);
            return null;
        }
    
        curl_close(handle: $ch);
        return json_decode($response, true);
    }

    public function update($id){
        $sql = "UPDATE transactions SET status = 1 WHERE id = $id";
        return $this->api->insert($sql);
    }
    
}