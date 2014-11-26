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

        $result = array(1,2,3,4,5,6);
        switch ($filename) {
            case 'meh':
                $output = array_rand($result)."\n";
                break;
            case 'all':
            default:
                $output = implode(',', $result)."\n";
                break;
        }

        // show it in the console
        return $output;
    }
}
