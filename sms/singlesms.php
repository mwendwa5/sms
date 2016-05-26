<HTML>
<BODY>
<H1> Send an SMS </H1>
<?php
$phonenum = $_GET['phonenum'];
$messagetext = $_GET['messagetext'];
if ($phonenum !='') {
$conn = mysql_connect("localhost", 'bruce', 'Pass01!');
if (!$conn) {
    die('Could not connect to database ' . mysql_error());
 }
  mysql_select_db('church');
  $sql = "INSERT INTO messageout (receiver,msg,status) ".
         "VALUES ('$phonenum','$messagetext','send')";
  mysql_query($sql);
  mysql_close($conn);

  echo 'The message has been submitted for sending';
}
?>

<FORM action=sendsms.php METHOD=POST>
  Mobile phone number:
  <INPUT TYPE="TEXT" SIZE="16" NAME="phonenum" VALUE="">
  <br>
  <TEXTAREA NAME="messagetext" ROWS=5 COLS=40></TEXTAREA>
  <br>
  <INPUT TYPE=SUBMIT VALUE=SEND>
</FORM>

</BODY>
</HTML>
