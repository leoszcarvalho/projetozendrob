<?php

class Application_Form_Album extends Zend_Form
{

    public function init()
    {
        $this->setName('album');
        
        $id = new Zend_Form_Element_Hidden('id');
        $id->addFilter('Int');
        
        $artist = new Zend_Form_Element_Text('artist');
        $artist->setLabel('Artist')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty');
        
        $validaTamanho = new Zend_Validate_StringLength(5,100);
        $validaTamanho->setMessages(
                array(
                    Zend_Validate_StringLength::TOO_SHORT => "O campo titulo não pode ser menor que 5 caracteres",
                    Zend_Validate_StringLength::TOO_LONG => "O campo titulo não pode ser maior que 100 caracteres",
                    
                )
                );
        
        
        $title = new Zend_Form_Element_Text('title');       
        $title->setLabel('Title')
        ->setRequired(true)
        ->addFilter('StripTags')
        ->addFilter('StringTrim')
        ->addValidator('NotEmpty')
        ->addValidator($validaTamanho);
        
        //$validaTamanho->isValid($title);
        
        $arquivo_img = new Zend_Form_Element_File('imagem');
        $arquivo_img->setLabel('Imagem');
        
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setAttrib('id', 'submitbutton');
        $this->addElements(array($id, $artist, $title, $arquivo_img, $submit));
 
        
    }


}

