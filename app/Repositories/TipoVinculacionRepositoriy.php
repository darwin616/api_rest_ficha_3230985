<?php 

namespace App\Repositories;

use App\Models\Rol;

class TipoVinculacionRepository extends BaseRepository implements RolInterfaces

{

public function findByName(string $nombre)
{
    return $this->model
        ->where("nombre", "LIKE", "%" . $nombre . "%")->get();
        
}
}
