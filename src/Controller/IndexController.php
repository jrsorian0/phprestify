<?php

namespace Controller;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class IndexController {

    public function indexAction(Application $app) {


        return 'hello';
   
    }
}