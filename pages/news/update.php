<?php

    $id = isset($_GET['id']) && $_GET['id'] ? $_GET['id'] : null;

    if($id) {

        $news = getFirst("SELECT * FROM news WHERE id = " .$id);

        if(!$news) {
            die('news not found');
        }
        } else {
            echo "invalid id";
        }

    $categories = getAll("SELECT * FROM categories");

    if(isset($_POST['action']) && $_POST['action'] == 'update') {
        
        $title = isset($_POST['title']) ? $_POST['title'] : '' ;
        $text = isset($_POST['text']) ? $_POST['text'] : '' ;
        $categories_id = isset($_POST['categories_id']) ? $_POST['categories_id'] : '' ;

        if($title && $text && $categories_id) {
            $update_query = "UPDATE news SET title = '$title', text = '$text', categories_id = '$categories_id' WHERE id = " . $id;

            echo query($select_query) ? "Record Update" : "Error";

        }
    }
    
?>

    <main>
        <div class="container-header">
            <h2>News</h2>
            <a href="news.php" class="btn">Update</a>
        </div>
        <div class="content">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">title</label>
                    <input type="text" name="title" value="<?= $news['title'] ?>">
                </div>
                <div class="form-group">
                    <label for="">text</label>
                    <textarea name="text" id="" cols="30" rows="10"  value="<?= $news['text'] ?>"></textarea>
                </div>
                <div class="form-group">
                    <label for="">categories</label>
                    <select name="categories_id" id="">
                        <?php foreach($categories as $value) { ?>
                        <option value="<?= $value['id'] ?>" <?= $value['id'] == $news['categories_id'] ? 'selected' : '' ?>><?= $value['title'] ?></option>
                        <?php } ?>
                    </select>
                </div> 
                <div class="form-group">
                    <input type="hidden" name="acton" value="update">
                    <button class="btn submit">Update</button>
                </div>
            </form>
        </div>
    </main>