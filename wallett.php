<?php




$add = $_GET['address'];

if(isset($_GET['address'])){
    
    @$data = file_get_contents('https://apiasia.tronscan.io:5566/api/account/tokens?address='.$add.'&start=0&limit=20&token=&hidden=0&show=0&sortType=0');
    
    @$data = json_decode($data,true);
    
    foreach ($data['data'] as $key => $value){
    
        if($data['data'][$key]['tokenName']=='trx'){
        
            $amount = $data['data'][$key]['amount'];//总trx
        
            $datas['trx'] = $data['data'][$key]['quantity']; //可用余额
        
            $datas['trx_dj'] = bcsub ($amount,$datas['trx']);
        
        }else if($data['data'][$key]['tokenId']=='TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t'){
        
            $datas['USDT'] = $data['data'][$key]['quantity'];//USDT可用
        
        
        }else if($data['data'][$key]['tokenId']=='TPYmHEhy5n8TCEfYGqW2rPxsghSfzghPDn'){
            $datas['USDD'] = $data['data'][$key]['quantity'];//USDT可用
        }
    
    
    }
    
    echo json_encode($datas); 
    
}


