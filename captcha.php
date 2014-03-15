<?
//Start the session so we can store what the security code actually is
session_start();

//Send a generated image to the browser 
create_image(6); //the argument here specifies the length of the characters (default here is 6)
exit(); 

 function str_rand($string_length, $string_type='numeric') { 
        $string_array = array('numeric','alpha','alnum','alnum_cap','alnum_low','alpha_cap','alpha_low'); 
        if(array_search($string_type, $string_array) !== FALSE) { 
            if($string_length < 40) { 
                switch($string_type) { 
                    case 'numeric': 
                        $string_seed = range('1','9'); 
                    break; 
                    case 'alpha': 
                        $string_seed = array_merge(range('A','Z'), range('a','z')); 
                    break; 
                    case 'alpha_cap': 
                        $string_seed = range('A','Z'); 
                    break; 
                    case 'alpha_low': 
                        $string_seed = range('a','z'); 
                    break; 
                    case 'alnum': 
                        $string_seed = array_merge(range('1','9'), array_merge(range('A','Z'), range('a','z'))); 
                    break; 
                    case 'alnum_cap': 
                        $string_seed = array_merge(range('1','9'), range('A','Z')); 
                    break; 
                    case 'alnum_low': 
                        $string_seed = array_merge(range('1','9'), range('a','z')); 
                    break; 
                } 
                $string_random = ''; 
                for($i=0;$i<$string_length;$i++) { 
                    $string_key = array_rand($string_seed, 1); 
                    $string_random .= $string_seed[$string_key]; 
                } 
                return $string_random; 
            } 
            else { 
                return 'Invalid string length'; 
            } 
        } 
        else { 
            return 'Invalid string type'; 
        } 
    } 


function create_image($len=5) 
{ 
	$image_width = 197; 
    $image_height = 40; 
    $image_base = imagecreatetruecolor($image_width,$image_height); 
    $image_background = imagecolorallocate($image_base, 250, 250, 250); 
    imagefill($image_base, 0, 0, $image_background); 
    if(isset($_GET['s'])) { 
        $image_text = $_GET['s']; 
    } 
    else { 
        $image_text = str_rand($len, 'alnum'); 
    } 
	

    //Set the session to store the security code
    $_SESSION["security_code"] = $image_text;
	
	
    $image_text_array = str_split($image_text, 1); 
    $image_text_color = imagecolorallocate($image_base,0,0,0); 
    $image_font = 'verdana.ttf'; 
    $image_letter = ($image_width/8); 
    header('Content-type: image/png'); 
    for($i=0;$i<=16;$i++) { 
        $image_line_color = imagecolorallocatealpha($image_base,mt_rand('0','200'),mt_rand('0','200'),mt_rand('0','200'),mt_rand('20','115')); 
        imagesetthickness($image_base,mt_rand('1','3')); 
        imageline($image_base,mt_rand('0',$image_width),mt_rand('0',$image_height),mt_rand('0',$image_width),mt_rand('0',$image_height),$image_line_color);
    } 
    $image_dots_spacing = 10; 
    $image_dots_y = $image_height/$image_dots_spacing; 
    for($i=0;$i<=$image_dots_y;$i++) { 
        $image_line_color = imagecolorallocatealpha($image_base,mt_rand('0','200'),mt_rand('0','200'),mt_rand('0','200'),mt_rand('20','115')); 
        imagesetthickness($image_base,2); 
    } 
    for($i=0;$i<=6;$i++) { 
        $image_text_direction = mt_rand('1','2'); 
        if($image_text_direction == 1) { 
            imagettftext($image_base, 20,-mt_rand('5','15'),$image_letter,30,$image_text_color,$image_font,$image_text_array[$i]); 
        } 
        else { 
            imagettftext($image_base, 20,mt_rand('5','15'),$image_letter,30,$image_text_color,$image_font,$image_text_array[$i]); 
        } 
        $image_letter = $image_letter+($image_width/8); 
    } 
    imagepng($image_base); 
    imagedestroy($image_base); 	
} 
?>