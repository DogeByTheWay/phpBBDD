<?php
namespace App\services;
use App\DTO\impl\MovieDTO;
 
interface IMoviesService {
    public function all(): array;
    public function find($id): MovieDTO;
}