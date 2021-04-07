<?php

    class ConexionEquipos
    {
        private $conexion;

        public function abir()
        {
            try 
            {
                $this->conexion = new PDO("mysql:host=localhost;dbname=torneo", "root", "");
                $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return "1";
            } 
            
            catch (PDOException $e) 
            {
                return $e->getMessage();
            }
        }

        public function cerrar()
        {
            $this->conexion = null;
        }

        public function insertarEquipo(Equipo $equipo)
        {
            $consulta = $this->conexion->prepare("INSERT INTO equipos VALUES(null, ?, ?, ?)");

            $consulta->bindParam(1, $equipo->nombre);
            $consulta->bindParam(2, $equipo->dt);
            $consulta->bindParam(3, $equipo->municipio);
            $consulta->execute();

            return $consulta->rowCount();
        }

        public function obtenerEquipoNombre($nombre)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM equipos WHERE nombre=?");
            $consulta->bindParam(1, $nombre);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function obtenerEquipos()
        {
            $consulta = $this->conexion->prepare("SELECT equipos. *, municipios.nombre as municipio_nombre FROM equipos INNER JOIN municipios ON equipos.municipio = municipios.id ORDER BY nombre");
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        // public function obtenerMunicipioNombre($nombre)
        // {
        //     $consulta = $this->conexion->prepare("SELECT * FROM municipios WHERE nombre=?");
        //     $consulta->bindParam(1, $nombre);
        //     $consulta->setFetchMode(PDO::FETCH_OBJ);
        //     $consulta->execute();
        //     return $consulta->fetchAll();
        // }

        public function obtenerEquipoId($id)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM equipos WHERE id=?");
            $consulta->bindParam(1, $id);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function actualizarEquipo(Equipo $equipo)
        {
            $consulta = $this->conexion->prepare("UPDATE equipos SET nombre=?, dt=?, municipio=? WHERE id=?");

            $consulta->bindParam(1, $equipo->nombre);
            $consulta->bindParam(2, $equipo->dt);
            $consulta->bindParam(3, $equipo->municipio);
            $consulta->bindParam(4, $equipo->id);
            $consulta->execute();

            return $consulta->rowCount();
        }

        public function eliminarEquipo($id)
        {
            $consulta = $this->conexion->prepare("DELETE FROM equipos WHERE id=?");

            $consulta->bindParam(1, $id);
            $consulta->execute();

            return $consulta->rowCount();
        }

    }

?>