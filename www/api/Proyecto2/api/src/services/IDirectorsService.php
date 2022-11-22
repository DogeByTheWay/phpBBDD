<?php
namespace App\services;
use App\DTO\impl\DirectorDTO;
 
interface IDirectorsService {
    public function all(): array;
    public function find($id): DirectorDTO;
}