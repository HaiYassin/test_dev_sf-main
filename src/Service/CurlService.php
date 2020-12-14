<?php


namespace App\Service;


class CurlService
{
    /**
     * @var CurlHelper
     */
    private CurlHelper $curlHelper;

    public function __construct(CurlHelper $curlHelper)
    {
        $this->curlHelper = $curlHelper;
    }

    public function start()
    {
        $options = $this->curlHelper->getOptions();
        $data = $this->curlHelper->getDataCurlSession($options);
        $xml = $this->curlHelper->getSimpleXMLElement($data);
    }
}