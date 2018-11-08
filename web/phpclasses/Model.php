<?php
class Model
{
    public function getPatienten(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        $query=$db->prepare("SELECT * From patienten");
        $klasse= "Patient";
        include_once  $klasse. '.php';
        $query->setFetchmode(\PDO::FETCH_CLASS,$klasse);
        $query->execute();
        $patienten=$query->fetchAll();
        return $patienten;
    }
    public function getArtsen(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        $query=$db->prepare("SELECT * From artsen");
        $klasse= "Arts";
        include_once  $klasse. '.php';
        $query->setFetchmode(\PDO::FETCH_CLASS,$klasse);
        $query->execute();
        $artsen=$query->fetchAll();
        return $artsen;
    }
    public function getMedicijnen(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        $query=$db->prepare("SELECT * From medicijnen");
        $klasse= "Medicijn";
        include_once  $klasse. '.php';
        $query->setFetchmode(\PDO::FETCH_CLASS,$klasse);
        $query->execute();
        $medicijnen=$query->fetchAll();
        return $medicijnen;
    }
    public function getPatient(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        $query=$db->prepare("SELECT * FROM patienten WHERE ID = " . $_GET['ID']);
        $klasse= "Patient";
        $query->setFetchmode(\PDO::FETCH_CLASS,$klasse);
        include_once  $klasse. '.php';
        $query->execute();
        $patient=$query->fetchAll();
        return $patient;
    }
    public function getArts(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        $query=$db->prepare("SELECT * FROM artsen WHERE ID = " . $_GET['ID']);
        $klasse= "Arts";
        $query->setFetchmode(\PDO::FETCH_CLASS,$klasse);
        include_once  $klasse. '.php';
        $query->execute();
        $arts=$query->fetchAll();
        return $arts;
    }
    public function getMedicijn(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        $query=$db->prepare("SELECT * FROM medicijnen WHERE ID = " . $_GET['ID']);
        $klasse= "Medicijn";
        $query->setFetchmode(\PDO::FETCH_CLASS,$klasse);
        include_once  $klasse. '.php';
        $query->execute();
        $medicijn=$query->fetchAll();
        return $medicijn;
    }


    public function setPatient(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        if(isset($_POST['verzenden'])){
            $ID = $_GET['ID'];
            $voornaam = $_POST['voornaam'];
            $tussenvoegsel = $_POST['tussenvoegsel'];
            $achternaam = $_POST['achternaam'];
            $pasnummer = $_POST['pasnummer'];
            $straat = $_POST['straat'];
            $postcode = $_POST['postcode'];
            $stad = $_POST['stad'];
            $email = $_POST['email'];
            $telefoonadres = $_POST['telefoonadres'];
            $artsID = $_POST['artsID'];

            $query=$db->prepare("UPDATE patienten SET voornaam = :voornaam, tussenvoegsel = :tussenvoegsel,
 achternaam = :achternaam, pasnummer = :pasnummer, straat = :straat, postcode = :postcode, stad = :stad, 
 email = :email, telefoonadres = :telefoonadres, artsID = :artsID WHERE ID = :ID");
            $query->bindParam("ID", $ID);
            $query->bindParam("voornaam", $voornaam);
            $query->bindParam("tussenvoegsel", $tussenvoegsel);
            $query->bindParam("achternaam", $achternaam);
            $query->bindParam("pasnummer", $pasnummer);
            $query->bindParam("straat", $straat);
            $query->bindParam("postcode", $postcode);
            $query->bindParam("stad", $stad);
            $query->bindParam("email", $email);
            $query->bindParam("telefoonadres", $telefoonadres);
            $query->bindParam("artsID", $artsID);
            $query->execute();
            header("Refresh:0; url=Patientenlijst.php");
        }
    }
    public function setArts(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        if(isset($_POST['verzenden'])){
            $ID = $_GET['ID'];
            $voornaam = $_POST['voornaam'];
            $tussenvoegsel = $_POST['tussenvoegsel'];
            $achternaam = $_POST['achternaam'];
            $specialisatie = $_POST['specialisatie'];
            $straat = $_POST['straat'];
            $postcode = $_POST['postcode'];
            $stad = $_POST['stad'];
            $email = $_POST['email'];
            $telefoonadres = $_POST['telefoonadres'];

            $query=$db->prepare("UPDATE artsen SET voornaam = :voornaam, tussenvoegsel = :tussenvoegsel,
 achternaam = :achternaam, specialisatie = :specialisatie, straat = :straat, postcode = :postcode, stad = :stad, 
 email = :email, telefoonadres = :telefoonadres WHERE ID = :ID");
            $query->bindParam("ID", $ID);
            $query->bindParam("voornaam", $voornaam);
            $query->bindParam("tussenvoegsel", $tussenvoegsel);
            $query->bindParam("achternaam", $achternaam);
            $query->bindParam("specialisatie", $specialisatie);
            $query->bindParam("straat", $straat);
            $query->bindParam("postcode", $postcode);
            $query->bindParam("stad", $stad);
            $query->bindParam("email", $email);
            $query->bindParam("telefoonadres", $telefoonadres);
            $query->execute();
            header("Refresh:0; url=Artsenlijst.php");
        }
    }
    public function setMedicijn(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        if(isset($_POST['verzenden'])){
            $ID = $_GET['ID'];
            $medicijnnaam= $_POST['medicijnnaam'];
            $beschrijving= $_POST['beschrijving'];
            $bijwerkingen= $_POST['bijwerkingen'];

            $query=$db->prepare("UPDATE medicijnen SET medicijnnaam = :medicijnnaam, beschrijving = :beschrijving,
 bijwerkingen = :bijwerkingen WHERE ID = :ID");
            $query->bindParam("ID", $ID);
            $query->bindParam("medicijnnaam", $medicijnnaam);
            $query->bindParam("beschrijving", $beschrijving);
            $query->bindParam("bijwerkingen", $bijwerkingen);
            $query->execute();
            header("Refresh:0; url=Medicijnenlijst.php");
        }
    }

    public function newMedicijn(){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        if(isset($_POST['verzenden'])){
            $medicijnnaam= $_POST['medicijnnaam'];
            $beschrijving= $_POST['beschrijving'];
            $bijwerkingen= $_POST['bijwerkingen'];

            $query=$db->prepare("INSERT INTO medicijnen (medicijnnaam, beschrijving, bijwerkingen) VALUES (:medicijnnaam, :beschrijving, :bijwerkingen);");
            $query->bindParam("medicijnnaam", $medicijnnaam);
            $query->bindParam("beschrijving", $beschrijving);
            $query->bindParam("bijwerkingen", $bijwerkingen);
            $query->execute();
            header("Refresh:0; url=Medicijnenlijst.php");
        }
    }

    public function deleteRow($target, $page){
        $db=new\PDO("mysql:host=localhost;dbname=peter_healthone", "peter", "user2");
        if(isset($_GET['ID'])){
            $ID = $_GET['ID'];
            $query=$db->prepare("DELETE FROM $target WHERE ID = $ID");
            $query->bindParam("ID", $ID);
            $query->bindParam("target", $target);
            if ($query->execute()){
                header("Refresh:0; url=$page");
            }
            else{
                var_dump($query);
            }
        }
    }

}
