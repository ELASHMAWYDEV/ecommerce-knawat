<?php
namespace App\Util;

use GuzzleHttp\Client;

class Post
{
	protected $client;

	public function __construct(Client $client)
	{
		$this->client = $client;
	}

	public function all()
	{
		return $this->endpointRequest('/dummy/posts');
	}

	public function findById($id)
	{
		return $this->endpointRequest('/dummy/post/'.$id);
	}

	public function endpointRequest($url)
	{
		try {
			$response = $this->client->request('GET', $url);
		} catch (\Exception $e) {
            return [];
		}

		return $this->response_handler($response->getBody()->getContents());
	}

	public function response_handler($response)
	{
		if ($response) {
			return json_decode($response);
		}
		
		return [];
	}
}