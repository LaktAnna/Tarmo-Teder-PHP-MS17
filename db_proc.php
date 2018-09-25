<?php //web localhost/MS17

require ('conf.php');

go_home();

//ühenduse tegemine protseduuriga
$conn = mysqli_connect($server, $user, $pass);                   

if (!$conn) {
	die("Ühendusega on halvasti".mysqli_connect_error);
}  
echo "Ühendus protseduuriga on olemas!";

//kirje lisamine baasi
function write_record($conn) {
    $sql_write = "INSERT INTO ms17.nimekiri (EesNimi, PereNimi, id_code) VALUES ('Endel', 'Eesvarav', '32875764984')";
    if (mysqli_query($conn, $sql_write)) {
        echo "<p>Kirje lisamine onnestus!</p>";
    } else {
        echo "<p>Viga: ".mysqli_error($conn)."</p>";
    }

    mysqli_close($conn);   //db kinnipanemine
}

//kirje lisamine andmebaasi nupule vajutades
function write_button($conn) {
    echo "<input type='submit' name='insert_record' value='Sisesta_kirje'>";
    if(isset($_POST['insert_record'])){
        write_record($conn);
    }
}

//koige kirjate lugemine
function show_all($conn) {
    $sql_select_all = "SELECT * FROM ms17.nimekiri";
    $result = mysqli_query($conn, $sql_select_all);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p>id: ".$row["id"]."EesNimi: ".$row["EesNimi"]."PereNimi: ".$row["PereNimi"]."Isikukood: ".$row["id_code"]."Sisestusaeg: ".$row["time"]."</p>";
        }
    } else {
        echo "Tabel on tühi";
    }
    mysqli_close($conn);
}

//kirje otsimise funktsioon
function show_all_button($conn) {
    echo "<input type='submit' name='show_all' value='Näita kõike kirjeid'>";
    if(isset($_POST['show_all'])){
        show_all($conn);
    }
}

//konkreetse kirje otsimine
function search_by($conn) {
    $sql_select_all = "SELECT * FROM ms17.nimekiri WHERE PereNimi='".$_GET['id']."'";
    $result = mysqli_query($conn, $sql_select_all);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<p>id: ".$row["id"]."EesNimi: ".$row["EesNimi"]."PereNimi: ".$row["PereNimi"]."Isikukood: ".$row["id_code"]."Sisestusaeg: ".$row["time"]."</p>";
        }
    } else {
        echo "Sellist kirjet ei ole";
    }
    mysqli_close($conn);
}

//kirje otsimise nupp
function search_by_button($conn) {
    echo "<input type='submit' name='search_by' value='Näita yhte kirjet'>";
    if(isset($_GET['search_by'])){
        search_by($conn);
    }
}

//kirje kustutamine baasist (GET meetod)
function delete_record($conn) {
    $sql_delete = "DELETE FROM ms17.nimekiri WHERE id='".$_GET['id']."'";
    if (mysqli_query($conn, $sql_delete)) {
        echo "<p>Kirje kustutamine onnestus!</p>";
    } else {
        echo "<p>Viga: ".mysqli_error($conn)."</p>";
    }

    mysqli_close($conn);   //db kinnipanemine
}

//kirje kustutamine andmebaasist nupule vajutades (GET meetod)
function delete_button($conn) {
    echo "<input type='submit' name='delete_record' value='Kustuta_kirje'>";
    if(isset($_GET['delete_record'])){
        delete_record($conn);
    }
}

//kirje kustutamine baasist (POST meetod)
function delete_record_post($conn) {
    $sql_delete = "DELETE FROM ms17.nimekiri WHERE id='".$_POST['id']."'";
    if (mysqli_query($conn, $sql_delete)) {
        echo "<p>Kirje kustutamine onnestus!</p>";
    } else {
        echo "<p>Viga: ".mysqli_error($conn)."</p>";
    }
    mysqli_close($conn);   //db kinnipanemine
}

//kirje kustutamine andmebaasist nupule vajutades (POST meetod)
function delete_button_post($conn) {
    echo "<input type='submit' name='delete_record_post' value='Kustuta_kirje'>";
    if(isset($_POST['delete_record_post'])){
        delete_record_post($conn);
    }
}

?>

<!-- Sisestusvorm -->
<form action="" method="post">
    <h3>Kirje sisetamine</h3>
    <ul>
        <li>
            <label for="EesNimi">Eesnimi</label>
            <input type="text" name="eesnimi">
            <label for="PereNimi">Perenimi</label>
            <input type="text" name="perenimi">
            <label for="isikukodd">Isikukood</label>
            <input type="text" name="eesnimi">
        </li>
    </ul>
    <p><?php write_button($conn); ?> </p>
</form>

<!-- Väljastusvorm (näitab kõike kirjeid)-->
<form action="" method="post">
    <p><?php show_all_button($conn); ?> </p>
</form>

<form action="" method="get">
    <h3>GET meetod !! ÄRGE MINGIL JUHUL NII KASUTAGE !!</h3>
    <ul>
        <li>
            <label for="ID">ID</label>
            <input type="text" name="id">
        </li>
        <li>
        <?php search_by_button($conn); ?>
        </li>
    </ul>
</form>

<form action="" method="get">
    <h3>GET meetod !! ÄRGE MINGIL JUHUL NII KASUTAGE !!</h3>
    <ul>
        <li>
            <tabel for="ID">ID</tabel>
            <input type="text" name="id">
        </li>
        <li>
        <?php delete_button($conn); ?>
        </li>
    </ul>  
</form>

<form action="" method="post">
    <h3>POST meetod - tohib kasutada</h3>
    <ul>
        <li>
            <tabel for="ID">ID</tabel>
            <input type="text" name="id">
        </li>
        <li>
        <?php delete_button_post($conn); ?>
        </li>
    </ul>  
</form>