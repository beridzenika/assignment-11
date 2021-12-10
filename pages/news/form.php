<?php

$categories = getAll("SELECT * FROM categories");

if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    $title = isset($_POST['title']) ? $_POST['title'] : '' ;
    $text = isset($_POST['text']) ? $_POST['text'] : '' ;
    $categories_id = isset($_POST['categories_id']) ? $_POST['categories_id'] : '' ;

    if($title && $text && $categories_id) {
        $insert_query = "INSERT INTO new (title, text, categories_id) VALUES ('$title', '$text', '$categories_id')";
        
        if(mysqli_query($connection, $insert_query)) {
            echo "Record Created";
        } else {
            echo "Error";
        }
    }
}

?>

    <main>
        <div class="container-header">
            <h2>სიახლეები</h2>
            <a href="" class="btn">Add New</a>
        </div>
        <div class="content">
            <form action="" method="post">
                <input type="hidden" name="action" value="insert">
                <div class="form-group">
                    <label for="">title</label>
                    <input type="text" name="title">
                </div>
                <div class="form-group">
                    <label for="">text</label>
                    <textarea name="text" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="">categories</label>
                    <select name="">
                        <?php foreach($categories as $value){ ?>
                        <option value="<?= $value['id'] ?>"><?= $value['title'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" name="acton" value="insert">
                    <button class="btn submit">Add</button>
                </div>
            </form>
        </div>
    </main>