<?php
class DbConnect
{
	var $host = '' ;
	var $user = '';
	var $password = '';
	var $database = '';
	var $persistent = false;
	var $conn;
	var $error_reporting = false;
	/*constructor function this will run when we call the class */
	function DbConnect ($host1, $user1, $password1,$database1, $error_reporting=true, $persistent=false)
	{
		//pass the hostname, user, password, database names here if static
		$this->host = $host1;
		$this->user = $user1;
		$this->password = $password1;
		$this->database = $database1;
		$this->persistent = $persistent;
		$this->error_reporting = $error_reporting;
	}
	function open()
	{
		if ($this->persistent)
		{
			$func = 'mysql_pconnect';
		}
		else
		{
			$func = 'mysql_connect';
		}
		/* Connect to the MySQl Server */
		$this->conn = $func($this->host, $this->user, $this->password);
		if (!$this->conn)
		{
		return false;
		}
		/* Select the requested DB */
		if (@!mysql_select_db($this->database, $this->conn)) {
			return false;
		}
		else
		{
			return true;
		}
		/*close the connection */
		function close()
		{
			return (@mysql_close($this->conn));
		}
		/* report error if error_reporting set to true */
		function error()
		{
			if ($this->error_reporting)
			{
				return (mysql_error()) ;
			}
		}
	}
}

/* Class to perform query*/
class DbQuery extends DbConnect
{
	var $result = '';
	var $sql;
	function DbQuery($sql1)
	{
		$this->sql = $sql1;
	}
	//Select Query
	function query()
	{
		return $this->result = mysql_query($this->sql);
		//return($this->result != false);
	}
	function affectedrows()
	{
		return(@mysql_affected_rows($this->conn));
	}
	//Return Last Insert ID
	function lastid()
	{
		return(@mysql_insert_id());
	}
	//Return no. of Records
	function numrows()
	{
		return(@mysql_num_rows($this->result));
	}
	function fetchobject()
	{
		return(@mysql_fetch_object($this->result, MYSQL_ASSOC));
	}
	//Returns Result
	function fetcharray()
	{
		return(@mysql_fetch_array($this->result));
	}
	function fetchassoc()
	{
		return(@mysql_fetch_assoc($this->result));
	}
	function freeresult()
	{
		return(@mysql_free_result($this->result));
	}
}
?>
