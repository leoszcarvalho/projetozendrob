<?php

class Application_Model_DbTable_Albums extends Zend_Db_Table_Abstract
{

    protected $_name = 'albums';
    
    public function getAlbum($id)
    {
        $id = (int)$id;
        
        $row = $this->fetchRow('id = ' . $id);
        
        if (!$row) 
        {
            //throw new Exception("Could not find row $id");
            
        return false;        
            
        }
        else
        {
        
        return $row->toArray();
        
        
        }
        
    }
    
    public function selectAlbum($id)
    {
        $id = (int)$id;
        
        $row = $this->fetchRow('id = ' . $id);
        
        if (!$row) 
        {
            //throw new Exception("Could not find row $id");
            
        return false;        
            
        }
        else
        {
        
        return $row;
        
        
        }
        
    }

    public function addAlbum($artist, $title,$txt,$imagem)
    {
        $data = array(
        'artist' => $artist,
        'title' => $title,
        'arq_texto' => $txt,
        'arq_imagem' => $imagem
                
                );
 
        if($this->insert($data))
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }

    public function updateAlbum($id, $artist, $title)
    {
        
        $data = array(
        'artist' => $artist,
        'title' => $title,
            
        );
        
        
        
        $this->update($data, 'id = '. (int)$id);
    
        
    }
    
    public function updateImagem($id, $imagem)
    {
        
        $data = array(
        'arq_imagem' => $imagem
            
        );
        
        
        
        if($this->update($data, 'id = '. (int)$id))
        {
            return true;
        }
        else 
        {
            return false;
        }
    
        
    }

    public function updateTxt($id, $txt)
    {
        
        $data = array(
        'arq_texto' => $txt
            
        );
        
        
        
        if($this->update($data, 'id = '. (int)$id))
        {
            return true;
        }
        else 
        {
            return false;
        }
        
    }
    
    public function deleteAlbum($id)
    {
        $this->delete('id =' . (int)$id);
    }

}

