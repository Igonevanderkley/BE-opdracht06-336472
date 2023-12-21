<?php

class CandyModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    function getMagazijnOverzicht()
    {
        $sql = "SELECT pro.Id, pro.Barcode, pro.Naam, mag.VerpakkingsEenheid, mag.AantalAanwezig
                FROM product pro
                JOIN Magazijn mag
                ON pro.Id = mag.ProductId
                ORDER BY pro.Barcode asc";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    function getContactInfo($Id)
    {
        $sql = "SELECT lev.Naam, lev.ContactPersoon, lev.LeverancierNummer, lev.Mobiel
                FROM Leverancier lev
                INNER JOIN productLeverancier prolev
                ON prolev.LeverancierId = lev.Id
                WHERE prolev.productId = $Id";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    function getleveringsInformatie($Id)
    {
        $sql = "SELECT mag.aantalAanwezig, pro.Naam, pro.Barcode, prolev.DatumLevering, prolev.Aantal, prolev.DatumEerstVolgendeLevering
                FROM product pro
                INNER JOIN ProductLeverancier prolev
                ON pro.Id = prolev.ProductId
                INNER JOIN Magazijn mag
                ON pro.Id = mag.ProductId
                WHERE pro.Id = $Id
                ORDER BY prolev.DatumLevering asc
                ";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getOverzichtAllergenen($Id)
    {
        $sql = "SELECT alg.Naam, alg.Omschrijving
                FROM Allergeen alg
                INNER JOIN ProductPerAllergeen proper
                ON alg.Id = proper.AllergeenId
                INNER JOIN product pro
                ON proper.productId = pro.Id
                WHERE pro.Id = $Id";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    function getProductData($Id)
    {
        $sql = "SELECT Naam, Barcode FROM Product WHERE Id = $Id";

        $this->db->query($sql);
        return $this->db->resultSet();
    }
}
