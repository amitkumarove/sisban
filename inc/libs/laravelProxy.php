<?php

class LaravelProxy
{

    /**
     * Function __construct
     *
     * @param string $_API_URL laravel proxy api url
     *
     * @return void
     */
    function __construct(
        $_API_URL
    ) {
        $this->_API_URL = $_API_URL;
    }

    private $_API_URL = '';

    /**
     * Get a user from api by auth_id
     *
     * @param int $uid unique user id
     *
     * @return void
     */
    public function getUserByAuthID($uid)
    {
        $url = $this->_API_URL . "/user/authid/$uid";
        $apiResponse =  $this->_makeRequest(
            $url,
            null,
            false
        );

        return json_decode($apiResponse);
    }

    /**
     * Creates a profile in the api db - createUser
     *
     * @param array $data uid and profile type is required
     *
     * @return json
     */
    public function createUser($data)
    {
        $url = $this->_API_URL . "/user/create";
        return $this->_makeRequest(
            $url,
            json_encode($data),
            true
        );
    }

    /**
     * Get yext reviews for services
     *
     * @param array $data uid and profile type is required
     *
     * @return json
     */
    public function getYextReviews($locationId)
    {
        $url = $this->_API_URL . "/location/reviews/$locationId";
        return $this->_makeRequest(
            $url,
            null,
            false
        );
    }

    /**
     * Gets secret key required for validating all requests
     *
     * @param array $data client_id
     * 
     * @return json
     */
    public function getSecret($data)
    {
        $url = $this->_API_URL . "/settings/get/secret";
        return $this->_makeRequest(
            $url, 
            json_encode($data),
            true
        );
    }

    /**
     * Creates a profile in the api db - createUser
     *
     * @param array $data uid and profile type is required
     *
     * @return json
     */
    public function updateUser($data)
    {
        $url = $this->_API_URL . "/user/update";
        return $this->_makeRequest(
            $url,
            json_encode($data),
            true
        );
    }

    /**
     * Removes a service from user saved services
     *
     * @param string $service_id service id
     * @param string $auth_id    user auth id
     * @param string $email      user email to link to hubspot
     *
     * @return json
     */
    public function removeService($service_id, $auth_id, $email)
    {
        $url = $this->_API_URL . "/user/remove/service";

        $data = array(
            "auth_id" => $auth_id,
            "service_id" => $service_id,
            "email" => $email
        );

        return $this->_makeRequest(
            $url,
            json_encode($data),
            true
        );
    }

    /**
     * Adds a service to user saved services
     *
     * @param string $service_id service id
     * @param string $auth_id    user auth id
     * @param string $email      user email to link to hubspot
     *
     * @return json
     */
    public function addService($service_id, $auth_id, $email)
    {
        $data = array(
            "auth_id" => $auth_id,
            "service_id" => $service_id,
            "email" => $email
        );

        $url = $this->_API_URL . "/user/add/service";
        return $this->_makeRequest(
            $url,
            json_encode($data),
            true
        );
    }


    /**
     * Creates a profile in the api db - createUser
     *
     * @param string $url        endpoin url
     * @param json   $postFields json array
     * @param bool   $isPost     if its post
     *
     * @return void
     */
    private function _makeRequest($url, $postFields, $isPost = false)
    {
        $curl = curl_init();

        $CURLOPT = array (
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
        );

        if ($isPost) {
            $CURLOPT[CURLOPT_POSTFIELDS] = $postFields;
            $CURLOPT[CURLOPT_CUSTOMREQUEST] = "POST";
            $CURLOPT[CURLOPT_HTTPHEADER] = [
                'Content-Type:application/json'
            ];
        }

        // Make our curl call to the endpooint
        curl_setopt_array($curl, $CURLOPT);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // Check for curl error
        if ($err) {
            $errorMessage = [
              'data' => $err,
              'status' => 'error',
            ];

            return json_encode($errorMessage);
        }

        // Check for Api Error
        $temp = (array) json_decode($response);
        if (isset($temp['error'])) {
            $errorMessage = [
              'data' => $temp['error_description'],
              'status' => 'error',
            ];

            return json_encode($errorMessage);
        }

        // Valid rsponse
        return $response;

    }

    /**
     * Get the
     *
     * @param $connection_provider_ids ['ecotricity' => 123, 'tesla' => 123, 'nomad' => 123]
     *
     * @return mixed
     */
    public function getLocationEvChargingData($connection_provider_ids)
    {
        $provider_id_query = '';
        foreach ($connection_provider_ids as $connection_provider_name => $connection_provider_id) {
            if($connection_provider_id) {
                $provider_id_query .= sprintf('%sid=%s&', $connection_provider_name, $connection_provider_id);
            }
        }
        $provider_id_query = rtrim($provider_id_query, '&');
        $url = $this->_API_URL . "/charging/chargepoints?{$provider_id_query}";
        $apiResponse =  $this->_makeRequest(
            $url,
            null,
            false
        );

        return json_decode($apiResponse);
    }
}
