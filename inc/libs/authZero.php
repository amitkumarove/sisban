<?php

class AuthZero
{
    
    /**
     * Function __construct
     *
     * @param string $AUTH0_CLIENT_ID     auth0 client id
     * @param string $AUTH0_CLIENT_SECRET auth0 client secret
     * @param string $AUTH0_DOMAIN        auth0 authorised domain
     * 
     * @return void
     */    
    function __construct(
        $AUTH0_CLIENT_ID, 
        $AUTH0_CLIENT_SECRET,
        $AUTH0_DOMAIN,
        $AUTH0_MANAGEMENT_API_URL
    ) {
        $this->_AUTH0_CLIENT_ID = $AUTH0_CLIENT_ID;
        $this->_AUTH0_CLIENT_SECRET = $AUTH0_CLIENT_SECRET;
        $this->_AUTH0_DOMAIN = $AUTH0_DOMAIN;
        $this->_AUTH0_MANAGEMENT_API_URL = $AUTH0_MANAGEMENT_API_URL;
    }

    // Auth required fields
    private $_AUTH0_CLIENT_ID = '';
    private $_AUTH0_CLIENT_SECRET = '';
    private $_AUTH0_DOMAIN = '';
    private $_AUTH0_MANAGEMENT_API_URL = '';

        
    /**
     * Checks if user registered with email and password
     *
     * @param mixed $authID auth0 uid
     * 
     * @return bool
     */
    public static function userRegisteredWithPassword($authUser)
    {
        // auth0 id starting with auth0 means its a credential login, instead of a scoial login
        return substr($authUser->sub, 0, 5) === 'auth0';
    }

    /**
     * Set user cookie upon successfull login
     *
     * @param array $data       data to be stored in the cookie
     * @param mixed $expires_in cookie expiration
     * 
     * @return void
     */
    public function setUserAuthCookieOnSuccess(array $data, int $expires_in) 
    {
        setcookie(
            'auth_user',
            json_encode($data), 
            time()+$expires_in,
            COOKIEPATH,
            COOKIE_DOMAIN
        );
    }

    /**
     * Delete user cookie
     *
     * @return void
     */
    public function deleteCookie()
    {
        setcookie(
            'auth_user', 
            null, 
            -1, 
            COOKIEPATH,
            COOKIE_DOMAIN
        );

        return;

    }
    
    /**
     * Get social login url from auth0
     *
     * @param string $socialPlatform social provide identity string registered 
     *                               on oauth
     * 
     * @return string
     */
    public function getSocialUrl($socialPlatform)
    {
        $params = "response_type=code";
        $params .= "&client_id=" . $this->_AUTH0_CLIENT_ID;
        $params .= "&client_secret=" . $this->_AUTH0_CLIENT_SECRET;
        $params .= "&connection=$socialPlatform";
        $params .= "&scope=openid email profile";
        $params .= "&redirect_uri=" . get_site_url() . "/index.php";

        $url = "https://" . $this->_AUTH0_DOMAIN . "/authorize?" . $params;

        return $url;
    }

    public function getSocialUrlMobile($socialPlatform)
    {
        $params = "response_type=code";
        $params .= "&client_id=" . $this->_AUTH0_CLIENT_ID;
        $params .= "&client_secret=" . $this->_AUTH0_CLIENT_SECRET;
        $params .= "&connection=$socialPlatform";
        $params .= "&scope=openid email profile";
        $params .= "&redirect_uri=http://localhost/social-login-callback";

        $url = "https://" . $this->_AUTH0_DOMAIN . "/authorize?" . $params;

        return $url;
    }

    /**
     * Make a authorisation request on auth0
     *
     * @param string $code authorisation code
     * 
     * @return string json resposnse
     */
    public function getSocialUserToken(string $code) : string
    {
        $postFields = "grant_type=authorization_code";
        $postFields .= "&client_id=" . $this->_AUTH0_CLIENT_ID;
        $postFields .= "&client_secret=" . $this->_AUTH0_CLIENT_SECRET;
        $postFields .= "&code=" . $code;
        $postFields .= "&redirect_uri=" . get_site_url() . "/index.php";
        
        $headers = array (
            "content-type: application/x-www-form-urlencoded"
        );

        $endPointUrl = "https://" . $this->_AUTH0_DOMAIN . "/oauth/token";

        return $this->_makeRequest($postFields, $headers, $endPointUrl, "POST");


    }

    /**
     * Make a authorisation request on auth0 for the logged in user
     *
     * @param string $accessToken authorisation code
     * 
     * @return string json resposnse
     */
    public function getUser(string $accessToken) 
    {
        $headers = array (
            "Accept: application/json",
            "Authorization: Bearer $accessToken",
        );

        $endPointUrl = "https://forepoint.eu.auth0.com/userinfo";

        return $this->_makeRequest($postFields = '', $headers, $endPointUrl, "POST");
    }

    
    /**
     * Make a login request on auth0
     *
     * @param string $email    username on auth0 api
     * @param string $password password for the username
     * 
     * @return string json resposnse
     */
    public function getLoginToken(string $email, string $password) : string
    {
       
        $postFields = "grant_type=password";
        $postFields .= "&username=" . $email;
        $postFields .= "&password=" . $password;
        $postFields .= "&client_id=" . $this->_AUTH0_CLIENT_ID;
        $postFields .= "&client_secret=" . $this->_AUTH0_CLIENT_SECRET;

        $headers = array (
            "content-type: application/x-www-form-urlencoded"
        );

        $endPointUrl = "https://" . $this->_AUTH0_DOMAIN . "/oauth/token";


        return $this->_makeRequest($postFields, $headers, $endPointUrl, "POST");

    }
    
    /**
     * Get management API Token
     *
     * @return void
     */
    private function _getManagmentApiToken() 
    {
        $postFields = "grant_type=client_credentials";
        $postFields .= "&client_id=" . $this->_AUTH0_CLIENT_ID;
        $postFields .= "&client_secret=" . $this->_AUTH0_CLIENT_SECRET;
        $postFields .= "&audience=https://" . $this->_AUTH0_DOMAIN . "/api/v2/";

        $headers = array (
            "content-type: application/x-www-form-urlencoded"
        );

        $endPointUrl = "https://" . $this->_AUTH0_DOMAIN . "/oauth/token";

        return $this->_makeRequest($postFields, $headers, $endPointUrl, "POST");
    }

    /**
     * Update user email
     *
     * @param string $authID user auth0 id
     * @param string $email  username/ email
     * 
     * @return string
     */
    public function updateEmail(string $authID, string $email) : string 
    {

        // Get our management API Token first
        $apiTokenResponse = json_decode($this->_getManagmentApiToken());

        if (isset($apiTokenResponse->access_token)) :

            // We got our management token, we can update user email now
            $token = $apiTokenResponse->access_token;

            $updateData = array(
                'email' => $email,
            );
  
            $headers = array (
                "authorization: Bearer " . $token,
                "content-type: application/json"
            );

            $endPointUrl = $this->_AUTH0_MANAGEMENT_API_URL . "users/" . urlencode($authID);

            $updatedResponse = $this->_makeRequest(
                json_encode($updateData), 
                $headers, 
                $endPointUrl,
                "PATCH"
            );

            // Send email verification
            $emailNotificationResponse = $this->_sendVerificationEmail($token, $authID);
            
            return $updatedResponse;

        else:
            // Cancel regsitration as there was an error
            return $apiTokenResponse;
        endif;
    }

    /**
     * Update user password
     *
     * @param string $authID   user auth0 id
     * @param string $password password
     * 
     * @return string
     */
    public function updatePassword(string $authID, string $password) : string 
    {

        // Get our management API Token first
        $apiTokenResponse = json_decode($this->_getManagmentApiToken());

        if (isset($apiTokenResponse->access_token)) :

            // We got our management token, we can update user email now
            $token = $apiTokenResponse->access_token;

            $updateData = array(
                'password' => $password,
            );
  
            $headers = array (
                "authorization: Bearer " . $token,
                "content-type: application/json"
            );

            $endPointUrl = $this->_AUTH0_MANAGEMENT_API_URL . "users/" . urlencode($authID);

            $updatedResponse = $this->_makeRequest(
                json_encode($updateData), 
                $headers, 
                $endPointUrl,
                "PATCH"
            );
            
            return $updatedResponse;

        else:
            // Cancel regsitration as there was an error
            return $apiTokenResponse;
        endif;
    }

    private function _sendVerificationEmail($token, $authID)
    {
        $forUser = array(
            'user_id' => $authID,
        );

        $headers = array (
            "authorization: Bearer " . $token,
            "content-type: application/json"
        );

        $endPointUrl = $this->_AUTH0_MANAGEMENT_API_URL . "jobs/verification-email";

        return $this->_makeRequest(
            json_encode($forUser), 
            $headers, 
            $endPointUrl,
            "POST"
        );

    }

    
    /**
     * Send password reset email for mobile
     *
     * @param string $email email for which to reset password for
     * 
     * @return json
     */
    public function sendPasswordResetEmail($email)
    {
        $forUser = array(
            'email' => $email,
            'client_id' =>  $this->_AUTH0_CLIENT_ID,
            'connection' => 'Username-Password-Authentication',
        );

        $headers = array (
            "content-type: application/json"
        );

        $endPointUrl = "https://" . $this->_AUTH0_DOMAIN . "/dbconnections/change_password";
        
        $response = $this->_makeRequest(
            json_encode($forUser), 
            $headers, 
            $endPointUrl,
            "POST"
        );
        
        return $response;
    }

    public function getUserByEmail($email)
    {
        // Get our management API Token first
        $apiTokenResponse = json_decode($this->_getManagmentApiToken());

        $headers = array (
            "authorization: Bearer " . $apiTokenResponse->access_token,
        );

        $endPointUrl = $this->_AUTH0_MANAGEMENT_API_URL . "users-by-email?email=$email";

        return $this->_makeRequest(
            null, 
            $headers, 
            $endPointUrl,
            "GET"
        );

    }

    /**
     * Register user
     *
     * @param string $email    username/ email
     * @param string $password user password for regsitration
     * @param string $name     selected profile for user
     * 
     * @return string
     */
    public function doRegister(string $email, string $password, string $name) : string 
    {

        // Get our management API Token first
        $apiTokenResponse = json_decode($this->_getManagmentApiToken());

        if (isset($apiTokenResponse->access_token)) :

            // We got our management token, we can create new user now
            $token = $apiTokenResponse->access_token;

            $nameArray = explode(' ', $name);

            $newUser = array(
                'email' => $email,
                'password' => $password,
                'connection' => 'Username-Password-Authentication',
                'name' => $name,
                'given_name' => $nameArray[0],
                'family_name' => $nameArray[1] ?? $nameArray[0],
            );

            $headers = array (
                "authorization: Bearer " . $token,
                "Content-Type: application/json"
            );

            $endPointUrl = $this->_AUTH0_MANAGEMENT_API_URL . 'users';

            $createdResponse = $this->_makeRequest(
                json_encode($newUser), 
                $headers, 
                $endPointUrl,
                "POST"
            );

            return $createdResponse;
        else:
            // Cancel regsitration as there was an error
            return $apiTokenResponse;
        endif;
    }
    
        
    /**
     * Make curl request for the passed Endpoint
     *
     * @return string
     */
    private function _makeRequest(
        $postFields, 
        array $CURLOPT_HTTPHEADER,
        string $ENDPOINT,
        string $RequestType
    ) : string {
        $curl = curl_init();


        $CURLOPT = array (
            CURLOPT_URL => $ENDPOINT,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $RequestType,
            CURLOPT_HTTPHEADER => $CURLOPT_HTTPHEADER,
            CURLOPT_POSTFIELDS  => $postFields,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
        );


        // Make our curl call to the endpooint
        curl_setopt_array($curl, $CURLOPT);
      
        $response = curl_exec($curl);
        $err = curl_error($curl);
      
        curl_close($curl);
      
        // Check for curl error 
        if ($err) {
            $errorMessage = [
              'data' => 'curl connection error',
              'status' => 'error',
            ];
            
            return json_encode($errorMessage);
        }
        
        // Check for Api Error 
        $tempErrorCheck = (array) json_decode($response);
        if (isset($tempErrorCheck['error'])) {
            $errorText = '';
            $errorText .= isset($tempErrorCheck['error_description']) ? $tempErrorCheck['error_description'] : '';
            $errorText .= isset($tempErrorCheck['message']) ? $tempErrorCheck['message'] : '';

            $errorMessage = [
              'data' => $errorText,
              'status' => 'error',
            ];
            
            return json_encode($errorMessage, JSON_UNESCAPED_SLASHES);
        }

        // JSON valid rsponse
        return $response;
    
    }
}