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
    <div id="showoff" class="tapContent">
        <div class='form'>
            <form action="" method="post" id="info">
                <h1>Thông tin hiện vật</h1>
                <div class="item-content0 item">
                    <div>
                        A: <input type="radio" name='Ans0' value="A" checked>
                        B: <input type="radio" name='Ans0' value="B">
                        C: <input type="radio" name='Ans0' value="C">
                        D: <input type="radio" name='Ans0' value="D">
                    </div>
                    <label for="">Đáp án đúng: </label>
                    <span>Trường trên không được để trống</span>
                    <input type="text" name='D0' id="D0" class="require">
                    <label for="D0">Đáp án D: </label>
                    <span>Trường trên không được để trống</span>
                    <input type="text" name='C0' id="C0" class="require">
                    <label for="C0">Đáp án C: </label>
                    <span>Trường trên không được để trống</span>
                    <input type="text" name='B0' id="B0" class="require">
                    <label for="B0">Đáp án B: </label>
                    <span>Trường trên không được để trống</span>
                    <input type="text" name='A0' id="A0" class="require">
                    <label for="A0">Đáp án A: </label>
                    <span>Trường trên không được để trống</span>
                    <input type="text" name='question0' id="question0" class="require">
                    <label for="question0">Câu hỏi</label>
                    <span>Trường trên không được để trống</span>
                    <input name="area0" id="area0" class="require" type="text">
                    <label for="area0">Khu vực:</label>
                    <input name="type0" id="type0" type="text">
                    <label for="type0">Loại:</label>
                    <textarea name="desc0" id="desc0" cols="30" rows="2"></textarea>
                    <label for="desc0">Miêu tả:</label>
                    <input name="material0" id="material0" type="text">
                    <label for="material0">Chất liệu:</label>
                    <input name="author0" id="author0" type="text">
                    <label for="author0">Tác giả:</label>
                    <input name="title0" id="title0" type="text">
                    <label for="title0">Tên tác phẩm:</label>
                    <span>Trường trên không được để trống</span>
                    <input name="id0" id="img0" class="require" type="text" value="">
                    <label for="img0">Id ảnh:</label>
                </div>
                <button type="submit">Thêm</button>
            </form>
        </div>
        <div class='list-item'>
            <div class='top'>
                <button class='add'>Thêm hiện vật</button>
                <button type='submit' form='info'>Tải lên</button>
            </div>
            <div class="content">
                <ul>
                    <li class="item_0">
                        <div>Hiện Vật</div>
                        <button>Xóa</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <script src="./controller/control.js"></script>
</body>

</html>
<?php
if (!empty($_POST))
    exportToTrealet($_POST);
?>