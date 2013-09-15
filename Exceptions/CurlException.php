<?php

namespace CodeOasis\CurlBundle\Exceptions;

/**
 * Simple exception class, takes a Curl handler as a parameter
 *
 * @author Ronen Amiel <ronena@codeoasis.com>
 */
abstract class CurlException extends \Exception
{
    /**
     * Constructor, takes a cUrl handler as a parameter
     *
     * @param mixed $ch
     */
    public function __construct($ch)
    {
        parent::__construct(curl_error($ch));
    }
}
