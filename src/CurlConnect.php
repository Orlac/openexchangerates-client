<?php

namespace orlac\openexchangerates;


/**
 * 
 */
final class CurlConnect implements IConnect
{


    public function __construct(
        private string $appId,
        private string $baseUri,
    ) {
    }

    public function get(string $endpoint, array $params = []): array
    {
        $curl = curl_init();
        $params = array_merge([
            'app_id' => $this->appId
        ], $params);

        curl_setopt_array($curl, [
            CURLOPT_URL => $this->baseUri . $endpoint . '?' . http_build_query($params),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'accept: application/json'
            ],
        ]);

        $response = curl_exec($curl);
        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($code !== 200) {
            $err = curl_error($curl);
            throw new Exception($response ?? $err, $code);
        } else {
            return json_decode($response, true);
        }
    }
}
