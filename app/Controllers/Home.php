<?php

namespace App\Controllers;

use App\Models\Movie_m;
use Config\Database;

class Home extends BaseController
{
    public function __construct()
    {
        helper('movie');
        $this->movie_m = new Movie_m();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['movies'] = $this->movie_m->getMovies(1);
        return view('intro_v', $data);
    }

    public function search()
    {
        $searchTerm = $this->request->getVar('search');
        $searchTerm = urldecode($searchTerm);
        $data['movies'] = $this->movie_m->searchMovies($searchTerm);
        return view('intro_v', $data);
    }

    public function details($id)
    {
        $data['getDetails'] = $this->movie_m->getDetails($id);
        $data['getOverviewDb'] = $this->movie_m->getDetailDb($id);

        return view('details_v', $data);
    }

    public function update()
    {
        $movieId = $this->request->getPost('movie_id');
        $overview = $this->request->getPost('overview');

        $checkMovieDb = $this->movie_m->getDetailDb($movieId);
        if ($checkMovieDb == null) {
            $this->movie_m->saveOverview($movieId, $overview);
        } else {
            $this->movie_m->updateOverview($movieId, $overview);
        }

        return redirect()->to('details/' . $movieId);
    }
}