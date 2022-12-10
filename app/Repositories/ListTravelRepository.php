<?php

namespace App\Repositories;


interface ListTravelRepository {
    function create($detail);
    function getByUserId($userId);
}