<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Forms;
use Nette\Utils\Validators;
use Nette\Application\Responses\FileResponse;
use Nette\Utils\FileSystem;


class ComparePresenter extends BasePresenter
{

   /** @var Model\SessionManager */
   private $sm;

   /** @var Model\DeviceManager */
   private $dm;

   /** @var Model\ShootManager */
   private $stm;

   private $wwwDir;


   /**
    * LG, MD, SM, XS
    */
   private $view = self::VIEW_MD;

   /**
    * COLOR_1, COLOR_2, COLOR_3, COLOR_4
    */
   private $color = self::COLOR_1;

   /**
    * BACKGROUND_1, BACKGROUND_2
    */
   private $background = self::BACKGROUND_2;


   public function __construct(Model\SessionManager $sm, Model\DeviceManager $dm, Model\ShootManager $stm)
   {
      $this->sm = $sm;
      $this->dm = $dm;
      $this->stm = $stm;
   }


   public function startup()
   {
      parent::startup();

      $ds = DIRECTORY_SEPARATOR;
      $ds2 = '/';
      $this->wwwDir = $this->context->parameters['wwwDir'] . $ds;

      $sessionColor = $this->sm->getResultColor();
      $this->color = ($sessionColor == FALSE) ? $this->color : $sessionColor;

      $sessionBackground = $this->sm->getResultBackground();
      $this->background = ($sessionBackground == FALSE) ? $this->background : $sessionBackground;
   }


   public function renderList($id)
   {
      $this->isLoggedIn();
      $this->validateShootId($id);

      $this->template->isLoggedIn = $this->user->isLoggedIn();
      $this->template->shoot = $this->stm->getShootById($id);
      $this->template->similarShoots = $this->stm->getSimilarShootsWithShootById($id);

      $sessionView = $this->sm->getShootView();
      $this->template->view = ($sessionView == FALSE) ? $this->view : $sessionView;

      $this->template->viewLG = self::VIEW_LG;
      $this->template->viewMD = self::VIEW_MD;
      $this->template->viewSM = self::VIEW_SM;
      $this->template->viewXS = self::VIEW_XS;
   }


   public function renderResult($shootId, $similarId)
   {
      $this->isLoggedIn();
      $this->validateShootId($shootId);
      $this->validateShootId($similarId);

      $this->template->isLoggedIn = $this->user->isLoggedIn();
      $this->template->shoot = $shoot = $this->stm->getShootById($shootId);
      $this->template->similar = $similar = $this->stm->getShootById($similarId);

      $this->template->color = $this->color;
      $this->template->color1 = self::COLOR_1;
      $this->template->color2 = self::COLOR_2;
      $this->template->color3 = self::COLOR_3;
      $this->template->color4 = self::COLOR_4;

      $this->template->background = $this->background;
      $this->template->background1 = self::BACKGROUND_1;
      $this->template->background2 = self::BACKGROUND_2;
      $this->template->background3 = self::BACKGROUND_3;
      $this->template->background4 = self::BACKGROUND_4;

      $image1 = imagecreatefrompng($this->wwwDir . $shoot->path_img);
      $image2 = imagecreatefrompng($this->wwwDir . $similar->path_img);

      $size = getimagesize($this->wwwDir . $shoot->path_img);
      $diffImage = $image1;

      $diff = [];

      $pixelsDiffInPercent = 0;
      $pixelsDiffCount = 0;
      $pixelsTotalCount = $size[0] * $size[1];

      for ($x = 0; $x < $size[0]; $x++) {  //$size[0];
         for ($y = 0; $y < $size[1]; $y++) {   //$size[1]
            $rgb1 = imagecolorat($image1, $x, $y);
            $rgb2 = imagecolorat($image2, $x, $y);
            $pixels1 = imagecolorsforindex($image1, $rgb1);
            $pixels2 = imagecolorsforindex($image2, $rgb2);

            if (
               ($pixels1["red"] == $pixels2["red"]) and
               ($pixels1["green"] == $pixels2["green"]) and
               ($pixels1["blue"] == $pixels2["blue"]) and
               ($pixels1["alpha"] == $pixels2["alpha"])
            ) {

               if($this->background == self::BACKGROUND_1) {
                  $diff[$x][$y]["red"] = $pixels1["red"];
                  $diff[$x][$y]["green"] = $pixels1["green"];
                  $diff[$x][$y]["blue"] = $pixels1["blue"];
                  $diff[$x][$y]["alpha"] = 0;

               } elseif($this->background == self::BACKGROUND_2) {
                  $diff[$x][$y]["red"] = ($pixels1["red"] + $pixels1["green"] + $pixels1["blue"]) / 3;
                  $diff[$x][$y]["green"] = ($pixels1["red"] + $pixels1["green"] + $pixels1["blue"]) / 3;
                  $diff[$x][$y]["blue"] = ($pixels1["red"] + $pixels1["green"] + $pixels1["blue"]) / 3;
                  $diff[$x][$y]["alpha"] = 0.1;

               } elseif($this->background == self::BACKGROUND_3) {
                  $diff[$x][$y]["red"] = 255;
                  $diff[$x][$y]["green"] = 255;
                  $diff[$x][$y]["blue"] = 255;
                  $diff[$x][$y]["alpha"] = 0;

               } elseif($this->background == self::BACKGROUND_4) {
                  $diff[$x][$y]["red"] = 0;
                  $diff[$x][$y]["green"] = 0;
                  $diff[$x][$y]["blue"] = 0;
                  $diff[$x][$y]["alpha"] = 0;
               }

            } else {

               // red
               if($this->color == self::COLOR_1) {
                  $diff[$x][$y]["red"] = 255;
                  $diff[$x][$y]["green"] = 0;
                  $diff[$x][$y]["blue"] = 0;
                  $diff[$x][$y]["alpha"] = 0;

               } else if($this->color == self::COLOR_2) {
                  $diff[$x][$y]["red"] = 0;
                  $diff[$x][$y]["green"] = 255;
                  $diff[$x][$y]["blue"] = 0;
                  $diff[$x][$y]["alpha"] = 0;

               } elseif($this->color == self::COLOR_3) {
                  $diff[$x][$y]["red"] = 0;
                  $diff[$x][$y]["green"] = 0;
                  $diff[$x][$y]["blue"] = 255;
                  $diff[$x][$y]["alpha"] = 0;

               } elseif($this->color == self::COLOR_4) {
                  $diff[$x][$y]["red"] = 255;
                  $diff[$x][$y]["green"] = 255;
                  $diff[$x][$y]["blue"] = 0;
                  $diff[$x][$y]["alpha"] = 0;

               } else {
                  $diff[$x][$y]["red"] = max($pixels1["red"], $pixels2["red"]) - min($pixels1["red"], $pixels2["red"]);
                  $diff[$x][$y]["green"] = max($pixels1["green"], $pixels2["green"]) - min($pixels1["green"], $pixels2["green"]);
                  $diff[$x][$y]["blue"] = max($pixels1["blue"], $pixels2["blue"]) - min($pixels1["blue"], $pixels2["blue"]);
                  $diff[$x][$y]["alpha"] = max($pixels1["alpha"], $pixels2["alpha"]) - min($pixels1["alpha"], $pixels2["alpha"]);
               }

               $pixelsDiffCount++;
            }
         }
      }

      for ($i = 0; $i < $size[0]; ++$i) {  //$size[0];
         for ($j = 0; $j < $size[1]; ++$j) {   //$size[1]
            $colorOfPixel = imagecolorallocatealpha($diffImage, $diff[$i][$j]["red"], $diff[$i][$j]["green"], $diff[$i][$j]["blue"], $diff[$i][$j]["alpha"]);
            imagesetpixel($diffImage, $i, $j, $colorOfPixel);
         }
      }

      $pixelsDiffInPercent = ($pixelsDiffCount / $pixelsTotalCount) * 100;
      $this->template->percents = number_format($pixelsDiffInPercent, 2);

      imagepng($diffImage, $this->wwwDir.'/diff.png');
      imagedestroy($diffImage);
   }


   /**
    * You must be logged in for do this
    */
   public function isLoggedIn()
   {
      if (!$this->getUser()->isLoggedIn()) {
         $this->redirect(self::LOGIN_REDIRECT);
      }
   }


   /**
    * Shoot id validator
    * @param $id
    */
   public function validateShootId($id)
   {
      if (!Validators::isNumericInt($id)) {
         $this->error();
      }
      $exist = $this->stm->existShootById($id);
      if (!$exist) {
         $this->error();
      }
   }


   /**
    * Switching between shoots view
    * @param $view
    */
   public function handleChangeView($view)
   {
      $this->view = $view;
      $this->sm->setShootView($view);

      if ($this->isAjax()) {
         $this->redrawControl('changeView');
      } else {
         $this->redirect('this');
      }
   }


   /**
    * Switching between compare result color
    * @param $color
    */
   public function handleChangeColor($color)
   {
      $this->color = $color;
      $this->sm->setResultColor($color);

      if ($this->isAjax()) {
         $this->redrawControl('changeResult');
      } else {
         $this->redirect('this');
      }
   }


   /**
    * Switching between compare result background
    * @param $background
    */
   public function handleChangeBackground($background)
   {
      $this->background = $background;
      $this->sm->setResultBackground($background);

      if ($this->isAjax()) {
         $this->redrawControl('changeResult');
      } else {
         $this->redirect('this');
      }
   }


   /**
    * Download shoot from server
    * @param Integer $id
    */
   public function handleDownload($id)
   {
      $shoot = $this->stm->getShootById($id);
      $this->sendResponse(new FileResponse($this->wwwDir . $shoot->path_img));
   }


   /**
    * Delete shoot
    * @param Integer $id
    */
   public function handleDelete($id)
   {
      $shoot = $this->stm->getShootById($id);
      $fullPathShoot = $this->wwwDir . $shoot->path_img;
      $fullPathJS = $this->wwwDir . $shoot->path_js;

      // delete shoot from server
      FileSystem::delete($fullPathShoot);
      FileSystem::delete($fullPathJS);

      // delete shoot from DB
      $this->stm->deleteShoot($id);
      $this->redirect('this');
   }

}

