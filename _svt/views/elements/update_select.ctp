<?
	if(!empty($options))
	{
		foreach($options as $k => $v)
			echo "<option value='$k'>".utf8_encode($v)."</option>";
	}else
		echo "<option value=''>Empty</option>";
?>