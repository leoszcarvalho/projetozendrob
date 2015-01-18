<?php

class Application_Form_Album extends Zend_Form
{

    public function init()
    {
        $this->setName('album');
        
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        
        
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
        
        $valida_txt = new Zend_Validate_File_MimeType(array('text/plain'));
        $valida_txt->setMessages(array(Zend_Validate_File_MimeType::FALSE_TYPE => "O arquivo de texto precisa ser do tipo text/plain"));
         
        $val_file_exis = new Zend_Validate_File_Upload();
        
        $val_file_exis->setMessages(array(Zend_Validate_File_Upload::NO_FILE => "O arquivo de imagem e texto são obrigatórios"));
        
        
        $artist = new Zend_Form_Element_Text('artist');
        $artist->setLabel('Artist')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator($validaVazio);
        
        $title = new Zend_Form_Element_Text('title');       
        $title->setLabel('Title')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator($validaVazio)
        ->addValidator($validaTamanho);
        
        
        $arquivo_img = new Zend_Form_Element_File('imagem');
        $arquivo_img->setLabel('Imagem')
        ->setRequired(true)
        ->addValidator($val_file_exis)
        ->addValidator($valida_img);
        
        $arquivo_texto = new Zend_Form_Element_File('arq_texto');
        $arquivo_texto->setLabel('Arq. Texto')
        ->setRequired(true)
        ->addValidator($val_file_exis)
        ->addValidator($valida_txt);
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($id, $artist, $title, $arquivo_img, $arquivo_texto, $submit));
 
        
    }


}

