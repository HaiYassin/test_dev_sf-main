<?php


namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

/**
 * Class CurlServiceHelper
 */
class CurlHelper
{
    /**
     * @var ParameterBagInterface
     */
    private ParameterBagInterface $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function getDataCurlSession(array $options)
    {
        $curl = curl_init();

        curl_setopt_array($curl, $options);

        $data = curl_exec($curl);

        if (!$data){
            $error = curl_error($curl);
            curl_close($curl);
            throw new \Exception($error);
        }

        curl_close($curl);

        return $data;
    }

    public function getOptions()
    {
        $cUrl = $this->params->get('cURL_url');

        return [
            CURLOPT_URL => $cUrl,
            CURLOPT_RETURNTRANSFER => true
        ];
    }

    public function getSimpleXMLElement(string $data)
    {
        return simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);
    }
}