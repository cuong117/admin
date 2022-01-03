<?php

define('fileds', 13);

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
        $item_info->item = explode(',', $post[fileds * $i + 12]);
        $ids_length = count($item_info->item);
        for ($j = 0; $j < $ids_length; $j++)
            $item_info->item[$j] = (int)($item_info->item[$j]);
        if (!empty($post[fileds * $i + 11]))
            $item_info->title = $post[fileds * $i + 11];
        if (!empty($post[fileds * $i + 10]))
            $item_info->author = $post[fileds * $i + 10];
        if (!empty($post[fileds * $i + 9]))
            $item_info->material = $post[fileds * $i + 9];
        if (!empty($post[fileds * $i + 8]))
            $item_info->desc = $post[fileds * $i + 8];
        if (!empty($post[fileds * $i + 7]))
            $item_info->type = $post[fileds * $i + 7];

        $area = $post[fileds * $i + 6];
        array_push($trealet->$area, $item_info);

        if (!empty($post[fileds * $i + 5])) {
            $item_info->interactive = new stdClass();
            $item_info->interactive->question = $post[fileds * $i + 5];
        }


        if (!empty($post[fileds * $i + 4]) && !empty($post[fileds * $i + 3]) && !empty($post[fileds * $i + 2]) && !empty($post[fileds * $i + 1])) {
            $item_info->interactive->answer = array();
            array_push($item_info->interactive->answer, $post[fileds * $i + 4], $post[fileds * $i + 3], $post[fileds * $i + 2], $post[fileds * $i + 1]);
        }

        if (!empty($post[fileds * $i])) {
            switch ($post[fileds * $i]) {
                case "A":
                    $item_info->interactive->trueAns = $post[fileds * $i + 4];
                    break;
                case "B":
                    $item_info->interactive->trueAns = $post[fileds * $i + 3];
                    break;
                case "C":
                    $item_info->interactive->trueAns = $post[fileds * $i + 2];
                    break;
                case "D":
                    $item_info->interactive->trueAns = $post[fileds * $i + 1];
                    break;
            }
        }
    }

    $file = new file();
    $file->trealet = $trealet;
    return json_encode($file, JSON_UNESCAPED_UNICODE);
}
