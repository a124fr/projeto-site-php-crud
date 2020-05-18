<?php

abstract class Connection
{
	private static $conn;

	public static function getConn()
	{	
		if(empty(self::$conn))
		{
			self::$conn = $conn = new PDO('mysql:dbname=serie-criando-site;host=localhost;port=3308', 'root', '');
		}
		return self::$conn;
	}
}