<?php
$check = mail("vijaywithccet@gmail.com", "Testing Email", "This is a testing email form xamp server", "From: developervijay11@gmail.com");
if($check)
{
echo "email sent successfully";
}
else
{
echo "email not sent successfully";
}
?>