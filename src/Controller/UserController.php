<?php

namespace Controller;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class UserController {

    public function indexAction(Application $app) {

        return 'indexAction';
   
    }

    public function createAction(Application $app) {
    	
        return 'createAction';
   
    }

    public function readAction(Application $app) {
    	
        return 'readAction';
   
    }

    public function updateAction(Application $app) {
    	
        return 'updateAction';
   
    }

    public function deleteAction(Application $app) {
    	
        return 'deleteAction';
   
    }
}