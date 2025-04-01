<?php
								$sql["host"] = "localhost";
								$sql["user"] = "root";
								$sql["pass"] = "usbw";
								$sql["base"] = "psell";
								$connection = mysql_connect($sql["host"],$sql["user"],$sql["pass"]);
								$select_database = mysql_select_db($sql["base"], $connection);
								mysql_query("SET NAMES utf8");
								?>
								