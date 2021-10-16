<?php namespace App\Services;

use App\Models\Authentication_model;
use App\Models\Users;
use stdClass;

class Auth {
  public static $is_login = FALSE;

  public static function auth()
  {
    if (self::$is_login) {
      $user_model = new Users();
      
    }
  }

  public static function auth_login()
  {
    $response = new stdClass();
    $response->success = FALSE;
    $response->message = "Unknown Failure!";
    $session_token = session("session_token");

    if ($session_token) {
      $model_auth = new Authentication_model();
      $session = $model_auth->where("session_token", $session_token)->first();

      if (\is_object($session)) {
        $now = \CodeIgniter\I18n\Time::now("Asia/Jakarta")->format("Y-m-d H:i:s");
        
        if ($session->is_logout == 0) {

          if ($session->expired_at >= $now) {
            $response->success = TRUE;

            $date_added = \CodeIgniter\I18n\Time::now("Asia/Jakarta")->addMinutes(15)->format("Y-m-d H:i:s");
            $data_update = [
              "id" => $session->id,
              "expired_at" => $date_added
            ];

            $model_auth->save($data_update);
            self::$is_login = TRUE;
          } else {
            $response->message = "Session berakhir! Silahkan login kembali!";
          }
        } else {
          $response->message = "Session anda telah logout!";
        }
      } else {
        $response->message = "Session tidak valid!";
      }
    } else {
      $response->message = "Anda harus login terlebih dahulu!";
    }

    return $response;
  }
}