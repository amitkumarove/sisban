<?php
class Hubspot
{
    // Settings
    private $_apiKey;
    private $_apiUrl;

    function __construct($apiKey, $apiUrl)
    {
        $this->_apiKey = $apiKey;
        $this->_apiUrl = $apiUrl;
    }
    
    /**
     * Gets hubspot user by email
     *
     * @param string $email user email
     * 
     * @return mixed
     */
    public function getUser($email)
    {
        $endpoint = $this->_apiUrl . 'contact/email/' . $email . '/profile?hapikey=' . $this->_apiKey;
        $user = $this->_makeRequest(null, $endpoint,  false);

        if (isset($user->status) && $user->status = 'error') :
            // User does not exits
            return false;
        endif;
        
        return $user;
    }
      
    /**
     * Updates hubspot user
     *
     * @param mixed $hubSpotUID     hubspot uid
     * @param array $updateUserData new data for user
     * 
     * @return json
     */
    public function updateUser($hubSpotUID, $updateUserData)
    {
        $endpoint = $this->_apiUrl . 'contact/vid/'.  $hubSpotUID . '/profile?hapikey=' . $this->_apiKey;
        
        return $this->_makeRequest(json_encode($updateUserData), $endpoint, true);
    }
    
    /**
     * Creates a hubspot user
     *
     * @param array $user new user data
     * 
     * @return string
     */
    public function createUser($user)
    {
        $newUser = array(
          'properties' => array(
              array(
                  'property' => 'email',
                  'value' => $user['email']
              ),
              array(
                  'property' => 'firstname',
                  'value' => $user['firstname']
              ),
              array(
                  'property' => 'lastname',
                  'value' => $user['lastname']
              ),
          )
        );

        $endpoint = $this->_apiUrl . 'contact?hapikey=' . $this->_apiKey;
        
        return $this->_makeRequest(json_encode($newUser), $endpoint, true);
    }

    
    /**
     * Makes curl request to the endpoint
     *
     * @param json  $data     json data to be posted
     * @param mixed $endpoint endpoint url
     * @param mixed $isPost   if its a post request
     * 
     * @return object
     */
    private function _makeRequest($data, $endpoint, $isPost = false)
    {
        $ch = curl_init();

        if ($isPost) :
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt(
                $ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json')
            );
        endif;

        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_errors = curl_error($ch);
        curl_close($ch);

        return json_decode($response);
    }
}