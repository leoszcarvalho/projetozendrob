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
        
        //Verifica se o usuário já está logado
        if(Zend_Auth::getInstance()->hasIdentity())
        {
            $this->redirect('../');
        }
        
        
        if ($this->getRequest()->isPost()) 
        {
            $formData = $this->getRequest()->getPost();
            
            if ($form->isValid($formData)) 
            {
                
                      $login = $form->getValue('login');
                      $senha = $form->getValue('senha');
                      
                      
                      $AuthAdapter = $this->getAuthAdapter();
        
                      $AuthAdapter->setIdentity($login)
                        ->setCredential($senha);
        
                      $auth = Zend_Auth::getInstance();
                      $result = $auth->authenticate($AuthAdapter);
        
                      if($result->isValid())
                      {
                        $identidade = $AuthAdapter->getResultRowObject();
                        $authStorage = $auth->getStorage();
                        $authStorage->write($identidade);
                        $nivel = $identidade->nivel;
                        
                        die("<script>alert('Bem Vindo $login!'); self.location='../index';</script>"
                             . "<noscript>Bem Vindo $login"
                             . "<meta content='2;url=../index' http-equiv='refresh'></noscript>");
                        
                      }
                      else
                      {
                        echo "Usuário ou senha estão incorretos";    
                      
                      }
                      
                      
                      
                     /* $acesso = new Application_Model_DbTable_Usuarios();
                      
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
                      */
            } 
            
        }
    }

    public function logoutAction()
    {
        Zend_Auth::getInstance()->clearIdentity();
        
        $this->redirect('acesso');
        
    }
    
    private function getAuthAdapter()
    {
            //Conexão com o database
            $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
            $authAdapter->setTableName('usuarios')
                    ->setIdentityColumn('login')
                    ->setCredentialColumn('senha')
                    ->setCredentialTreatment('SHA1(?)');
            
            return $authAdapter;
    }


}



