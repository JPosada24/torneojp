<?php

    class ConexionMunicipios
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

        public function insertarMunicipio(Municipio $municipio)
        {
            $consulta = $this->conexion->prepare("INSERT INTO municipios VALUES(null, ?)");

            $consulta->bindParam(1, $municipio->nombre);
            $consulta->execute();

            return $consulta->rowCount();
        }

        public function obtenerMunicipios()
        {
            $consulta = $this->conexion->prepare("SELECT * FROM municipios ORDER BY nombre");
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function obtenerMunicipioNombre($nombre)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM municipios WHERE nombre=?");
            $consulta->bindParam(1, $nombre);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function obtenerMunicipioId($id)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM municipios WHERE id=?");
            $consulta->bindParam(1, $id);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function actualizarMunicipio(Municipio $municipio)
        {
            $consulta = $this->conexion->prepare("UPDATE municipios SET nombre=? WHERE id=?");

            $consulta->bindParam(1, $municipio->nombre);
            $consulta->bindParam(2, $municipio->id);
            $consulta->execute();

            return $consulta->rowCount();
        }

        public function eliminarMunicipio($id)
        {
            $consulta = $this->conexion->prepare("DELETE FROM municipios WHERE id=?");

            $consulta->bindParam(1, $id);
            $consulta->execute();

            return $consulta->rowCount();
        }

    }

?>