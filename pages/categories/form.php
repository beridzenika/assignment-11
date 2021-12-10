<?php

if(isset($_POST['action']) && $_POST['action'] == 'insert') {
    $title = isset($_POST['title']) ? $_POST['title'] : '' ;

    if($title) {
        $insert_query = "INSERT INTO categories (title) VALUES ('$title')";
        
        echo query($select_query)? "Record Created" : "Error";
    }
}

?>

    <main>
        <div class="container-header">
            <h2>კატეგორიები</h2>
            <a href="?page=categories" class="btn">Back</a>
        </div>
        <div class="content">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">title</label>
                    <input type="text" name="title">
                </div>
                <div class="form-group">
                <input type="hidden" name="acton" value="insert">
                    <button class="btn submit">Add</button>
                </div>
            </form>
        </div>
    </main>