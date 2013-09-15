<?php

namespace CodeOasis\CurlBundle\Base;

/**
 * Defines a Curl POST request
 *
 * @author Ronen Amiel <ronena@codeoasis.com>
 */
class CurlPostRequest extends cUrlRequest
{
    /**
     * @param mixed $ch
     *
     * @return mixed
     */
    protected function doExecute($ch)
    {
        // set request options
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->params);

//        curl_setopt($ch, CURLOPT_HEADER, true); // to include the header in the output.
//        curl_setopt($ch, CURLOPT_FILETIME, true);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        curl_setopt($ch, CURLOPT_FORBID_REUSE, true); //TRUE to force the connection to explicitly close when it has finished processing, and not be pooled for reuse.



        // return the handler
        return $ch;
    }

}
