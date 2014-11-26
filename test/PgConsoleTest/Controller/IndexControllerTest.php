<?php

namespace PgConsoleTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;
use Zend\Console\Request as ConsoleRequest;
use Zend\Console\Response;
use Zend\Mvc\Router\RouteMatch;
use PgConsole\Controller\IndexController;
use PgConsoleTest\Bootstrap;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;
    protected $event;
    protected $eventManager;
    protected $serviceManager;

    protected function setUp() {
        $bootstrap = \Zend\Mvc\Application::init(Bootstrap::getConfig());
        $this->request = new ConsoleRequest();
        $this->routeMatch = new RouteMatch(array('controller' => 'index'));
        $this->event = $bootstrap->getMvcEvent();
        $this->event->setRouteMatch($this->routeMatch);
        $this->eventManager = $bootstrap->getEventManager();
        $this->serviceManager = $bootstrap->getServiceManager();

        $this->initController();
        $this->tearDown();
    }

    protected function initController() {
        $this->controller = new IndexController();
        $this->controller->setEvent($this->event);
        $this->controller->setEventManager($this->eventManager);
        $this->controller->setServiceLocator($this->serviceManager);
    }

    protected function tearDown() {

    }

    public function testIndexAction()
    {
        $this->routeMatch->setParam('action', 'index');
        $this->routeMatch->setParam('test', 'all');

        $result = $this->controller->dispatch($this->request);
        $response = $this->controller->getResponse();

        //print_r($result->getVariable('result'));

        $this->assertEquals(200, $response->getStatusCode(), 'Status code is 200 OK!');
        $this->assertInstanceOf('Zend\View\Model\ViewModel', $result, 'Method return object Zend\View\Model\ViewModel!');
        $this->assertEquals("1,2,3,4,5,6\n", $result->getVariable('result'), 'Returt value is correctly!');
    }

}
