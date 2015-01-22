<?php

class AcessoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_Acesso();

        $form->submit->setLabel('Acessar');
        
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) 
        {
            $formData = $this->getRequest()->getPost();
            
            if ($form->isValid($formData)) 
            {
                
                      $login = $form->getValue('login');
                      $senha = $form->getValue('senha');
                      $acesso = new Application_Model_DbTable_Usuarios();
                      
                      if($acesso->verifica_acesso($login, $senha) != false)
                      {
                            $VarSessao = new Zend_Session_Namespace('NovaSessao');
                            
                            $VarSessao->user = $login;
                            
                            die("<script>alert('Bem Vindo $login!'); self.location='../index';</script>"
                             . "<noscript>Bem Vindo $login"
                             . "<meta content='2;url=../index' http-equiv='refresh'></noscript>");
                      }
                      else
                      {
                          echo "Usuário ou senha estão incorretos";
                      }
                      
            } 
            
        }
    }

    public function logoutAction()
    {
        // action body
        $VarSessao = new Zend_Session_Namespace('NovaSessao');
    
        //Deleta apenas as sessões especificadas
        Zend_Session::namespaceUnset('NovaSessao');
    
        //Deleta todas as sessões
        //Zend_Session::destroy(true);
        
        $this->redirect('/');
        
    }


}



