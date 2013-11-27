<?php
	function clean_request_variable($string)
	{
		$string = strip_tags($string);
		
		$replace_pairs = array(
			"\'" => "&#39;",
			"'" => "&#39;",
			'\"' => "&#34;",
			'"' => "&#34;",
			"<" => "&#60;",
			">" => "&#62;"
		);
		
		$string = strtr($string, $replace_pairs);
		
		return $string;
	}
?>