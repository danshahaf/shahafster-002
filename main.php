<?php
    include "db.php";
    // ----------------------------- TRIGGERS ---------------------------------
    if($_POST['message'] == "load-blog-comments") echo load_blog_comments();

    if($_POST['message'] == "populate-labels") echo populate_labels();
    
    if($_POST['message'] == "new-label") echo add_label($_POST['name'], $_POST['color']);


    // ------------------------------ FUNCTIONS --------------------------------
    function load_blog_comments() {
        $c = connDB();
        $data = "";
        $sql = "SELECT ID, Moji, Text, TImestamp FROM Comment";
    }

    function populate_labels() {
        $c = connDB(); //establish connection
        try {
        $sql = "SELECT ID, Name, Color FROM Label";
        $s = $c -> prepare($sql);
        $s -> execute();
        $data = "";
        while($r = $s -> fetch(PDO::FETCH_ASSOC)) {
            // $sql2 = "SELECT COUNT(*) FROM Comment WHERE Label_ID = ".$r['ID'].";";
            // $s = $c -> query($sql2);
            // $count = $s -> fetchColumn();
            $data .=
            '
                <div class = "label-container">
                    <h4 style = "background-color: '.$r['Color'].'; color: '.$r['Color'].';"> * </h4> 
                    <h5> '.$r['Name'].' </h5>
                </div>
            ';
        }
        } catch (PDOException $e) {return $e;}
        return $data;

    }

    function add_label($name, $color) {
        try {
            $c = connDB(); //establish db connection
            $sql = "SELECT MAX(ID)+1 FROM Label;";
            $s = $c -> prepare($sql);
            $s -> execute();
            if ($max = $s -> fetchColumn()) $id = $max;
            else $id = 1;   
            
            $sql = "INSERT INTO Label (ID, Name, Color) VALUES (".$id.", '".$name."', '#".$color."');";
            $c -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $c -> exec($sql);

            $c = null; //close connection
        } catch (PDOException $e) {return $e;}

        return populate_labels();
    }


?>