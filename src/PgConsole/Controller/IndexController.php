<?php

namespace PgConsole\Controller;

use Zend\Mvc\Controller\AbstractActionController,
    Zend\Console\Request as ConsoleRequest,
    RuntimeException;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $request = $this->getRequest();

        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (!$request instanceof ConsoleRequest) {
            throw new RuntimeException('You can only use this action from a console!');
        }

        // Check verbose flag
        $verbose = $request->getParam('verbose') || $request->getParam('v');

        // Check mode
        $filename = $request->getParam('test', 'all'); // defaults to 'all'

        $result = array();
        switch ($filename) {
            case 'meh':
                $result = array(1,2,3);
                break;
            case 'all':
            default:
                $result = array(4,5,6);
                break;
        }

        print_r($result); // show it in the console
    }
}
