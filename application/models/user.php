<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('id, nome, senha');
   $this -> db -> from('usuario');
   $this -> db -> where('nome', $username);
   $this -> db -> where('senha', MD5($password));
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();
 
   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
}
?>