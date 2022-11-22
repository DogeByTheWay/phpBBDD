<?php
namespace App\DAO;
use App\DTO\impl\DirectorDTO;
 
interface IDirectorsDAO {
 
    public function create(DirectorDTO $movie): bool;
    public function read(): array;
    public function findById(int $id): DirectorDTO;
    public function update(int $id, DirectorDTO $movie): bool;
    public function delete(int $id): bool;
}