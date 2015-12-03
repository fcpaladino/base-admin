<?php

namespace App\Libs\DataOperation;

class Flash{


    public function message($title, $message, $type){

        session()->flash('flash_message', [
            'title' => $title,
            'message' => $message,
            'type' => $type
        ]);
    }


    public function success($title, $message){
        $this->message($title, $message, 'success');
    }

    public function info($title, $message){
        $this->message($title, $message, 'info');
    }

    public function error($title, $message){
        $this->message($title, $message, 'error');
    }

}