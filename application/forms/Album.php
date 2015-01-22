<?php

class Application_Form_Album extends Zend_Form
{

    public function init()
    {
        
        $this->setName('album')->setDecorators(array(
          array('viewScript', array('viewScript' => '../views/scripts/index/'))
        ));
        
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int')
        ->removeDecorator('label')
        ->removeDecorator('HtmlTag');
        
        
        
        $validaTamanho = new Zend_Validate_StringLength(5,100);
        $validaTamanho->setMessages(
                array(
                    Zend_Validate_StringLength::TOO_SHORT => "O campo titulo não pode ser menor que 5 caracteres",
                    Zend_Validate_StringLength::TOO_LONG => "O campo titulo não pode ser maior que 100 caracteres",
                    
                )
                );
        
        $validaVazio = new Zend_Validate_NotEmpty();
        $validaVazio->setMessages(array(Zend_Validate_NotEmpty::IS_EMPTY => "Nenhum campo pode estar vazio"));
        
        $valida_img = new Zend_Validate_File_IsImage(array('image/jpeg'));
        $valida_img->setMessages(array(
            Zend_Validate_File_IsImage::FALSE_TYPE => "A imagem precisa ser do tipo jpeg"
            ));
        
        $valida_peso_arquivo = new Zend_Validate_File_FilesSize(array('max' => 500 * pow(10, 3)));
        $valida_peso_arquivo->setMessages(array(
            Zend_Validate_File_FilesSize::TOO_BIG => 'O tamanho da imagem não pode exceder 500 kbytes'));
        
        $valida_tamanho_img = new Zend_Validate_File_ImageSize(array('minheight' => 100, 'maxheight' => 1000,
                                                                     'minwidth' => 100, 'maxwidth' => 600));
        
        $valida_tamanho_img->setMessages(array(
            Zend_Validate_File_ImageSize::HEIGHT_TOO_BIG => 'A altura da imagem não deve exceder 1000 pixels',
            Zend_Validate_File_ImageSize::HEIGHT_TOO_SMALL => 'A altura da imagem não deve ser menor que 300 pixels',
            Zend_Validate_File_ImageSize::WIDTH_TOO_BIG => 'A largura da imagem não deve ser maior que 600 pixels',
            Zend_Validate_File_ImageSize::WIDTH_TOO_SMALL => 'A largura da imagem não deve ser menor que 300 pixels'));
        
        $valida_txt = new Zend_Validate_File_MimeType(array('text/plain'));
        $valida_txt->setMessages(array(Zend_Validate_File_MimeType::FALSE_TYPE => "O arquivo de texto precisa ser do tipo text/plain"));
         
        $val_file_exis = new Zend_Validate_File_Upload();
        
        $val_file_exis->setMessages(array(Zend_Validate_File_Upload::NO_FILE => "O arquivo de imagem e texto são obrigatórios"));
        
        
        $artist = new Zend_Form_Element_Text('artist');
        $artist->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator($validaVazio)
        ->removeDecorator('label')
        ->removeDecorator('HtmlTag');
        
        $title = new Zend_Form_Element_Text('title');       
        $title->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator($validaVazio)
        ->addValidator($validaTamanho)
        ->removeDecorator('label')
        ->removeDecorator('HtmlTag');
        
        
       
        $imagem = new Zend_Form_Element_File('imagem');
        $imagem
        ->addValidator($valida_img)
        ->addValidator($valida_peso_arquivo)
        ->addValidator($valida_tamanho_img)
        ->addFilter('Rename',"lalala")
        ->removeDecorator('label')
        ->removeDecorator('HtmlTag');
        
        $arq_texto = new Zend_Form_Element_File('arq_texto');
        $arq_texto->addValidator($valida_txt)
        ->removeDecorator('label')
        ->removeDecorator('HtmlTag');
        
        /*Retirei os ->setRequired(true) e ->addValidator($val_file_exis) pq 
          dá problema com o edit action, então a verificação do upload fica na própria action da controladora deles agora         */
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($id, $artist, $title, $imagem , $arq_texto, $submit));
 
        
        
    }


}

