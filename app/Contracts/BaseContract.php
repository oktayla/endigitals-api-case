<?php

namespace App\Contracts;

interface BaseContract {
    public function getAll();
    public function findById(int $id);
    public function add(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}