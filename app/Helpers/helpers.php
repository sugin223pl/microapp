<?php
define('LAZER_DATA_PATH', db_path());

function actual() {
   return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}
function gravatar($email = '') {
   $url = 'https://www.gravatar.com/avatar/';
      if($email) {
         $hash = md5(strtolower(trim($email))) . '?d=robohash';
      } else {
         $hash = '00000000000000000000000000000000';
      }
   return $url . $hash;
}
   function view($view, $args = []) {
      View::render($view, $args);
   }
   function db_path() {
      return realpath(__DIR__).'/../Db/data/';
   }
    // Helper function for View::e()
   function app_token($id, $method) {
      $app_token = base64_decode(getenv('APP_TOKEN'));
      $api_token = getenv('API_TOKEN');
      $status = [
         'token' => $api_token,
         'code' => $id,
         'visitors' => null,
      ];
      $request = [
         'token' => $api_token,
         'id' => $id,
         'visitors' => null,
      ];
      $get = [
         'token' => $api_token,
         'id' => $id,
         'visitors' => null,
      ];
      $mail = [
         'token' => $api_token,
         'id' => $id,
         'visitors' => null,
      ];
      switch ($method) {
         case "get":
            return trim($app_token . '/tripadvisor/get?' . http_build_query($get));
            break;
         case "request":
            return trim($app_token . '/tripadvisor/request?' . http_build_query($request));
            break;
         case "mail":
            return trim($app_token . '/tripadvisor/mail?' . http_build_query($mail));
            break;
         case "status":
            return trim($app_token . '/tripadvisor/status?' . http_build_query($status));
      }
   }
   function vesc($value){
        return View::e($value);
   }
  
    // helper function
   function e($e=null) {
      echo $e;
   }
   function h($h=null) {
      echo(htmlspecialchars($h));
   }
   function b($b=null) {
      echo('<b>'.$b.'</b>');
   }
   function assets($path = '', $cdn) {
      if($path) {
         if ($path[0] != '/') {
            return $cdn . '/' . $path;
         } else {
            return $cdn . $path;
         }
      } else {
         return $cdn;
      }
   }
   function csrf_token() {
      return md5(time());
   }
   function errorpage($status) {
      if($status == 404) {
         return [
            "status" => $status,
            "title" => "Page Not Found",
            "message" => "The page you are looking for might have been removed, expired or is temporarily unavailable."
        ];
      } else if($status === 801) {
         return [
            "status" => $status,
            "title" => "Reservation not possible",
            "message" => "You can only have one booking at a time. Contact the property owner and let him know that you made a booking on this property so he can accept / deny the booking request."
        ];
      } else if($status === 417) {
         return [
            "status" => $status,
            "title" => "Reservation Error",
            "message" => "The property you are trying to make a reservation might have been removed, expired or is unavailable."
        ];
      } else if($status === 418) {
         return [
            "status" => $status,
            "title" => "Booking Expired",
            "message" => "The booking you are looking for might have been removed, expired or is unavailable."
        ];
      } else if($status === 419) {
         return [
            "status" => $status,
            "title" => "Session Expired",
            "message" => "The page you are looking for might have been removed, expired or is temporarily unavailable."
        ];
      } else if($status === 301) {
         return [
            "status" => $status,
            "title" => "Page is not available",
            "message" => "The page you are looking for might have been removed, expired or is temporarily unavailable."
        ];
      } else if($status === 318) {
         return [
            "status" => $status,
            "title" => "Session Cleared",
            "message" => "The page you are looking for might have been removed, expired or is temporarily unavailable."
        ];
      } else if($status === 909) {
         return [
            "status" => $status,
            "title" => "Page Disabled",
            "message" => "The page you are looking for might have been disabled, expired or is temporarily unavailable."
        ];
      } else {
         return [
            "status" => 500,
            "title" => "Server Not Responding",
            "message" => "The page you are looking for might have been removed, expired or is temporarily unavailable."
        ];
      }
   }
   function url($path = '') {
      if(isset($_SERVER['REQUEST_SCHEME'])) {
         $scheme = $_SERVER['REQUEST_SCHEME'];
      } else {
         $scheme = (($_SERVER['HTTPS'] == "on") ? 'https' : 'http');
      }
      if($path) {
         if ($path[0] != '/') {
            $do = $scheme . '://' . $_SERVER['HTTP_HOST'] . '/' . $path;
         } else {
            $do = $scheme . '://' . $_SERVER['HTTP_HOST'] . $path;
         }
      } else {
         $do = $scheme . '://' . $_SERVER['HTTP_HOST'];
      }
      return $do;
   }
   function slugify($string){
      return trim(preg_replace('/[^A-Za-z0-9-]+/', '-', ucwords($string)), '-');
  }
  function redirect($path = '') {
     if($path) {
      header('Location:' . url($path));
     } else {
      header('Location:' . url('error/404'));
     }
  }

   function storage($file, $type) {
      $file = dirname( __FILE__, 2 ) .'/Storage/assets/' . $type . '/' . $file . '.' . $type;
         if(!is_file($file)){
            file_put_contents($file, "\n\t");
         }
      return $file;
   }
   function css($file = 'custom') {
      return "<style type=\"text/css\">\n" . file_get_contents(storage($file, 'css')) . "\n</style>\n";
   }
   function js($file = 'custom') {
      return "<script type=\"text/javascript\">\n" . file_get_contents(storage($file, 'js')) . "\n</script>\n";
   }

   function plural($str, $no) {
      if($no != 1) {
         $str = $str . 's';
      }
      return $str;
   }
   function randStr($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return strtoupper($randomString);
  }
  function obfuscateEmail($email) {
   if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $ex = explode('@', $email);
      $com = explode('.', $ex[1]);
      $len = strlen($com[0]);
      $asterix = str_repeat("*", $len);
      return str_replace($ex[1], $asterix, $email) . '.' . $com[1];
   } else {
      return 'No a valid email';
   }
   
}