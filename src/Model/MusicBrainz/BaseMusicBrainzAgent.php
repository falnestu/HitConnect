<?php
/**
 * Created by PhpStorm.
 * User: esaphp
 * Date: 19.11.17
 * Time: 15:26
 */




/*The web service root URL is https://musicbrainz.org/ws/2/.

We have 12 resources on our web service which represent core entities in our database:

 area, artist, event, instrument, label, place, recording, release, release-group, series, work, url

We also provide a web service interface for the following non-core resources:

 rating, tag, collection

And we allow you to perform lookups based on other unique identifiers with these resources:

 discid, isrc, iswc

On each entity resource, you can perform three different GET requests:

lookup:   /<ENTITY>/<MBID>?inc=<INC>
browse:   /<ENTITY>?<ENTITY>=<MBID>&limit=<LIMIT>&offset=<OFFSET>&inc=<INC>
search:   /<ENTITY>?query=<QUERY>&limit=<LIMIT>&offset=<OFFSET>

... except that search is not implemented for URL entities at this time.

Of these:

    Lookups, Non-MBID lookups and Browse requests are documented in following sections.

url : https://wiki.musicbrainz.org/Development/XML_Web_Service/Version_2
*/

namespace App\Model\MusicBrainz;

use Cake\Http\Client;
use InvalidArgumentException;

abstract class BaseMusicBrainzAgent
{
    private $format ='json';
    private $url = 'https://musicbrainz.org/ws/2/';

    private $options = [
        'headers' => [
            'User-Agent' => 'HitConnect/1.0.0 (bastleroy@gmail.com)'
        ]
    ];

    private $httpClient;

    protected $entity;

    public function __construct()
    {
        $this->httpClient = new Client();
    }

    public function search($query, $limit = null, $offset = null){
        $strQuery = $this->createQueryString($query);
        $data = $this->createData($strQuery, $limit, $offset);
        return $this->httpClient->get($this->url
                , $data
                , $this->options);

    }

    private function createQueryString($array){
        if(!is_array($array) || empty($array))
            throw new InvalidArgumentException();

        $query = '';
        foreach ($array as $key=>$value) {
            if(!empty($query))
                $query .= ' AND ';
            $query .= $key.':'.$value;
        }

        return $query;
}

    private function createData($strQuery, $limit, $offset)
    {
        $data = [
            'query' => $strQuery
        ];

        if (isset($limit))
            $data['limit'] = $limit;

        if (isset($offset))
            $data['offset'] = $offset;

        $data['fmt'] = $this->format;

        return $data;
    }


}