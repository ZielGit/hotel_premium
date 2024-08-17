<?php

class Executor
{
	public static function doit($sql)
	{
		$con = Database::getCon();
		if (Core::$debug_sql) {
			print "<pre>" . $sql . "</pre>";
		}
		return [$con->query($sql), $con->insert_id];
	}
}
