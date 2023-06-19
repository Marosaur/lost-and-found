<?php
$server = "localhost";
$user = "root";
if (!empty($_POST['rootPW']))
	$pw = $_POST['rootPW'];
elseif ($_POST['server'] =="mamp")
	$pw = "root";
else 
	$pw = ""; // by default xammp root user has no password

$db = "lost_and_found";

$connect=mysqli_connect($server, $user, $pw, $db);

if(!$connect) {
	die("ERROR: Cannot connect to database $db on server $server 
	using user name $user (".mysqli_connect_errno().
	", ".mysqli_connect_error().")");
}

$createAccount="GRANT ALL PRIVILEGES ON lost_and_found.* TO 'wbip'@'localhost' IDENTIFIED BY 'wbip123' WITH GRANT OPTION";

// need this at start of the create table scripts? SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

$dropPersonnelTable = "DROP TABLE IF EXISTS personnel";

$createPersonnelTable = "CREATE TABLE personnel (
  empID int NOT NULL,
  firstName varchar(64) NOT NULL,
  lastName varchar(64) NOT NULL,
  jobTitle varchar(64) NOT NULL,
  hourlyWage float NOT NULL,
  PRIMARY KEY (empID),
  UNIQUE KEY empID (empID)
 ) ENGINE='MyISAM'  DEFAULT CHARSET='latin1'";

$addPersonnelRecords ="REPLACE INTO personnel (empID, firstName, lastName, jobTitle, hourlyWage) VALUES
(12345, 'Chris', 'Smith', 'Sales', 12.15),
(12347, 'Mary', 'Peters', 'Sales', 12.55),
(12348, 'Mike', 'Jones', 'Manager', 24.15),
(12353, 'Anne', 'Humphries', 'Accountant', 25.45),
(12356, 'Ann', 'Jones', 'Sales',13.75),
(12357, 'John', 'Jackson', 'Reception', 8.75),
(12358, 'John', 'King', 'Cleaner', 7.75),
(12360, 'Ken', 'Stewart', 'Accountant', 28.55),
(12361, 'Joan', 'Smith', 'Cleaner', 8.25),
(12363, 'Jesse', 'Andrews', 'Sales', 10.75);";

$dropTimesheetTable = "DROP TABLE IF EXISTS timesheet";

$createTimesheetTable = "CREATE TABLE timesheet (
  empID int NOT NULL,
  hoursWorked int NOT NULL,
  PRIMARY KEY (empID),
  UNIQUE KEY empID (empID)
 ) ENGINE=MyISAM  DEFAULT CHARSET=latin1";

$addTimesheetRecords ="REPLACE INTO timesheet (empID, hoursWorked) VALUES
(12345, 30),
(12347, 35),
(12348, 40),
(12353, 35),
(12356, 20),
(12357, 40),
(12358, 32),
(12360, 20),
(12361, 32),
(12363, 35);";

$result = mysqli_query($connect, $createAccount);

if (!$result) 
{
	die("Could not successfully run query ($createAccount) from $db: " .	
		mysqli_error($connect) );
}
else{
	$result = mysqli_query($connect, $dropPersonnelTable);
	if (!$result){
		die("Could not successfully run query ($dropPersonnelTable) from $db: " . mysqli_error($connect) );
	}else  {
		$result = mysqli_query($connect, $createPersonnelTable);
		if (!$result) {
			die("Could not successfully run query ($createPersonnelTable) from $db: " .mysqli_error($connect) );
		}
		else{
			$result = mysqli_query($connect, $addPersonnelRecords);
		
			if (!$result) {
				die("Could not successfully run query ($addPersonnelRecords) from $db: " .mysqli_error($connect) );
			}else {
				$result = mysqli_query($connect, $dropTimesheetTable);
				if (!$result) {
					die("Could not successfully run query ($dropPersonnelTable) from $db: " .mysqli_error($connect) );
				}else {
					$result = mysqli_query($connect, $createTimesheetTable);
					if (!$result) {
						die("Could not successfully run query ($createTimesheetTable) from $db: " .mysqli_error($connect) );
					}else {
						$result = mysqli_query($connect, $addTimesheetRecords);
						if (!$result) {
							die("Could not successfully run query ($addTimesheetRecords) from $db: " .mysqli_error($connect) );
						}else {
							print("<html><head><title>MySQL Setup</title></head>
							<body><h1>MySQL Setup: SUCCESS!</h1><p>Created MySQL user <strong>wbip</strong> with 
							password <strong>wbip123</strong>, with all privileges on the 
							<strong>lost_and_found</strong> database.</p><p>Created tables <strong>personnel</strong> 
							and <strong>timesheet</strong> in the 
							<strong>lost_and_found</strong> database.</p>
							</body></html>");
						}
					}
				}
			}
		}
	}
}

mysqli_close($connect);   // close the connection
 
?>

