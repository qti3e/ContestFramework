<?php

use contest\contest as framework;

class q1 extends framework
{
    public function index()
    {
        readByLine($this->input, function ($line, $id, $lines) {
            newLine($line);
        });
    }
}