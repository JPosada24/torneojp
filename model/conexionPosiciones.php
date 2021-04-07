<?php

    class ConexionPosiciones
    {
        protected $conexion;

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

        public function insertarPosicion(Posicion $posicion)
        {
            $consulta = $this->conexion->prepare("INSERT INTO posiciones VALUES(null, ?)");

            $consulta->bindParam(1, $posicion->nombre);
            $consulta->execute();

            return $consulta->rowCount();
        }

        public function obtenerPosiciones()
        {
            $consulta = $this->conexion->prepare("SELECT * FROM posiciones");
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function obtenerPosicionNombre($posicion)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM posiciones WHERE nombre=?");
            $consulta->bindParam(1, $posicion);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function obtenerPosicionId($id)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM posiciones WHERE id=?");
            $consulta->bindParam(1, $id);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function actualizarPosicion(Posicion $posicion)
        {
            $consulta = $this->conexion->prepare("UPDATE posiciones SET nombre=? WHERE id=?");

            $consulta->bindParam(1, $posicion->nombre);
            $consulta->bindParam(2, $posicion->id);
            $consulta->execute();

            return $consulta->rowCount();
        }

        public function eliminarPosicion($id)
        {
            $consulta = $this->conexion->prepare("DELETE FROM posiciones WHERE id=?");

            $consulta->bindParam(1, $id);
            $consulta->execute();

            return $consulta->rowCount();
        }

    }

?>