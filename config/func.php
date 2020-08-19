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

    function user_details($value){
        global $db;
        @$email = $_SESSION[USER_SESSION_HOLDER]['email'];
        $sql = $db->query("SELECT * FROM ".DB_PREFIX."users WHERE email='$email'");
        $rs = $sql->fetch(PDO::FETCH_ASSOC);
        return $rs[$value];
    }

    function is_user_login(){
        if (isset($_SESSION['loggedin'])) {
            return true;
        }else{
            return false;
        }
    }

    function require_login(){
        if (!is_user_login() or user_details('status') == 0){
            unset($_SESSION['loggedin']);
            unset($_SESSION[USER_SESSION_HOLDER]);
            redirect(base_url('index'));
            //exit();
        }else{
            redirect(MAIN_URL);
        }
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


    function get_country($id,$value){
         global $db;
         $sql = $db->query("SELECT * FROM ".DB_PREFIX."countries WHERE id='$id'");
         $rs = $sql->fetch(PDO::FETCH_ASSOC);
         return $rs[$value];
    }

    function get_city($id,$value){
        global $db;
        $sql = $db->query("SELECT * FROM ".DB_PREFIX."states WHERE id='$id'");
        $rs = $sql->fetch(PDO::FETCH_ASSOC);
        return $rs[$value];
    }