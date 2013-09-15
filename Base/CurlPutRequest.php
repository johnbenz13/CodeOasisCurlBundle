<?php

namespace CodeOasis\CurlBundle\Base;

/**
 * Defines a Curl PUT request that allows sending files with the request
 *
 * @author Ronen Amiel <ronena@codeoasis.com>
 */
class CurlPutRequest extends cUrlRequest
{
    /**
     * the name (full path) of the file to send
     * @var string
     */
    protected $file;

    /**
     * @param mixed $ch
     *
     * @return mixed
     */
    protected function doExecute($ch)
    {
        // set request options
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_PUT, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->params);

        // check if a file is present
        if ($this->file) {
            $file = fopen($this->file, "rb");
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 2);
            curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
            curl_setopt($ch, CURLOPT_INFILE, $file);
            curl_setopt($ch, CURLOPT_INFILESIZE, filesize($this->file));
            curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($this->headers, array('Expect:')));
        }

        // return the handler
        return $ch;
    }

    /**
     * @param string $file
     *
     * @return CurlPutRequest
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }
}
