<?php

class CandyModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    function getMagazijnOverzicht() {
        $sql =  "SELECT pro.Id, pro.Barcode, pro.Naam, mag.VerpakkingsEenheid, mag.AantalAanwezig
                                    FROM product pro
                                    JOIN Magazijn mag
                                    ON pro.Id = mag.ProductId
                                    ORDER BY pro.Barcode asc";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    function getleveringsInformatie($Id) {
        $sql = "SELECT pro.Naam, prolev.DatumLevering, prolev.Aantal, prolev.DatumEerstVolgendeLevering, lev.Naam as Levnaam, lev.Contactpersoon, lev.LeverancierNummer, lev.Mobiel
                                                        FROM product pro
                                                        INNER JOIN ProductLeverancier prolev
                                                        ON pro.Id = prolev.ProductId
                                                        INNER JOIN Magazijn mag
                                                        ON pro.Id = mag.ProductId
                                                        INNER JOIN leverancier lev
                                                        ON lev.Id = prolev.LeverancierId
                WHERE pro.Id = $Id";

        // $this->db->bind(':id', $Id);    
        $this->db->query($sql);
        return $this->db->resultSet();
    }


}
