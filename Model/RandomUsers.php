<?php
class RandomUsers {
  private $apiUrl = 'https://randomuser.me/api/';

  public function getUsers($count) {
    $url = $this->apiUrl . '?results=' . $count;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);

    // return json_decode($response, true); para pruebas
    return json_encode($response, true);
  }
}
?>