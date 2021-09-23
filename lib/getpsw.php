<?php

$action = $_GET['a'];

if (isset($action) && $action == "1")
{
	if (isset($_GET['psw']) && (ctype_alnum($_GET['psw']) || $_GET['psw'] == "") && isset($_GET['wh']))
	{
		$userPsw = encrypt_decrypt('encrypt', $_GET['psw']);
		if ($userPsw == $_GET['wh'])
		{
			echo "great!";
		}
		else 
		{
			echo("Password errata, per favore riprovare");
		}
	}
	else
	{
		echo("Si e' verificato un errore nella verifica della password, per favore riprovare");
	}
}





/**
 * simple method to encrypt or decrypt a plain text string
 * initialization vector(IV) has to be the same when encrypting and decrypting
 * PHP 5.4.9
 *
 * this is a beginners template for simple encryption decryption
 * before using this in production environments, please read about encryption
 *
 * @param string $action: can be 'encrypt' or 'decrypt'
 * @param string $string: string to encrypt or decrypt
 *
 * @return string
 */
function encrypt_decrypt($action, $string)
{
	$output = false;

	$encrypt_method = "AES-256-CBC";
	$secret_key = 123456;//'This is my secret key';
	$secret_iv = 09876;//'This is my secret iv';

	// hash
	$key = hash('sha256', $secret_key);

	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if( $action == 'encrypt' )
	{
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
	}
	else if( $action == 'decrypt' )
	{
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}

	return $output;
}


?>