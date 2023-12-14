<?php

class CandyShop extends BaseController
{
    private $candyModel;

    public function __construct()
    {
        $this->candyModel = $this->model('CandyModel');
    }

    public function overzichtMagazijn() {

        $magazijnData = $this->candyModel->getMagazijnOverzicht();

        $data = ['magazijnData' => $magazijnData];

        $this->view('CandyShop/overzichtMagazijn', $data);
      
    }

    public function leveringsInformatie($Id) {
        $leveringsData = $this->candyModel->getLeveringsInformatie($Id);

        $data = ['leveringsData' => $leveringsData];

        $this->view('CandyShop/leveringsInformatie', $data);
    }
  
}
