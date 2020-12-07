<?php

namespace App\Models;

use App\Paginate;

class Item extends Model{

    public function countAll()
    {
        return $this->db->from('items')->count();
    }

    public function getAllItems($limit, $offset)
    {
        return $this->db->from('items')
            ->limit($limit)
            ->offset($offset)
            ->innerJoin('companies ON items.company_id = companies.id')
            ->select('company_name')->fetchAll();
    }

    public function paginateItems($items_per_page)
    {
        $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
        return $paginate = new Paginate($page, $items_per_page ,$this->countAll());
    }

}