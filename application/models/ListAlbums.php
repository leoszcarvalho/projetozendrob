<?php


class Model_ListAlbums 
{

    public function listAlbums()
    {
        $db = Zend_Db_Table::getDefaultAdapter();
        $selectAlbums = new Zend_Db_Select($db);
        $selectAlbums->from('albums');
        
        return $selectAlbums;
    }
    
}
