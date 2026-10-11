<?php

class Curso {
    
    public function __construct(
        public ?int $id,
        public string $nome,
        public string $carga_horaria
    ) {}

}