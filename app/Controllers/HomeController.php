<?php

namespace App\Controllers;

use App\Controllers\Interfaces\HomeInterface;
use App\Models\Comment;
use App\Models\Item;

class HomeController extends Controller implements HomeInterface{

    public function homePage()
    {
        $itemsModel = new Item();

        $items_per_page = 9;

        $paginate = $itemsModel->paginateItems($items_per_page);
        $items = $itemsModel->getAllItems($items_per_page, $paginate->offset());

        $commentModel = new Comment();
        $comments = $commentModel->getAllActiveComments();

        return $this->render('home', array('items' => $items, 'comments' => $comments, 'paginate' => $paginate));
    }



}