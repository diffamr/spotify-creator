<?php
error_reporting(0);

class curl {
  public $init;
  public $url;
  public $header;
  
  
    public function init_curl($init, $url){
      $this->init = $init;
      $this->url = $url;
      
      curl_setopt($this->init, CURLOPT_URL, $this->url);
      curl_setopt($this->init, CURLOPT_RETURNTRANSFER, TRUE);
      
      }

    
    public function curl_data($init, $data){
      $this->init = $init;
      curl_setopt($this->init, CURLOPT_POSTFIELDS, $data);
      }
    
    public function get_cookie($init, $cookie){
      $this->init = $init;
      curl_setopt($this->init, CURLOPT_COOKIEJAR, $cookie);
      }
    
    public function curl_header($init){
      $this->init = $init;
      curl_setopt($this->init, CURLOPT_HEADER, TRUE);
      }
    
    public function set_cookie($init, $cookie){
      $this->init = $init;
      curl_setopt($this->init, CURLOPT_COOKIEJAR, $cookie);
      }
      
    public function set_proxy($init, $proxy){
      $this->init = $init;
      curl_setopt($this->init, CURLOPT_PROXY, $proxy);
      curl_setopt($this->init, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS4);
      }
    
    public function start_curl($init){
      $this->init = $init;
      $gas = curl_exec($this->init);
      
      return $gas;
      
      }
      
    public function curl_setheader($init, $url, $header, $ua){
      $this->init_curl($init, $url, $ua);
      $this->set_header($init, $header);
      $this->set_ua($init, $ua);
      
      }
    
    public function set_header($init, $header){
      $this->init = $init;
      $this->header = $header;
      curl_setopt($this->init, CURLOPT_HTTPHEADER, $this->header);
      }
    
    public function set_ua($init, $ua){
      $this->init = $init;
      curl_setopt($this->init, CURLOPT_USERAGENT, $ua);
      }
      
    public function __destruct(){
      $init = $this->init;
        curl_close(curl_init());
      }
    
  }
$curl = new curl;

function getStr($a, $b, $c)
{
  return @explode($b, @explode($a, $c)[1])[0];
}
/* function name()
{
  
  return array(str_replace(array(" ", "."), "", strtolower($name)).rand(1234,9999)."@gmail.com", $name);
}*/

function post($curl, $init, $url, $data, $header, $ua, $email, $pwd){
  
  $curl->init_curl($init, $url);
  $curl->set_header($init, $header);
  $curl->curl_data($init, $data);
  $curl->set_ua($init, $ua);
  $start = $curl->start_curl($init);
  
  $decStart = json_decode($start);
  echo "\n";
  if(!empty($decStart->username)){
    return ". [+] Create Account Success\nEmail: ".$email."\nPassword: ".$pwd."\n\n";
  
    }else{
      return ". [-] Create Account Failed\n ";
      }
  
  }
  
sleep(2);
echo "\n";
echo " Mau Berapa Akun Spotify? ";
$count = trim(fgets(STDIN));
//$string = "asdfghjklqwertyuiopzxcvbnm01234567890";

  $id = 1;
  for($i=0; $i < $count; $i++){
    $name = getStr("</button></div></form><hr><h2>", "</h2>", @file_get_contents("https://namefake.com/indonesian-indonesia/random/"));
    $domain = ['gmail.com', 'outlook.co.id', 'yahoo.com', 'github.com']; // custom domain email
  $random = array_rand($domain);
  $name = @explode(" ", $name);
  $name = @$name[0].@$name[1];
  $email = strtolower($name).rand(1234,2000) . '@' . $domain[$random];
  $pwd = 'diffamr'; // custom your password
  $tahun = rand(1980,2000); //random angka dari 1980 sampai 2000
  $ultah = rand(1,31); //random angka dari 1 sampai 31
  $bulan = rand(1,12); //random angka dari 1 sampai 12
    $init = curl_init();
    $url = "https://spclient.wg.spotify.com/signup/public/v1/account/";
    $ua = "Spotify/8.5.47 Android/28 (vivo 1904)";
    $header = ["spotify-app-version:8.5.47", "x-client-id:9a8d2f0ce77a4e248bb71fefcb557637", "app-platform:Android", "content-type:application/x-www-form-urlencoded"];
    $data = "birth_month=".$bulan."&email=".$email."&key=142b583129b2df829de3656f9eb484e6&name=".$email."&password=".$pwd."&platform=Android-ARM&iagree=true&gender=male&password_repeat=".$pwd."&creation_point=client_mobile&birth_year=".$tahun."&birth_day=".$ultah."";
    $result =  $id++.post($curl, $init, $url, $data, $header, $ua, $email ,$pwd);
    if(preg_match("|Success|", $result)){
      echo $result;
      $o = fopen("spotify-creator-custom.txt", 'a');
      fwrite($o, $email."|".$pwd."\n");
      fclose($o);
      }else{
        echo $result;
        }
  }
 
