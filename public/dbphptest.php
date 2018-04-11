<?php
// $dbname = 'MainProjectDb';
// $dbuser = 'anachron456';
// $dbpass = 'sigma26475_X!';
// $dbhost = '160.153.153.136';

$dbname = 'epiz_21822353_codecourse';
$dbuser = 'epiz_21822353';
$dbpass = 'RiYByFDH5F8T';
$dbhost = 'sql206.epizy.com';

$connect = mysqli_connect($dbhost , $dbuser, $dbpass , $dbname) or die("Unable to Connect to '$dbhost'");
mysqli_select_db($connect,$dbname) or die("Could not open the db '$dbname'");
$test_query = "SHOW TABLES FROM $dbname";
$result = mysqli_query($connect,$test_query);
$tblCnt = 0;
while($tbl = mysqli_fetch_array($result)) {
  $tblCnt++;
  #echo $tbl[0]."<br />\n";
}
if (!$tblCnt) {
  echo "There are no tables<br />\n";
} else {
  echo "There are $tblCnt tables<br />\n";
}
