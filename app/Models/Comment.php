<?php

namespace App\Models;

class Comment extends Model{

    public function getAllComments()
    {
        return self::$db->from('comments')
            ->innerJoin('items ON comments.item_id = items.id')
            ->innerJoin('users ON comments.user_id = users.id')
            ->select('product_title,firstname')->fetchAll();
    }

    public function getAllActiveComments()
    {
        return self::$db->from('comments')
            ->where('active', 1)
            ->innerJoin('items ON comments.item_id = items.id')
            ->innerJoin('companies ON items.company_id = companies.id')
            ->select('items.image, product_title, company_name')->fetchAll();
    }

    public function createComment($data)
    {
        $values = [
            'item_id' =>  $data['item_id'],
            'name'  =>  $data['name'],
            'email'  =>  $data['email'],
            'text'  =>  $data['text'],
            'user_id'    =>  $data['user_id'],
            'created_at'    =>  date("Y-m-d H:i:s", time())

        ];

        self::$db->insertInto('comments', $values)->execute();
        return true;
    }

    public function updateCommentActive($id, $active)
    {
        self::$db->update('comments')
            ->set('active', $active)
            ->where('id', $id)
            ->execute();

        return true;
    }

}