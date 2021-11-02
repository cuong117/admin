<?php

define('fileds', 7);

class itemI
{
    var $title = 'chưa rõ';
    var $author = 'chưa rõ';
    var $type = 'chưa rõ';
    var $material = 'chưa rõ';
    var $desc = '';
    var $item = array();
}

class trealet
{
    var $exec = 'project16';
}

class file
{
    var $trealet;
}

function exportToTrealet($POST)
{
    $json = createJson($POST);
    file_put_contents("./outputFile/project.json", $json);
    file_put_contents("./outputFile/project.trealet", $json);
}

function createJson($post)
{
    $post = array_values($post);
    $trealet = new trealet();
    $length = count($post) / fileds;

    for ($i = 0; $i < $length; $i++) {
        $area = $post[fileds * $i + 6];
        $trealet->$area = array();
    }

    for ($i = 0; $i < $length; $i++) {
        $item_info = new itemI();
        $item_info->item = explode(',', $post[fileds * $i]);
        if (!empty($post[fileds * $i + 1]))
            $item_info->title = $post[fileds * $i + 1];
        if (!empty($post[fileds * $i + 2]))
            $item_info->author = $post[fileds * $i + 2];
        if (!empty($post[fileds * $i + 3]))
            $item_info->material = $post[fileds * $i + 3];
        if (!empty($post[fileds * $i + 4]))
            $item_info->desc = $post[fileds * $i + 4];
        if (!empty($post[fileds * $i + 5]))
            $item_info->type = $post[fileds * $i + 5];
        $area = $post[fileds * $i + 6];
        array_push($trealet->$area, $item_info);
    }

    $file = new file();
    $file->trealet = $trealet;
    return json_encode($file, JSON_UNESCAPED_UNICODE);
}
