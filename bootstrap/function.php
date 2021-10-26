<?php function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function not_empty($value)
{
	if(!empty($value))
	{
		return $value;
	}else{
		return false;
	}
}
?>