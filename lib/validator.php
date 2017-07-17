<?php
class Validator
{
	public static function validateForm($fields)
	{
		foreach ($fields as $index => $value) {
			$value = trim($value);
			$fields[$index] = $value;
		}
		return $fields;
	}

	public static function validateImage($file)
	{
		$img_size = $file["size"];
     	if($img_size <= 2097152)
     	{
     		$img_type = $file["type"];
	     	if($img_type == "image/jpeg" || $img_type == "image/png" || $img_type == "image/gif")
	    	{
	    		$img_temporal = $file["tmp_name"];
	    		$img_info = getimagesize($img_temporal);
		    	$img_width = $img_info[0]; 
				$img_height = $img_info[1];
				if ($img_width > $img_height && $img_width >= 1000 && $img_height >= 300)
				{
						$image = file_get_contents($img_temporal);
						return base64_encode($image);
				}
				else
				{
					throw new Exception("La dimensión de la imagen debe ser rectangular y debe tener al menos un ancho 1366p y el alto de 768p.");
				}
	    	}
	    	else
	    	{
	    		throw new Exception("El formato de la imagen debe ser jpg, png o gif.");
	    	}
     	}
     	else
     	{
     		throw new Exception("El tamaño de la imagen debe ser como máximo 2MB.");
     	}
	}
	public static function uploadImage($file, $path, $name)
	{
		if(file_exists($path))
		{
			if(move_uploaded_file($file, $path.$name))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public static function deleteImage($path, $name)
	{
		if(file_exists($path.$name))
		{
			if(unlink($path.$name))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	public static function validateEmail($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public static function validatepass($pass)
	{
		if (!preg_match('`[a-z]`',$pass)){
		return false;
		}
		if (!preg_match('`[A-Z]`',$pass)){
		return false;
		}
		if (!preg_match('`[0-9]`',$pass)){
		return false;
		}
		if (!preg_match('`[$,-,_]`',$pass)){
		return false;
		}
		return true;

		
	}
}
?>