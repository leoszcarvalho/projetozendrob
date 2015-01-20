<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $albums = new Application_Model_DbTable_Albums();
        $this->view->albums = $albums->fetchAll();
        
        $VarSessao = new Zend_Session_Namespace('NovaSessao');
        echo $VarSessao->user;
    
    }

    public function addAction()
    {
        $form = new Application_Form_Album();

        $form->submit->setLabel('Add');
        
        $this->view->form = $form;

        if ($this->getRequest()->isPost()) 
        {
            $formData = $this->getRequest()->getPost();
            
            if ($form->isValid($formData)) 
            {
                
                $transferencia = new Zend_File_Transfer_Adapter_Http();
                $transferencia->setDestination("../public/images/");
                
                  if ($transferencia->receive(array('imagem','arq_texto')))
                  {
                      $nome_img = $transferencia->getFileName('imagem', false);
                      $nome_txt = $transferencia->getFileName('arq_texto', false);
                      
                      
                      
                      $artist = $form->getValue('artist');
                      $title = $form->getValue('title');
                      $albums = new Application_Model_DbTable_Albums();
                      
                      if($albums->addAlbum($artist, $title) == true)
                      {
                      
                      die("<script>alert('Registro incluído com sucesso'); self.location='../';</script>"
                         . "<noscript>Registro incluído com sucesso"
                         . "<meta content='2;url=http://projetozendrob.com/' http-equiv='refresh'></noscript>");
                      }
                      else
                      {
                         die("<script>alert('Ocorreu um erro na inclusão do registro do banco'); self.location='../';</script>"
                         . "<noscript>Ocorreu um erro na inclusão do registro do banco"
                         . "<meta content='2;url=http://projetozendrob.com/' http-equiv='refresh'></noscript>");
                          
                      }
                      
                  }
                  else 
                  {
                    print "Erro ao enviar arquivos, é necessário o envio dos arquivos de texto e imagem";
                  }
                
                
            } 
            else 
            {
                $form->populate($formData);
            }
        }
    }

    public function editAction()
    {
        
        
       $form = new Application_Form_Album();
       $form->submit->setLabel('Save');
       
       $this->view->form = $form;

       if ($this->getRequest()->isPost()) 
       {
            $formData = $this->getRequest()->getPost();
            
            if ($form->isValid($formData)) 
            {
                $id = (int)$form->getValue('id');
                $artist = $form->getValue('artist');
                $title = $form->getValue('title');
                $albums = new Application_Model_DbTable_Albums();
                $albums->updateAlbum($id, $artist, $title);

                 $this->_helper->redirector('index');
            } 
            else 
            {
                
                $form->populate($formData);
            }
        } 
        else  
        {
            
            $id = $this->_getParam('id', 0);
            
            if ($id > 0) 
            {
                $albums = new Application_Model_DbTable_Albums();

                if($albums->getAlbum($id) != false)
                {
                
                $form->populate($albums->getAlbum($id));
                
                }
                else 
                {
                    
                    $this->_helper->redirector('index');

                }
                
            }
        }
    }

    public function deleteAction()
    {

        if ($this->getRequest()->isPost()) 
        {
            $del = $this->getRequest()->getPost('del');
            
            if ($del == 'Yes') 
            {
                $id = $this->getRequest()->getPost('id');
                $albums = new Application_Model_DbTable_Albums();
                $albums->deleteAlbum($id);
            }
            
            $this->_helper->redirector('index');
        } 
        else 
        {
            $id = $this->_getParam('id', 0);
            $albums = new Application_Model_DbTable_Albums();
            $this->view->album = $albums->getAlbum($id);
        } 
        
    }

    public function alalalaAction()
    {
        // action body
    }

    public function tasteAction()
    {
        // action body
    }


}











