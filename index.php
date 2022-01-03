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
                        A: <input type="radio" name='Ans' value="A">
                        B: <input type="radio" name='Ans' value="B">
                        C: <input type="radio" name='Ans' value="C">
                        D: <input type="radio" name='Ans' value="D">
                    </div>
                    <label for="">Đáp án đúng: </label>
                    <input type="text" name='D0' id="D0">
                    <label for="D0">Đáp án D: </label>
                    <input type="text" name='C0' id="C0">
                    <label for="C0">Đáp án C: </label>
                    <input type="text" name='B0' id="B0">
                    <label for="B0">Đáp án B: </label>
                    <input type="text" name='A0' id="A0">
                    <label for="A0">Đáp án A: </label>
                    <input type="text" name='question0' id="question0">
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
        <!-- <div class="separator">Hoặc</div>
        <button>Nhập Thông Tin Cho MiniGame </button> -->
    </div>

    <!-- <script>
        var input = document.querySelectorAll('input')
        var textarea = document.querySelector('textarea')
        input.forEach(element    => {
            element.setAttribute('data-empty', true)
            element.onchange = e => {
                e.target.setAttribute('data-empty', !e.target.value)
            }
        })

        textarea.setAttribute('data-empty', true)
        textarea.onchange = e => {
            e.target.setAttribute('data-empty', !e.target.value)
        }
    </script> -->

    <script src="./controller/control.js"></script>
</body>

</html>
<?php
if (!empty($_POST))
    exportToTrealet($_POST);
?>