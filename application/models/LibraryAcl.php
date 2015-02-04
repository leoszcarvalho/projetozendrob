<?php


class Model_LibraryAcl extends Zend_Acl 
{
    
    public function __construct()
    {
         //$this->add(new Zend_Acl_Resource('error'));
        $this->add(new Zend_Acl_Resource('index'));
        $this->add(new Zend_Acl_Resource('edit'),'index');
        $this->add(new Zend_Acl_Resource('add'),'index');
        $this->add(new Zend_Acl_Resource('delete'),'index');
        $this->add(new Zend_Acl_Resource('list'),'index');
        $this->add(new Zend_Acl_Resource('error'),'index');
        
        //$this->add(new Zend_Acl_Resource(null));
       
        
        $this->add(new Zend_Acl_Resource('acesso'));

        
        $this->addRole(new Zend_Acl_Role('user'));
        $this->addRole(new Zend_Acl_Role('admin'),'user');
        
        $this->allow('user','index');
        $this->allow('user','list');
        
        $this->deny('user','index','add');
        $this->deny('user','index','edit');
        $this->deny('user','index','delete');
        
        //Liberar caso o usuário precise ver erros
        //$this->deny('user','index','error');
        
        $this->allow('admin','index','add');
        $this->allow('admin','index','edit');
        $this->allow('admin','index','delete');
        
        //Apenas o admin pode ver os erros
        $this->allow('admin','index','error');
       // $this->allow('admin','page');
        
        
        
        
    }
    
}
