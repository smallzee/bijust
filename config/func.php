<?php 
    
    $error = array();
    $curl = curl_init();


     function set_flash ($msg,$type){
       $_SESSION['flash'] = '<div class="alert alert-'.$type.' alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>'.$msg.'</div>';
    }

    function base_url($url_path = ""){
        if ($url_path == ""){
            $base_url = HOME_DIR;
        }else{
            $base_url = HOME_DIR.$url_path;
        }
        return $base_url;
    }

    function page_title($page_title = ""){
        if ($page_title == ""){
            $title = WEB_TITLE;
        }else{
            $title = $page_title;
        }
        return $title;
    }

    function image_url($img_name){
        return base_url("template/images/".$img_name);
    }

    function flash(){
        if (isset($_SESSION['flash'])) {
            echo $_SESSION['flash'];
            unset($_SESSION['flash']);
        }
    }

    function hash_password($pass){
        return sha1($pass);
    }

    function redirect($url){
        header("location:$url");
        exit();
    }


    function send_mail($msg_body,$subject,$email){
        $email_tmp =  file_get_contents(HOME_DIR.'email-template.html');

        $subject_1 = "<h4>".$subject."</h4>";

        $subject_2 = str_replace("{{TITLE}}", $subject_1, $email_tmp);
        $dates = str_replace("{{DATE}}", date('Y'), $subject_2);
        $message = str_replace("{{MESSAGE}}", $msg_body, $dates);

        $full_name = $subject;
        $email_from = WEB_EMAIL;
        //$from = "$full_name<$email_from>";
        $headers ="From:".$full_name."<".$email_from.">\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        @$mails = mail($email, $subject, $message,$headers);

        return $mails;
    }

