<?php


class Model_ListAlbums 
{
    
    //Função para select através de métodos
    public function listAlbums()
    {
        $db = Zend_Db_Table::getDefaultAdapter();
        $selectAlbums = new Zend_Db_Select($db);
        $selectAlbums->from('albums')->joinInner('midias', 'albums.tipo = midias.id','midias.midia');
        
        
        
        return $selectAlbums;
    }
    
    
    //Função para select puro
    public function listasqlAlbums()
    {
        $db = Zend_Db_Table::getDefaultAdapter();
        $selectAlbums = $db->query("SELECT * FROM `albums` INNER JOIN midias ON albums.tipo = midias.id")->fetchAll();
        
        
        
        return $selectAlbums;
    }
    
    
}
