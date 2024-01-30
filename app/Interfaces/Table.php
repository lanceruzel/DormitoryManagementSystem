<?php
namespace App\Interfaces;

interface Table{
    public function tableItems();
    public function showSelectedItem($id);
    public function deleteSelectedItem($id);
}

