<?php


interface Cart
{
    public function get($product_id, $session_token);

    public function store($session_token);

    public function deleteOne($param);

    public function deleteAll($session_token);
}
