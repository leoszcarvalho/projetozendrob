<?php


class Plugin_AccessCheck extends Zend_Controller_Plugin_Abstract 
{
    
    private $_acl = null;
    private $_auth = null;
    
    public function __construct(Zend_Acl $acl, Zend_Auth $auth) 
    {
        $this->_acl = $acl;
        $this->_auth = $auth;
    }
    
    public function preDispatch(Zend_Controller_Request_Abstract $request) 
    {
        $resource = $request->getControllerName();
        $action = $request->getActionName();
        $identidade = $this->_auth->getStorage()->read();
        
        if($this->_auth->hasIdentity())
        {
          $nivel = $identidade->nivel;
        }
        else 
        {
            $nivel = null;
        }
        
        if(!$this->_acl->isAllowed($nivel,$resource,$action))
        {
            $request->setControllerName('acesso')
                    ->setActionName('index');
        }
        
    }
    
}
