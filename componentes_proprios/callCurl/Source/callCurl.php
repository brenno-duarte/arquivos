<?php

#namespace Source\callCurl;

class callCurl {

	private $url;
	private $token;

	public function __construct(string $url, string $token = null)
	{
		$this->url = $url;
		$this->token = $token;
	}

	public function get(bool $decode = false)
	{
		$header = [
			'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer '. $this->token
        ];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		$res = curl_exec($ch);
		curl_close($ch);
		$decoded = json_decode($res, true);

		if ($res === false) {
			echo curl_error($ch);
			die();
		}

		if ($decode == true) {
			return $decoded;
		} else {
			return $res;
		}
	}

	public function post(array $data)
	{
		$header = [
            'Content-Type: application/json',
            'Accept: application/json',
			'Authorization: Bearer '. $this->token,
		];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$res = curl_exec($ch);
		curl_close($ch);

		if ($res === false) {
			echo curl_error($ch);
			die();
		}

		return $res;
	}

	public function put(array $data)
	{
		$header = [
            'Content-Type: application/json',
            'Accept: application/json',
			'Authorization: Bearer '. $this->token
        ];
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$res = curl_exec($ch);
		curl_close($ch);

		if ($res === false) {
			echo curl_error($ch);
			die();
		}

		return $res;
	}

	public function delete(string $accept = "application/json", string $contentType = "application/json")
	{
		$header = [
			'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer '. $this->token
        ];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		$res = curl_exec($ch);
		curl_close($ch);

		if ($res === false) {
			echo curl_error($ch);
			die();
		}

		return $res;
	}
}