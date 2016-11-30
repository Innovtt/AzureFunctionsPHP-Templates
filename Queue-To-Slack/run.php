<?php
$input = file_get_contents(getenv('input'));
$input = rtrim($input, "\n\r");
  
$data = array('channel' => '#general', 'username' => 'BotBurro', 'text' => "$input", 'icon_emoji' => ':ghost:');                                                                    
$data_string = json_encode($data);                                                                                   
                                                                                                                     
$ch = curl_init('https://hooks.slack.com/services/<PUT YOUR SLACK HOOK URL HERE>');                                                                      
curl_setopt($ch, CURLOPT_POST, true);                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json')                                                                       
);                                                                                                                   
                                                                                                                     
$result = curl_exec($ch);
//Show error output from cURL call or show json message sent to Slack 
if($result === FALSE){
    file_put_contents(getenv('res'), curl_error($ch));
}else{
    file_put_contents(getenv('res'), json_encode($data_string));
}

?>