<?php
namespace App\Interfaces;
interface ModalCrud{
    public function getSelectedItemInformation($id);
    public function storeItem();
    public function resetForm();
    public function getItemID($id);
    public function deleteItem();
}