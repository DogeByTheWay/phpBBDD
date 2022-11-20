<?php

namespace App\DTO;
use App\DTO\impl\MovieDTO;

interface IDTOCheckFields{

    public static function checkFields(?int $id,array $data):MovieDTO;
}