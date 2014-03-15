<?php

class Fonctions {

    static function setSociete($nom, $siren, $ape, $sect_soc, $av_soc, $type, $ad_soc, $avad_soc, $bonis_soc, $auteur) {
        $req = "INSERT INTO societe(nom,siren,ape,sect_soc,av_soc,type,ad_soc,avad_soc,bonis_soc,auteur) VALUES('$nom','$siren','$ape','$sect_soc','$av_soc','$type','$ad_soc','$avad_soc','$bonis_soc','$auteur') ";
        $res = mysql_query($req);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    static function setSalarie($nom, $prenom, $bdate_sal, $nation_sal, $ad_sal, $societe_sal, $email, $auteur) {
        $req = "INSERT INTO salarie(nom_sal,prenom_sal,bdate_sal,nation_sal,ad_sal,societe_sal,email,auteur) VALUES('$nom','$prenom','$bdate_sal','$nation_sal','$ad_sal','$societe_sal','$email','$auteur') ";
        $res = mysql_query($req);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    static function setAudiance($rg, $jurdiction, $type_aud, $sect_aud, $auteur) {
        $req = "INSERT INTO audiance(rg, jurdiction, type_aud, sect_aud,date_aud,auteur) VALUES('$rg', '$jurdiction', '$type_aud', '$sect_aud',NOW(),'$auteur') ";
        $res = mysql_query($req);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    static function setDossier($defenseur, $issue, $id_sal, $id_soc, $id_aud, $auteur) {
        $req = "INSERT INTO dossier(defenseur,issue,date_doss,id_sal,id_soc,id_aud,auteur) VALUES('$defenseur','$issue',NOW(),'$id_sal','$id_soc','$id_aud','$auteur') ";
        $res = mysql_query($req);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    static function setUser($nom, $prenom, $login, $pass_word, $email) {
        $req = "INSERT INTO user(nom,prenom,login,pass_word,email,created_at) VALUES('$nom','$prenom','$login','$pass_word','$email',NOW()) ";
        $res = mysql_query($req);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    static function getDossiersActive() {
        $res = mysql_query("SELECT * FROM dossier WHERE actif=1  ORDER BY id DESC");
        if ($res) {
            $dossiers = array();
            while ($row = mysql_fetch_array($res)) {
                $dossiers[] = $row;
            }
            return $dossiers;
        } else {
            return false;
        }
    }

    static function getDossierById($id) {
        $req = "SELECT * FROM dossier WHERE id=$id";
        $res = mysql_query($req);
        if ($res) {
            return $row = mysql_fetch_array($res);
        }
    }
     static function getSalarieById($id) {
        $req = "SELECT * FROM salarie WHERE id=$id";
        $res = mysql_query($req);
        if ($res) {
            return $row = mysql_fetch_array($res);
        }
    }
     static function getSocieteById($id) {
        $req = "SELECT * FROM societe WHERE id=$id";
        $res = mysql_query($req);
        if ($res) {
            return $row = mysql_fetch_array($res);
        }
    }
     static function getAudianceById($id) {
        $req = "SELECT * FROM audiance WHERE id=$id";
        $res = mysql_query($req);
        if ($res) {
            return $row = mysql_fetch_array($res);
        }
    }

    static function getAllDossiers() {
        $res = mysql_query("SELECT * FROM dossier ORDER BY id DESC");
        if ($res) {
            $dossiers = array();
            while ($row = mysql_fetch_array($res)) {
                $dossiers[] = $row;
            }
            return $dossiers;
        } else {
            return false;
        }
    }

    static function activeDossier($id) {
        $dossier = self::getDossierById($id);
        if ($dossier['actif'] == 0) {
            $req = "UPDATE dossier SET actif=1 WHERE id='$id'";
            mysql_query($req);
            echo "<span class='btn btn-success'>Activer</span>";
        } else if ($dossier['actif'] == 1) {
            $req = "UPDATE dossier SET actif=0 WHERE id='$id'";
            mysql_query($req);
            echo "<span class='btn btn-danger'>Désactiver</span>";
        }
    }

    static function supprimeDossier($id) {
        $req = "DELETE FROM dossier WHERE id='$id'";
        return mysql_query($req);
    }

    static function supprimeSalarie($id) {
        $req = "DELETE FROM salarie WHERE id='$id'";
        return mysql_query($req);
    }

    static function supprimeSoc($id) {
        $req = "DELETE FROM societe WHERE id='$id'";
        return mysql_query($req);
    }

    static function supprimeAudiance($id) {
        $req = "DELETE FROM audiance WHERE id='$id'";
        return mysql_query($req);
    }

    static function getTablesAndSearch($table, $defenseur, $salarie, $societe) {
        $req = "SELECT * FROM " . $table . " WHERE defenseur = '$defenseur' OR id_sal = '$salarie' OR  id_soc = '$societe' ORDER BY id DESC";
        $res = mysql_query($req);
        if ($res) {
            $array = array();
            while ($row = mysql_fetch_array($res)) {
                $array[] = $row;
            }
            return $array;
        } else {
            return false;
        }
    }

    static function getTables($table) {
        $req = "SELECT * FROM " . $table . " ORDER BY id DESC";
        $res = mysql_query($req);
        if ($res) {
            $array = array();
            while ($row = mysql_fetch_array($res)) {
                $array[] = $row;
            }
            return $array;
        } else {
            return false;
        }
    }

    static function existEmailSal($email) {
        $res = mysql_query("SELECT email FROM salarie WHERE email='$email'");
        if ($res) {
            if (mysql_num_rows($res) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    static function existSiren($siren) {
        $res = mysql_query("SELECT siren FROM societe WHERE siren='$siren'");
        if ($res) {
            if (mysql_num_rows($res) == 0) {
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    static function dateSqlToFr($date) {
        $expl = explode("-", $date);
        return $expl[2] . "/" . $expl[1] . "/" . $expl[0];
    }

    static function dateTimeSqlToFr($dateTime) {
        $dt = explode(" ", $dateTime);
        $expl = explode("-", $dt[0]);
        return $expl[2] . "/" . $expl[1] . "/" . $expl[0] . " à " . $dt[1];
    }

}

?>