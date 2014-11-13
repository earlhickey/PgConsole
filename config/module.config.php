<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'PgConsole\Controller\Index' => 'PgConsole\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            // HTTP routes are here
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'enhance-xml' => array(
                    'options' => array(
                        'route'    => 'console do [all|meh]:test [--verbose|-v]',
                        'defaults' => array(
                            'controller' => 'PgConsole\Controller\Index',
                            'action'     => 'index'
                        )
                    )
                )
            )
        )
    ),
);
