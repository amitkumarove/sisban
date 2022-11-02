<?php
class Encrypter
{
    // Secret keys
    private $_secretKey = 'jf8gfIg^3*s';
    private $_secretIv = 'd&&9"dh4%:@';
    private $_key = '';
    private $_iv = '';

        
    /**
     * __construct
     *
     * @return void
     */
    function __construct()
    {
        $this->_key = hash('sha256', $this->_secretKey);
        $this->_iv = substr(hash('sha256', $this->_secretIv), 0, 16);
    }
    
    /**
     * Encrypt
     *
     * @param string $textToEncrypt text to encrypt
     * 
     * @return string encrypted text
     */
    function encrypt($textToEncrypt)
    {
        return base64_encode(openssl_encrypt($textToEncrypt, "AES-256-CBC", $this->_key, 0, $this->_iv));
    }
    
    /**
     * Decrypt
     *
     * @param string $hashToDecrypt hash to decrypt 
     * 
     * @return string decrypted text
     */
    function decrypt($hashToDecrypt)
    {
        return openssl_decrypt(base64_decode($hashToDecrypt), "AES-256-CBC", $this->_key, 0, $this->_iv);

    }
}