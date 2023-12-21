<?php
class CandyShop extends BaseController
{
    private CandyModel $candyModel;

    public function __construct()
    {
        $this->candyModel = $this->model('CandyModel');
    }

    public function overzichtMagazijn()
    {
        $magazijnData = $this->candyModel->getMagazijnOverzicht();

        $data = ['magazijnData' => $magazijnData];
        $this->view('CandyShop/overzichtMagazijn', $data);
    }

    public function leveringsInformatie($Id)
    {
        $leveringsData = $this->candyModel->getLeveringsInformatie($Id);
        $contactInfo = $this->candyModel->getContactInfo($Id);


        if (!$leveringsData[0]->aantalAanwezig) {
            header("Refresh: 4; url=/CandyShop/overzichtMagazijn");
        }

        $data = [
            'leveringsData' => $leveringsData,
            'contactInfo' => $contactInfo
        ];
        $this->view('CandyShop/leveringsInformatie', $data);
    }

    public function overzichtAllergenen($Id)
    {
        $allergeenData = $this->candyModel->getOverzichtAllergenen($Id);
        $productData = $this->candyModel->getProductData($Id);

        $data = ['allergeenData' => $allergeenData, 'productData' => $productData,];
        $this->view('CandyShop/overzichtAllergenen', $data);
    }
}
