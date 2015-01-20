<?php

class Application_Model_DbTable_Usuarios extends Zend_Db_Table_Abstract
{

    protected $_name = 'usuarios';

    public function verifica_acesso($login,$senha)
    {           
            //Inicia Debug
            $this->_db->getProfiler()->setEnabled(true); //start the profiler
            
                $row = $this->fetchRow(array("login = ?" => "$login",'senha= ?' => "$senha"));
                
                
                //Debug da Query
                
                               
            
                //$query = $this->_db->getProfiler()->getLastQueryProfile()->getQuery(); //get the last executed query
                //var_dump( $query ); //show the query
                //$this->_db->getProfiler()->setEnabled(false); //disable the profiler
                
                //Fim de Debug da Query
                
                if (!$row) 
                {
                    //throw new Exception("Could not find row $id");
            
                    return false;        
            
                }
                else
                {
        
                    return $row->toArray();
        
                }
                
                Zend_Debug::dump($row);
    }
}

