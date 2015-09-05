<?php

class lawshost {

    function check_availability ($domain, $tld) {
        $arguments = array(
            'service'            => 'whois',
            'domain-name'        => $domain,
            'tld'                => $tld
        );

        $result = $this->_makeGetRequest('/domains', $arguments);
        return $result;
    }

    function get_tlds () {
        $arguments = array(
            'service'             => 'gettlds'
        );
        $result = $this->_makeGetRequest('/domains', $arguments);
        return $result;
    }

    function _makeGetRequest($servlet, $arguments)
    {
        return $this->_makeRequest($servlet, $arguments, false);
    }

    function _makeRequest($servlet, $arguments, $isPost = false)
    {

        $arguments['apikey'] = "<ENTER YOUR API KEY>";
        $request = 'https://api.laws-hosting.co.uk';
        $request .= $servlet . '.php';

        $data = '';
        foreach ($arguments as $name => $value) {
            $name = urlencode($name);
            if (is_array($value)) {
                // Need to handle arrays
                foreach ($value as $multivalue) {
                    if ($multivalue === true) $multivalue = 'true';
                    else if ($multivalue === false) $multivalue = 'false';
                    $data .= $name . '=' . urlencode($multivalue) . '&';
                }
            } else {
                if ($value === true) $value = 'true';
                else if ($value === false) $value = 'false';
                $data .= $name . '=' . urlencode($value) . '&';
            }
        }

        $request .= '?' . $data;

    		$requestType = 'GET';
        $response = $this->_curl($request, $requestType);
        return json_decode($response);
    }

   function _curl ($request, $requestType) {

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $request);
      curl_setopt($ch, CURLOPT_HTTPGET, true);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      // important to supply an user agent as I block empty ones
      $agent = 'Mozilla/5.0 (compatible; https://www.laws-hosting.co.uk)';
      curl_setopt($ch, CURLOPT_USERAGENT, $agent);
      $contents = curl_exec ($ch);
      curl_close ($ch);
      return $contents;
   }

}


?>
