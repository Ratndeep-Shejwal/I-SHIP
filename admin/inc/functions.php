<?php
function get_ext($pdo,$fname)
{

	$up_filename=$_FILES[$fname]["name"];
	$file_basename = substr($up_filename, 0, strripos($up_filename, '.')); // strip extention
	$file_ext = substr($up_filename, strripos($up_filename, '.')); // strip name
	return $file_ext;
}

function ext_check($pdo,$allowed_ext,$my_ext) 
{

	$arr1 = array();
	$arr1 = explode("|",$allowed_ext);	
	$count_arr1 = count(explode("|",$allowed_ext));	

	for($i=0;$i<$count_arr1;$i++)
	{
		$arr1[$i] = '.'.$arr1[$i];
	}
	

	$str = '';
	$stat = 0;
	for($i=0;$i<$count_arr1;$i++)
	{
		if($my_ext == $arr1[$i])
		{
			$stat = 1;
			break;
		}
	}

	if($stat == 1)
		return true; // file extension match
	else
		return false; // file extension not match
}


function get_ai_id($pdo,$tbl_name) 
{
	$statement = $pdo->prepare("SHOW TABLE STATUS LIKE '$tbl_name'");
	$statement->execute();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $row)
	{
		$next_id = $row['Auto_increment'];
	}
	return $next_id;
}

// File f()

/**
 *  Messages associated with the upload error code
 */
const MESSAGES = [
    UPLOAD_ERR_OK => 'File uploaded successfully',
    UPLOAD_ERR_INI_SIZE => 'File is too big to upload',
    UPLOAD_ERR_FORM_SIZE => 'File is too big to upload',
    UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
    UPLOAD_ERR_NO_FILE => 'No file was uploaded',
    UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder on the server',
    UPLOAD_ERR_CANT_WRITE => 'File is failed to save to disk.',
    UPLOAD_ERR_EXTENSION => 'File is not allowed to upload to this server',
];

const ALLOWED_FILES = [
	'image/png' => 'png',
	'image/jpeg' => 'jpg',
	'video/mp4' => 'mp4'
];

define("MAX_SIZE",5 * 1024 * 1024); //  5MB

define("UPLOAD_DIR", dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR ."uploads");

/**
 * Return a mime type of file or false if an error occurred
 *
 * @param string $filename
 * @return string | bool
 */
function get_mime_type(string $filename)
{
    $info = finfo_open(FILEINFO_MIME_TYPE);
    if (!$info) {
        return false;
    }

    $mime_type = finfo_file($info, $filename);
    finfo_close($info);

    return $mime_type;
}

/**
 * Return a human-readable file size
 *
 * @param int $bytes
 * @param int $decimals
 * @return string
 */
function format_filesize(int $bytes, int $decimals = 2): string
{
    $units = 'BKMGTP';
    $factor = floor((strlen($bytes) - 1) / 3);

    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . $units[(int)$factor];
}


/**
 * Redirect user with a session based flash message
 * @param string $message
 * @param string $type
 * @param string $name
 * @param string $location
 * @return void
 */
function redirect_with_message(string $message, string $type=FLASH_ERROR, string $name='upload', string $location='index.php'): void
{
    flash($name, $message, $type);
    header("Location: $location", true, 303);
    exit;
}



function check_selected_status($value, $checkwith) {
	if ($value == $checkwith) {
		return 'selected="selected"';
	}
}