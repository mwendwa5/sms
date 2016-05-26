<?php
$conn = mysql_connect("localhost", 'bruce', 'Pass01');
if (!$conn) {
    die('Could not connect to database ' . mysql_error());
 }
mysql_select_db('churchcrm');
$query = "SELECT * FROM list_lst WHERE lst_ID = 1 ORDER BY lst_OptionSequence";
$result = mysql_query($query);
if(!$result) die(mysql_error());
?>
<FORM action=sendgrpsms.php METHOD=POST>
<h1>Sending Group Message</h1>
Select group to send message to: <br>
<?php echo "<select name='groupname'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['lst_OptionName'] ."'>" . $row['lst_OptionName'] ."</option>";
}
echo "</select>";
?>
<br>
Type your message here:<br>
<TEXTAREA NAME="messagetext" ROWS=5 COLS=40></TEXTAREA>
  <br>
  <INPUT TYPE=SUBMIT VALUE=SEND>
</FORM>
<?php
mysql_close($conn);
?>
