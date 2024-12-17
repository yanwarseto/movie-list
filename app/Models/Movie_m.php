<?php

namespace App\Models;

use CodeIgniter\Model;

class Movie_m extends Model
{
    protected $api_key = '6bfaa39b0a3a25275c765dcaddc7dae7'; // API key
    protected $api_url = 'https://api.themoviedb.org/3'; // Base URL API
    protected $img_path = 'https://image.tmdb.org/t/p/w1280'; // Image Path

    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        date_default_timezone_set('Asia/Bangkok');
    }

    public function getMovies($page = 1)
    {
        $url = $this->api_url . "/discover/movie?sort_by=popularity.desc&api_key={$this->api_key}&page={$page}";
        $response = $this->fetchData($url);

        return $response ? $response['results'] : [];
    }

    public function searchMovies($query)
    {
        $query = urlencode($query);

        $url = $this->api_url . "/search/movie?api_key={$this->api_key}&query={$query}";
        $response = $this->fetchData($url);

        return $response ? $response['results'] : [];
    }


    public function getDetails($id)
    {
        $url = $this->api_url . "/movie/{$id}?api_key={$this->api_key}";
        $response = $this->fetchData($url);

        if ($response) {
            return $response;
        } else {
            return [];
        }
    }

    private function fetchData($url)
    {
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', $url);

        if ($response->getStatusCode() === 200) {
            return json_decode($response->getBody(), true);
        }

        return null;
    }

    public function getDetailDb($id)
    {
        $builder = $this->db->table('MOVIE.DETAIL_MOV');
        $builder->select('OVERVIEW');
        $builder->where('ID', $id);
        $query = $builder->get();
        $result = $query->getRowArray();
        return $result ? $result['OVERVIEW'] : null;
    }

    public function saveOverview($movieId, $overview)
    {
        $builder = $this->db->table('MOVIE.DETAIL_MOV');

        $data = [
            'ID' => $movieId,
            'OVERVIEW' => $overview
        ];

        $builder->insert($data);
        return true;
    }

    public function updateOverview($movieId, $overview)
    {
        $builder = $this->db->table('MOVIE.DETAIL_MOV');

        $data = [
            'OVERVIEW' => $overview
        ];

        $builder->where('ID', $movieId);
        $builder->update($data);
        return true;
    }
}