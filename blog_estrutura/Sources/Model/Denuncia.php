<?php

class Denuncia {
    private $motivo;

    public function getMotivo()
    {
        return $this->motivo;
    }

    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;

        return $this;
    }
}