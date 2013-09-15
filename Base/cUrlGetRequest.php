<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ronena
 * Date: 8/26/12
 * Time: 9:01 AM
 * To change this template use File | Settings | File Templates.
 */

namespace cUrl\HttpBundle\Base;

/**
 * Defines a cUrl GET request
 *
 * @author ronena
 */
class cUrlGetRequest extends cUrlRequest
{
    /**
     * @param mixed $ch
     * @return mixed
     */
    protected function doExecute($ch)
    {
        // set request options
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FILETIME, true);
        curl_setopt($ch, CURLOPT_NOBODY, false);

        curl_setopt($ch, CURLOPT_URL, $this->buildQueryUrl($this->url, $this->params));

        // return the handler
        return $ch;
    }

    /**
     * @param string $url
     * @param array $params
     * @return string
     */
    protected function buildQueryUrl($url, Array $params = array())
    {
        // if no params are passed, return the url as is
        if (empty($params)) {
            return $url;
        }

        // holds '?' or '&', depending on which one is needed
        $separator = (parse_url($url, PHP_URL_QUERY) == null) ? '?' : '&';

        // build the query and appends it to the url
        $params = http_build_query($params);
        $url = $url . $separator . $params;

        // return the url
        return $url;
    }
}