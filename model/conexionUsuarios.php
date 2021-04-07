<?php

    class ConexionUsuarios
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

        public function insertarUsuario(Usuario $usuario)
        {
            $consulta = $this->conexion->prepare("INSERT INTO login VALUES(null, ?, md5(?))");

            $consulta->bindParam(1, $usuario->usuario);
            $consulta->bindParam(2, $usuario->password);
            $consulta->execute();

            return $consulta->rowCount();
        }

        // public function obtenerMunicipios()
        // {
        //     $consulta = $this->conexion->prepare("SELECT * FROM municipios ORDER BY nombre");
        //     $consulta->setFetchMode(PDO::FETCH_OBJ);
        //     $consulta->execute();
        //     return $consulta->fetchAll();
        // }

        public function obtenerUsuarioUsuario($usuario)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM login WHERE usuario=?");
            $consulta->bindParam(1, $usuario);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function obtenerUsuarioUsuarioPassword($usuario)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM login WHERE usuario=? AND password = md5(?)");
            $consulta->bindParam(1, $usuario->usuario);
            $consulta->bindParam(2, $usuario->password);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        // public function obtenerMunicipioId($id)
        // {
        //     $consulta = $this->conexion->prepare("SELECT * FROM municipios WHERE id=?");
        //     $consulta->bindParam(1, $id);
        //     $consulta->setFetchMode(PDO::FETCH_OBJ);
        //     $consulta->execute();
        //     return $consulta->fetchAll();
        // }

        // public function actualizarMunicipio(Municipio $municipio)
        // {
        //     $consulta = $this->conexion->prepare("UPDATE municipios SET nombre=? WHERE id=?");

        //     $consulta->bindParam(1, $municipio->nombre);
        //     $consulta->bindParam(2, $municipio->id);
        //     $consulta->execute();

        //     return $consulta->rowCount();
        // }

        // public function eliminarMunicipio($id)
        // {
        //     $consulta = $this->conexion->prepare("DELETE FROM municipios WHERE id=?");

        //     $consulta->bindParam(1, $id);
        //     $consulta->execute();

        //     return $consulta->rowCount();
        // }

    }

?>