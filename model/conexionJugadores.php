<?php

    class ConexionJugadores
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

        public function insertarJugador(Jugador $jugador)
        {
            $consulta = $this->conexion->prepare("INSERT INTO jugadores VALUES(?, ?, ?, ?)");

            $consulta->bindParam(1, $jugador->documento);
            $consulta->bindParam(2, $jugador->nombre);
            $consulta->bindParam(3, $jugador->posicion);
            $consulta->bindParam(4, $jugador->equipo);
            $consulta->execute();

            return $consulta->rowCount();
        }

        public function obtenerJugadorDocumento($documento)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM jugadores WHERE documento=?");
            $consulta->bindParam(1, $documento);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function obtenerNombrePos()
        {
            $consulta = $this->conexion->prepare("SELECT jugadores. *, posiciones.nombre as posicion_nombre from jugadores INNER JOIN posiciones ON jugadores.posicion = posiciones.id ORDER BY nombre");
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function obtenerJugadores()
        {
            $consulta = $this->conexion->prepare("SELECT jugadores. *, equipos.nombre as equipo_nombre from jugadores INNER JOIN equipos ON jugadores.equipo = equipos.id ORDER BY nombre");
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function obtenerJugadorNombre($nombre)
        {
            $consulta = $this->conexion->prepare("SELECT * FROM jugadores WHERE nombre=?");
            $consulta->bindParam(1, $nombre);
            $consulta->setFetchMode(PDO::FETCH_OBJ);
            $consulta->execute();
            return $consulta->fetchAll();
        }

        public function actualizarJugador(Jugador $jugador)
        {
            $consulta = $this->conexion->prepare("UPDATE jugadores SET nombre=?, posicion=?, equipo=? WHERE documento=?");

            $consulta->bindParam(1, $jugador->nombre);
            $consulta->bindParam(2, $jugador->posicion);
            $consulta->bindParam(3, $jugador->equipo);
            $consulta->bindParam(4, $jugador->documento);
            $consulta->execute();

            return $consulta->rowCount();
        }

        public function eliminarJugador($documento)
        {
            $consulta = $this->conexion->prepare("DELETE FROM jugadores WHERE documento=?");

            $consulta->bindParam(1, $documento);
            $consulta->execute();

            return $consulta->rowCount();
        }

    }

?>