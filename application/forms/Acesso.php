<?php

class Application_Form_Acesso extends Zend_Form
{

    public function init()
    {
        $this->setName('acesso');
        
       
        
        $login = new Zend_Form_Element_Text('login');
        $login->setLabel('Login')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim');
        
        $senha = new Zend_Form_Element_Password('senha');       
        $senha->setLabel('Senha')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim');
        
        
        
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($login, $senha, $submit));

    }


}

