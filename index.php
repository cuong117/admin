<?php
    require_once('./export/export.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body>
    <div class="top-bar">
        <a href="#" class="showoff">Thông tin</a>
        <a href="#" class="iterative">Trò chơi</a>
    </div>
    <div id="showoff" class="tapContent">
        <form action="" method="post">
            <h1>Thông tin hiện vật</h1>
            <div class="item">
                <div class="button">
                    <button value="-">-</button>
                    <button value="+">+</button>
                </div>
                <div class="item-content">
                    <label for="img0">id ảnh:</label>
                    <input name="id0" id="img0" class = "require" type="text">
                    <span>Trường trên không được để trống</span>
                    <label for="title0">Tên tác phẩm:</label>
                    <input name="title0" id="title0" type="text">
                    <label for="author0">Tác giả:</label>
                    <input name="author0" id="author0" type="text">
                    <label for="material0">Chất liệu:</label>
                    <input name="material0" id="material0" type="text">
                    <label for="desc0">Miêu tả:</label>
                    <textarea name="desc0" id="desc0" cols="30" rows="8"></textarea>
                    <label for="type0">Loại:</label>
                    <input name="type0" id="type0" type="text">
                    <label for="area0">Khu vực:</label>
                    <input name="area0" id="area0" class = "require" type="text">
                    <span>Trường trên không được để trống</span>
                </div>
            </div>
            <div>
                <button class="addInfor">Thêm Thông tin</button>
                <button type="submit">Gửi</button>
            </div>
        </form>
    </div>
    <div id="iterative" class="tapContent"></div>
    <script src="./controller/controlShowoff.js"></script>
    <script src="./controller/controlTab.js"></script>
    <script src="./controller/controlIterative.js"></script>
</body>

</html>
<?php
if (!empty($_POST))
    exportToTrealet($_POST)
?>