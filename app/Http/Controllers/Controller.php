<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /**
 * @param object $object_table object model 
 * @param string  $cloName name of colum 
 * @param string $fileName the name of file 
 * @param string $path the path to save file  
 */
public function SaveFile($object_table,$cloName,$fileName,$path){
    if(request()->hasFile($fileName))
		{
			$file = request()->file($fileName);
			$filename = \Str::random(6).'_'.time().'.'.$file->getClientOriginalExtension();
			$file->move($path,$filename);
			$object_table->$cloName = $path.'/'.$filename;
		}
  }

 /**
     * @param string $view path email.blade
     * @param string $email  $email the user email to send messags
     * @param string $content the content of email
     * @param string $subject  the subject
     */
    public function sendEmail($view,$email,$content,$subject)
    {
        $send = \Mail::send($view,$content,function ($message) use($subject,$email) {
            $message->from('ososlegalgroup@gmail.com', 'My name');
            $message->subject($subject);
            $message->to($email);
        });
    }



  public  function SendFCM($FBToken, $Message) 
  {
	  // push notification url
	  $URL = 'https://fcm.googleapis.com/fcm/send';
	  // 
	  $Fields = array (
			  'to' => $FBToken,
			  'notification' => array (
					  "body" => $Message,
					  "title" => "306 App",
					  "icon" => "myicon"
			  ),
			  //'data' => array('type' => $AccountType, 'id' => $AccountId)
	  );
	  $Fields = json_encode ( $Fields );
	  $Headers = array (
		  'Authorization: key=' . "AIzaSyBeRmElaurFazBae9pJWuecqaNA-4dPrgc",
		  'Content-Type: application/json'
	  );
	  // initilize curl
	  $Curl = curl_init();
	  curl_setopt ( $Curl, CURLOPT_URL, $URL );
	  curl_setopt ( $Curl, CURLOPT_POST, true );
	  curl_setopt ( $Curl, CURLOPT_HTTPHEADER, $Headers );
	  curl_setopt ( $Curl, CURLOPT_RETURNTRANSFER, true );
	  curl_setopt ( $Curl, CURLOPT_POSTFIELDS, $Fields );
	  // execute command
	  $result = curl_exec ( $Curl );
	  curl_close ( $Curl );
  }
	
}
