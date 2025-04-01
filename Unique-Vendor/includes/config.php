<?php
						$sql["host"] = "localhost";
						$sql["user"] = "database_user";
						$sql["pass"] = "database_pass";
						$sql["base"] = "database_name";
						$connection = mysql_connect($sql["host"],$sql["user"],$sql["pass"]);
						$select_database = mysql_select_db($sql["base"], $connection);
						mysql_query("SET NAMES utf8");
						?>
						