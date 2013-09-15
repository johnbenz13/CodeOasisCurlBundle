<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ronena
 * Date: 8/26/12
 * Time: 9:01 AM
 * To change this template use File | Settings | File Templates.
 */

namespace cUrl\HttpBundle\Exceptions;

/**
 * Simple exception class, takes a cUrl handler as a parameter
 * @author ronena
 */
abstract class cUrlException extends \Exception
{
    /**
     * constructor, takes a cUrl handler as a parameter
     * @param mixed $ch
     */
    public function __construct($ch)
    {
        parent::__construct(curl_error($ch));
    }
}