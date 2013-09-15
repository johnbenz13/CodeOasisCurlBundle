<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ronena
 * Date: 8/26/12
 * Time: 9:02 AM
 * To change this template use File | Settings | File Templates.
 */

namespace cUrl\HttpBundle\Base;

/**
 * Defines a cUrl POST request
 *
 * @author ronena
 */
class cUrlPostRequest extends cUrlRequest
{
    /**
     * @param mixed $ch
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