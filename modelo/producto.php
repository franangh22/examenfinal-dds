<?php
class Producto
{
    public $Marca;
    public $Descripcion;
    public $Codigo;
    public static function BuscarTodas()
    {
        $con  = Database::getInstance();
        $sql = "select * from producto";
        $queryClaseAReemplazar = $con->db->prepare($sql);
        $queryClaseAReemplazar->execute();
        $queryClaseAReemplazar->setFetchMode(PDO::FETCH_CLASS, 'Producto');

        $claseAReemplazarADevolver = array();

        foreach ($queryClaseAReemplazar as $m) {
            $claseAReemplazarADevolver[] = $m;
        }

        return $claseAReemplazarADevolver;
    }

    public function Agregar()
    {
        $con  = Database::getInstance();
        $sql = "insert into producto (Marca,Descripcion,Codigo) values (:p3,:p1,:p2)";
        $claseAReemplazar = $con->db->prepare($sql);
        $params = array("p3" => $this->Marca, "p1" => $this->Descripcion, "p2" => $this->Codigo);
        $claseAReemplazar->execute($params);
    }
}
