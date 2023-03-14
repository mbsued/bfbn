<?php
declare(strict_types=1);

namespace OliverBauer\Bfbn\Service;

/**
 * This file is part of the "bfbn" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;


class GeocodeService implements SingletonInterface
{

    /** @var string  */
    protected $geocodingUrl = 'https://nominatim.openstreetmap.org/search?q=';

    /**
     * core functionality: asks nominatim for the coordinates of an address
     *
     * @param string $street
     * @param string $zip
     * @param string $city
     * @param string $country
     * @return array an array with latitude and longitude
     */
    public function getCoordinatesForAddress($plz = null, $country = 'DE'): array
    {

        $address = $country.'+'.$plz;
        if (empty($address)) {
            return [];
        }

        $result = $this->getApiCallResult(
            $this->geocodingUrl . $address .'&format=geojson'			
        );		
		
        if (empty($result) || empty($result['features']) || empty($result['features'][0]['geometry'])) {
            return [];
        }
        $geometry = $result['features'][0]['geometry'];
        $result = [
            'latitude' => $geometry['coordinates']['1'],
            'longitude' => $geometry['coordinates']['0'],
        ];

        return $result;
    }

    /**
     * @param string $url
     * @return array
     */
    protected function getApiCallResult(string $url): array
    {
        $response = GeneralUtility::getUrl($url);
 		
        $result = json_decode($response, true);
        if ($result['status'] !== 'OVER_QUERY_LIMIT') {
            return $result;
        }
        return [];
    }
}
