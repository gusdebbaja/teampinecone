<?php

//Source: https://code.google.com/p/mypeb/wiki/ErlangAsSessionStorageForPHP
//Let's start by creating the open callback

class Open_CallBack_ErlangPHP {

//Open session or throw excpetion
public function open($save_path, $session_name)
{
  if(null === $this->link)
  {
    $this->link = peb_connect($this->host, $this->erlang_cookie, $this->conn_timeout);
    if(!$this->link)
    {
      throw new Exception(sprintf("Can't connect to the erlang node %s using erlang_cookie %s", $this->host, $this->erlang_cookie));
    }
  }
  return $this->link;
}



//function peb_connect that expects three parameters, the host to connect to, the Erlang secret cookie and an optional connection timeout.
protected $host = 'pinecone@129.16.155.40';
protected $erlang_cookie = 'abc';
protected $conn_timeout = 5;


//Close session
public function close()
{
  if(is_resource($this->link))
  {
    peb_close($this->link);
  }
}


//Read
public function read($session_id)
{
  $x = peb_encode("[~s]", array(array($session_id)));
  $result = peb_rpc("session_handler", "read", $x, $this->link);
  $rs = peb_decode($result);
  $data = $rs[0];
  return is_array($data) ? '' : $data;
}

//Write
public function write($session_id, $session_data)
{
  $x = peb_encode("[~s, ~s]", array(array($session_id, $session_data)));
  $result = peb_rpc("session_handler", "write", $x, $this->link);
  unset($result);
  return true;
}

//Destroy
public function destroy($session_id)
{
  $x = peb_encode("[~s]", array(array($session_id)));
  $result = peb_rpc("session_handler", "destroy", $x, $this->link);
  unset($result);
  return true;
}

//Handler 
public function gc($max_expire_time)
{
  $x = peb_encode('[~i]', array(array($max_expirte_time)));
  $result = peb_rpc("session_handler", "gc", $x, $this->link);
  $rs = peb_decode($result);
  return $rs;
}

//use class as a session handler

$sh = new ErlangSessionHandler();

session_set_save_handler(
array($sh,"open"),
array($sh,"close"),
array($sh,"read"),
array($sh,"write"),
array($sh,"destroy"),
array($sh,"gc")
);

session_start();

}

?>