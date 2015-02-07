<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    
    protected  function _initAutoload()
    {
        
        $modelLoader = new Zend_Application_Module_Autoloader(array(
            'namespace' => '',
            'basePath' => APPLICATION_PATH
        ));
        
        
        $acl = new Model_LibraryAcl();
        $auth = Zend_Auth::getInstance();
        
        $fc = Zend_Controller_Front::getInstance();
        $fc->registerPlugin(new Plugin_AccessCheck($acl, $auth));
        
        return $modelLoader;
    
    }
    
   protected function _initJquery() {
        $this -> bootstrap('view');
        $view = $this -> getResource('view');
        $view -> addHelperPath("ZendX/JQuery/View/Helper",
                               "ZendX_JQuery_View_Helper"
                              );
        Zend_Controller_Action_HelperBroker::addHelper(
                            new ZendX_JQuery_Controller_Action_Helper_AutoComplete()
                              );
        $view -> jQuery()
              -> enable()
              -> setVersion('1.7')
              -> setUiVersion('1.8.16')
              -> addStylesheet('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/ui-lightness/jquery-ui.css')
              -> uiEnable();
    } 
   

    
}

