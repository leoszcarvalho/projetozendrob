<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        //Modo básico de se fazer um controle de acesso com sessão dos usuários
        
       /* $VarSessao = new Zend_Session_Namespace('NovaSessao');

        if(!isset($VarSessao->user))
        {
            $this->redirect('acesso');
        }*/
         
    }
    
   

    public function indexAction()
    {
        
        
        $albumsList = new Model_ListAlbums();
        //Variável lista retorna o select real no echo
        $lista = $albumsList->listAlbums();
//die();
        
        
        
        $adapter = new Zend_Paginator_Adapter_DbSelect($lista);
        $paginator = new Zend_Paginator($adapter);
        
        
        //JQuery
        /*Coloca resultados em um array caso seja utilizado um autocomplete
        foreach($paginator as $alb)
        {
            $array[] = $alb['artist'];
        }
        */
        
        //Conta número de resultados
        //echo count($adapter);
        
        
        $paginator->setItemCountPerPage(10)
                ->setCurrentPageNumber($this->getParam('page',1));
        
        $this->view->paginator = $paginator;
        
        //JQuery
        /*Cria o campo para utilizar de autocomplete no JQuery
        $emt = new ZendX_JQuery_Form_Element_AutoComplete('ac');
        $emt->setJQueryParam('data', $array)
        ->removeDecorator('label')
        ->removeDecorator('HtmlTag');
        
        $this->view->autocompleteElement = $emt;
        */
        
        //=================================================================================================================
        
        /*UTILIZAÇÃO DE SELECT PURO -> obs: listagem na index é a mesma só tem q mudar a var de paginacao para querylivre
        $queryAlbums = $albumsList->listasqlAlbums();
        
        $this->view->querylivre = $queryAlbums;
        */
        
       // echo $this->getParam('page');
    
    }

    public function listAction()
    {
        
        
        $albumsList = new Model_ListAlbums();
        $albumsList = $albumsList->listAlbums();
//die();

        
        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_DbSelect($albumsList));
        $paginator->setItemCountPerPage(10)
                ->setCurrentPageNumber($this->getParam('page',1));
        
        $this->view->paginator = $paginator;
        
       // echo $this->getParam('page');
    
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
                
                
                $nome_img = $transferencia->getFileName('imagem', false);
                $nome_txt = $transferencia->getFileName('arq_texto', false);
                
                //Checa se o usuário fez o upload dos arquivos
                if(!is_array($nome_img) && !is_array($nome_txt)) 
                {
                    //Tranferência dos arquivos e renomeação precisa ser de um a um devido 
                    //ao bug do próprio Zend que n permite a adição de multiplos arquivos renomeados
                    
                    $nome_img_real = time()."-+-".$nome_img;
                    $nome_txt_real = time()."-+-".$nome_txt;
                    
                    //Transferência de imagem
                    $transferencia->addFilter('Rename', array('target' => '../public/images/'.$nome_img_real, 'overwrite' => true));

                    $transferencia->receive('imagem');
                    
                    //Transferência de texto
                    $transferencia->addFilter('Rename', array('target' => '../public/images/'.$nome_txt_real, 'overwrite' => true));

                    $transferencia->receive('arq_texto');


                    $artist = $form->getValue('artist');
                    $title = $form->getValue('title');

                    $albums = new Application_Model_DbTable_Albums();

                    if($albums->addAlbum($artist, $title,$nome_txt_real,$nome_img_real) == true)
                    {

                      die("<script>alert('Registro incluído com sucesso'); self.location='../';</script>"
                      . "<noscript>Registro incluído com sucesso"
                      . "<meta content='2;url=../' http-equiv='refresh'></noscript>");
                    }
                    else
                    {
                      die("<script>alert('Ocorreu um erro na inclusão do registro do banco'); self.location='../';</script>"
                      . "<noscript>Ocorreu um erro na inclusão do registro do banco"
                      . "<meta content='2;url=../' http-equiv='refresh'></noscript>");

                    }
                
                }
                else
                {
                    
                    print "É necessários subir os arquivos de texto e imagem";
                    
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
       
       $id = (int)$this->_getParam('id', 0);
       
       
       //Instancia classe aqui já pra fazer o select dos arquivos se tiverem sido modificados
       $albums = new Application_Model_DbTable_Albums();
       
       $img = $albums->selectAlbum($id);
       
       $this->view->imagem = $img->arq_imagem;
       
       
       if ($this->getRequest()->isPost()) 
       {
            $formData = $this->getRequest()->getPost();
            
            
            if ($form->isValid($formData)) 
            {
                
                
                $id = (int)$form->getValue('id');
                
                $artist = $form->getValue('artist');
                $title = $form->getValue('title');

                
                $transferencia = new Zend_File_Transfer_Adapter_Http();
                $transferencia->setDestination("../public/images/");
                
                $nome_img = $transferencia->getFileName('imagem', false);
                $nome_txt = $transferencia->getFileName('arq_texto', false);
                   
                $row = $albums->selectAlbum($id);
                
                
                
                //Verifica se os arquivos foram enviados
                if(!is_array($nome_img)) 
                {
                    
                    //echo '../public/images/'.$row->arq_imagem;
                    //die();
                      
                    if(unlink('../public/images/'.$row->arq_imagem))
                    {
                            //echo 'Arquivo antigo deletado com sucesso';
                            //die();
                            if($transferencia->receive('imagem'))
                            {
                                //echo "- Novo Arquivo gravado com sucesso";
                                //die(); 
                                
                                if($albums->updateImagem($id, $nome_img) == true)
                                {
                                    //echo "- BD atualizado com sucesso";
                                    //die();
                                }
                                else
                                {
                                    
                                    die("Ocorreu um erro na atualização da imagem no BD");
                                    
                                }
                                
                            }
                            else
                            {
                                
                                die("Ocorreu um erro no recebimento da imagem");

                                
                            }
                    }
                    else 
                    {
                        die("Ocorreu um erro ao tentar deletar a imagem antiga");
                    }
                    
                }
                
                if(!is_array($nome_txt)) 
                {
                    
                    //echo '../public/images/'.$row->arq_imagem;
                    //die();
                      
                    if(unlink('../public/images/'.$row->arq_texto))
                    {
                            //echo 'Arquivo antigo deletado com sucesso';
                            //die();
                            if($transferencia->receive('arq_texto'))
                            {
                                //echo "- Novo Arquivo gravado com sucesso";
                                //die(); 
                                
                                if($albums->updateTxt($id, $nome_txt) == true)
                                {
                                    //echo "- BD atualizado com sucesso";
                                    //die();
                                }
                                else
                                {
                                    die("Ocorreu um erro na atualização do arquivo de texto no BD");
                                }
                                
                            }
                            else
                            {
                                die("Ocorreu um erro no recebimento do arquivo de texto");
                            }
                    }
                    else
                    {
                        
                        die("Ocorreu um erro ao tentar deletar o arquivo de texto antigo");
      
                    }
                    
                }
                
                
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

    public function pdfAction()
    {
       
    //Visualizar o PDF na Tela
    //====================================================================================
    //====================================================================================
    /* $this->_helper->viewRenderer->setNoRender();
    $this->_helper->layout()->disableLayout();
        
    $this->getResponse()
        ->setHeader('Content-type', 'application/pdf');
    $pdf = Zend_Pdf::load('../public/images/teste.pdf');
    echo $pdf->render();
      */ 
    //====================================================================================
    
    //Criar documento PDF e exibir no final
    //Mais info http://www.ibm.com/developerworks/br/library/os-php-zend5/#ibm-pcon
    
    $pdf = new Zend_Pdf();
    
    $page = new Zend_Pdf_Page(Zend_Pdf_Page::SIZE_A4);
    $pageHeight = $page->getHeight();
    $pageWidth = $page->getWidth();
    
    $topPos = $pageHeight - 36;
    $leftPos = 36;
    $bottomPos = 30;
    $rightPos = 0;
    
    $style = new Zend_Pdf_Style();
    $style->setLineColor(new Zend_Pdf_Color_RGB(0.9, 0, 0));
    $style->setFillColor(new Zend_Pdf_Color_GrayScale(0.2));
    $style->setLineWidth(3);
    $style->setFont(new Zend_Pdf_Resource_Font_Simple_Standard_Courier(), 32);
    
    
    $page->setStyle($style);
    
    $texto = "Teste! aaaa asiodsad saidaisd asindisad saoidnsoaid asidmsaoid "
            . "asoidmsaodi asdmasod asmdioi sdaidmasid asoimdas ds";
    
    $page->drawText($texto, $rightPos, $topPos);

    $pdf->pages[0] = ($page);
    
    $pdf->save("../public/images/alala.pdf");    
    
    $this->_helper->viewRenderer->setNoRender();
    $this->_helper->layout()->disableLayout();
     $this->getResponse()
        ->setHeader('Content-type', 'application/pdf');
    $pdf = Zend_Pdf::load('../public/images/alala.pdf');
    echo $pdf->render();
    
    }


}













