<?php

namespace App\ExternalClasses;

class WebSenderAPI {

	public $timeout = 30;

	var $host;
	var $password;
	var $port;
	var $socket;

	public function __construct($host, $password, $port){
		$this->host = gethostbyname($host);
		$this->password = $password;
		$this->port = $port;
	}

	public function __destruct(){
        if($this->socket)
            $this->disconnect();
    }

	public function connect(){
		@$this->socket = fsockopen($this->host, $this->port, $errno, $errstr, $this->timeout);
		if(!$this->socket) return false;
		@$this->writeRawByte(1);
		@$this->writeString(hash("SHA512", $this->readRawInt().$this->password));
		return $this->readRawInt() == 1 ? true: false;
	}

	/*
	*   -> event is cancelled or command not entered this method msut be return false.
	*/
	public function sendCommand($command){
		$this->writeRawByte(2);
		$this->writeString(base64_encode($command));
		return $this->readRawInt() == 1 ? true: false;
	}

	/*
	*   -> event is cancelled this method must be return false.
	*/
	public function sendMessage($message){
		$this->writeRawByte(4);
		$this->writeString(base64_encode($message));
		return $this->readRawInt() == 1 ? true: false;
	}

	public function disconnect(){
		if(!$this->socket) return false;
		return $this->writeRawByte(3) ? true: false;
	}

	private function writeRawInt($i){
		@fwrite($this->socket, pack("N", $i), 4);
	}

	private function writeRawByte($b){
		@fwrite($this->socket, strrev(pack("C", $b)));
	}

	private function writeString($string){
		$array = str_split($string);
		$this->writeRawInt(count($array));
		foreach($array as &$cur){
			$v = ord($cur);
			$this->writeRawByte((0xff & ($v >> 8)));
			$this->writeRawByte((0xff & $v));
		}
	}

	private function readRawInt(){
		$a = $this->readRawByte();
		$b = $this->readRawByte();
		$c = $this->readRawByte();
		$d = $this->readRawByte();
		$i = ((($a & 0xff) << 24) | (($b & 0xff) << 16) | (($c & 0xff) << 8) | ($d & 0xff));
		if($i > 2147483648)
	 		$i -= 4294967296;
		return $i;
	}

	private function readRawByte(){
		$up = unpack("Ci", fread($this->socket, 1));
		$b = $up["i"];
		if($b > 127)
			$b -= 256;
		return $b;
	}

}
