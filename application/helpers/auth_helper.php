<?php

function permissionEx(){
    $ci = get_instance();
    $loggedUser = $ci->session->userdata("logged_user");
    if(!$loggedUser){
        $ci->session->set_flashdata("danger","Você precisar estar logado...");
        redirect('login');
    }
    return $loggedUser;
}