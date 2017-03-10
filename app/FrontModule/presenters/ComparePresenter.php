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

   /** @var Model\ResultManager */
   private $rm;

   /** @var Forms\ResultToleranceFormFactory @inject */
   public $resultToleranceFactory;

   /** @var Forms\ResultIgnoreFormFactory @inject */
   public $resultIgnoreFactory;


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

   /**
    * TOLERANCE
    */
   private $tolerance = self::DEFAULT_TOLERANCE;

   /**
    * IGNORE
    */
   private $ignoreActive = FALSE;
   private $ignore = NULL;

   private $sourceSize;

   private $wwwDir;
   private $resultDir;


   public function __construct(Model\SessionManager $sm, Model\DeviceManager $dm, Model\ShootManager $stm, Model\ResultManager $rm)
   {
      $this->sm = $sm;
      $this->dm = $dm;
      $this->stm = $stm;
      $this->rm = $rm;
   }


   public function startup()
   {
      parent::startup();

      $ds = DIRECTORY_SEPARATOR;
      $ds2 = '/';
      $this->wwwDir = $this->context->parameters['wwwDir'] . $ds;
      $this->resultDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_RESULTS . $ds;

      $sessionColor = $this->sm->getResultColor();
      $this->color = ($sessionColor == FALSE) ? $this->color : $sessionColor;

      $sessionBackground = $this->sm->getResultBackground();
      $this->background = ($sessionBackground == FALSE) ? $this->background : $sessionBackground;

      $sessionTolerance = $this->sm->getResultTolerance();
      $this->tolerance = ($sessionTolerance == FALSE) ? $this->tolerance : $sessionTolerance;

      $sessionIgnoreActive = $this->sm->getResultIgnoreActive();
      $this->ignoreActive = ($sessionIgnoreActive == FALSE) ? $this->ignoreActive : $sessionIgnoreActive;

      $sessionIgnore = $this->sm->getResultIgnore();
      $this->ignore = ($sessionIgnore == FALSE) ? $this->ignore : $sessionIgnore;
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


   /**
    * Create image from file
    * @param $shoot
    * @return null|resource
    */
   public function imageCreate($shoot)
   {
      $image = null;

      if ($shoot->img_type == self::IMAGE_JPG) {
         $image = imagecreatefromjpeg($this->wwwDir . $shoot->path_img);

      } elseif ($shoot->img_type == self::IMAGE_PNG) {
         $image = imagecreatefrompng($this->wwwDir . $shoot->path_img);

      }

      return $image;
   }


   /**
    * Get size from image
    * @param $shoot
    * @return array
    */
   public function imageSize($shoot)
   {
      return getimagesize($this->wwwDir . $shoot->path_img);
   }


   public function renderResult($sourceId, $targetId)
   {
      $this->isLoggedIn();
      $this->validateShootId($sourceId);
      $this->validateShootId($targetId);

      $this->template->isLoggedIn = $this->user->isLoggedIn();
      $this->template->source = $source = $this->stm->getShootById($sourceId);
      $this->template->target = $target = $this->stm->getShootById($targetId);

      /**
       * Generate image comparison by settings
       */
      $image1 = $this->imageCreate($source);
      $image2 = $this->imageCreate($target);

      $diff = [];
      $diffImage = $image1;
      $this->sourceSize = $this->imageSize($source);

      $pixelsDiffInPercent = 0;
      $pixelsDiffCount = 0;
      $pixelsTotalCount = $this->sourceSize[0] * $this->sourceSize[1];

      for ($x = 0; $x < $this->sourceSize[0]; $x++) {
         for ($y = 0; $y < $this->sourceSize[1]; $y++) {
            $rgb1 = imagecolorat($image1, $x, $y);
            $rgb2 = imagecolorat($image2, $x, $y);
            $pixels1 = imagecolorsforindex($image1, $rgb1);
            $pixels2 = imagecolorsforindex($image2, $rgb2);


            if ($this->ignoreActive) {
               if (
                  $x >= $this->ignore['left'] and $x <= $this->ignore['width'] and
                  $y >= $this->ignore['top'] and $y <= $this->ignore['height']
               ) {

                  if ($this->background == self::BACKGROUND_1) {
                     $diff[$x][$y]['red'] = $pixels1['red'];
                     $diff[$x][$y]['green'] = $pixels1['green'];
                     $diff[$x][$y]['blue'] = $pixels1['blue'];
                     $diff[$x][$y]['alpha'] = $pixels1['alpha'];

                  } elseif ($this->background == self::BACKGROUND_2) {
                     $diff[$x][$y]['red'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                     $diff[$x][$y]['green'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                     $diff[$x][$y]['blue'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                     $diff[$x][$y]['alpha'] = 1;

                  } elseif ($this->background == self::BACKGROUND_3) {
                     $diff[$x][$y]['red'] = 255;
                     $diff[$x][$y]['green'] = 255;
                     $diff[$x][$y]['blue'] = 255;
                     $diff[$x][$y]['alpha'] = 1;

                  } elseif ($this->background == self::BACKGROUND_4) {
                     $diff[$x][$y]['red'] = 0;
                     $diff[$x][$y]['green'] = 0;
                     $diff[$x][$y]['blue'] = 0;
                     $diff[$x][$y]['alpha'] = 1;
                  }

               } else {

                  if (
                     (abs(($pixels1['red'] - $pixels2['red'])) / 255 * 100) <= $this->tolerance and
                     (abs(($pixels1['green'] - $pixels2['green'])) / 255 * 100) <= $this->tolerance and
                     (abs(($pixels1['blue'] - $pixels2['blue'])) / 255 * 100) <= $this->tolerance and
                     (abs(($pixels1['alpha'] - $pixels2['alpha'])) / 255 * 100) <= $this->tolerance
                  ) {

                     if ($this->background == self::BACKGROUND_1) {
                        $diff[$x][$y]['red'] = $pixels1['red'];
                        $diff[$x][$y]['green'] = $pixels1['green'];
                        $diff[$x][$y]['blue'] = $pixels1['blue'];
                        $diff[$x][$y]['alpha'] = 1;

                     } elseif ($this->background == self::BACKGROUND_2) {
                        $diff[$x][$y]['red'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                        $diff[$x][$y]['green'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                        $diff[$x][$y]['blue'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                        $diff[$x][$y]['alpha'] = 1;

                     } elseif ($this->background == self::BACKGROUND_3) {
                        $diff[$x][$y]['red'] = 255;
                        $diff[$x][$y]['green'] = 255;
                        $diff[$x][$y]['blue'] = 255;
                        $diff[$x][$y]['alpha'] = 1;

                     } elseif ($this->background == self::BACKGROUND_4) {
                        $diff[$x][$y]['red'] = 0;
                        $diff[$x][$y]['green'] = 0;
                        $diff[$x][$y]['blue'] = 0;
                        $diff[$x][$y]['alpha'] = 1;
                     }

                  } else {

                     // red
                     if ($this->color == self::COLOR_1) {
                        $diff[$x][$y]['red'] = 255;
                        $diff[$x][$y]['green'] = 0;
                        $diff[$x][$y]['blue'] = 0;
                        $diff[$x][$y]['alpha'] = 1;

                        // green
                     } else if ($this->color == self::COLOR_2) {
                        $diff[$x][$y]['red'] = 0;
                        $diff[$x][$y]['green'] = 200;
                        $diff[$x][$y]['blue'] = 0;
                        $diff[$x][$y]['alpha'] = 1;

                        // blue
                     } elseif ($this->color == self::COLOR_3) {
                        $diff[$x][$y]['red'] = 0;
                        $diff[$x][$y]['green'] = 127;
                        $diff[$x][$y]['blue'] = 255;
                        $diff[$x][$y]['alpha'] = 1;

                        // yellow
                     } elseif ($this->color == self::COLOR_4) {
                        $diff[$x][$y]['red'] = 230;
                        $diff[$x][$y]['green'] = 230;
                        $diff[$x][$y]['blue'] = 0;
                        $diff[$x][$y]['alpha'] = 1;

                     } else {
                        $diff[$x][$y]['red'] = max($pixels1['red'], $pixels2['red']) - min($pixels1['red'], $pixels2['red']);
                        $diff[$x][$y]['green'] = max($pixels1['green'], $pixels2['green']) - min($pixels1['green'], $pixels2['green']);
                        $diff[$x][$y]['blue'] = max($pixels1['blue'], $pixels2['blue']) - min($pixels1['blue'], $pixels2['blue']);
                        $diff[$x][$y]['alpha'] = max($pixels1['alpha'], $pixels2['alpha']) - min($pixels1['alpha'], $pixels2['alpha']);
                     }

                     $pixelsDiffCount++;
                  }


               }

            } else {

               if (
                  (abs(($pixels1['red'] - $pixels2['red'])) / 255 * 100) <= $this->tolerance and
                  (abs(($pixels1['green'] - $pixels2['green'])) / 255 * 100) <= $this->tolerance and
                  (abs(($pixels1['blue'] - $pixels2['blue'])) / 255 * 100) <= $this->tolerance and
                  (abs(($pixels1['alpha'] - $pixels2['alpha'])) / 255 * 100) <= $this->tolerance
               ) {

                  if ($this->background == self::BACKGROUND_1) {
                     $diff[$x][$y]['red'] = $pixels1['red'];
                     $diff[$x][$y]['green'] = $pixels1['green'];
                     $diff[$x][$y]['blue'] = $pixels1['blue'];
                     $diff[$x][$y]['alpha'] = 1;

                  } elseif ($this->background == self::BACKGROUND_2) {
                     $diff[$x][$y]['red'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                     $diff[$x][$y]['green'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                     $diff[$x][$y]['blue'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                     $diff[$x][$y]['alpha'] = 1;

                  } elseif ($this->background == self::BACKGROUND_3) {
                     $diff[$x][$y]['red'] = 255;
                     $diff[$x][$y]['green'] = 255;
                     $diff[$x][$y]['blue'] = 255;
                     $diff[$x][$y]['alpha'] = 1;

                  } elseif ($this->background == self::BACKGROUND_4) {
                     $diff[$x][$y]['red'] = 0;
                     $diff[$x][$y]['green'] = 0;
                     $diff[$x][$y]['blue'] = 0;
                     $diff[$x][$y]['alpha'] = 1;
                  }

               } else {

                  // red
                  if ($this->color == self::COLOR_1) {
                     $diff[$x][$y]['red'] = 255;
                     $diff[$x][$y]['green'] = 0;
                     $diff[$x][$y]['blue'] = 0;
                     $diff[$x][$y]['alpha'] = 1;

                     // green
                  } else if ($this->color == self::COLOR_2) {
                     $diff[$x][$y]['red'] = 0;
                     $diff[$x][$y]['green'] = 200;
                     $diff[$x][$y]['blue'] = 0;
                     $diff[$x][$y]['alpha'] = 1;

                     // blue
                  } elseif ($this->color == self::COLOR_3) {
                     $diff[$x][$y]['red'] = 0;
                     $diff[$x][$y]['green'] = 127;
                     $diff[$x][$y]['blue'] = 255;
                     $diff[$x][$y]['alpha'] = 1;

                     // yellow
                  } elseif ($this->color == self::COLOR_4) {
                     $diff[$x][$y]['red'] = 230;
                     $diff[$x][$y]['green'] = 230;
                     $diff[$x][$y]['blue'] = 0;
                     $diff[$x][$y]['alpha'] = 1;

                  } else {
                     $diff[$x][$y]['red'] = max($pixels1['red'], $pixels2['red']) - min($pixels1['red'], $pixels2['red']);
                     $diff[$x][$y]['green'] = max($pixels1['green'], $pixels2['green']) - min($pixels1['green'], $pixels2['green']);
                     $diff[$x][$y]['blue'] = max($pixels1['blue'], $pixels2['blue']) - min($pixels1['blue'], $pixels2['blue']);
                     $diff[$x][$y]['alpha'] = max($pixels1['alpha'], $pixels2['alpha']) - min($pixels1['alpha'], $pixels2['alpha']);
                  }

                  $pixelsDiffCount++;
               }


            }
         }
      }

      for ($i = 0; $i < $this->sourceSize[0]; ++$i) {
         for ($j = 0; $j < $this->sourceSize[1]; ++$j) {
            $colorOfPixel = imagecolorallocatealpha($diffImage, $diff[$i][$j]['red'], $diff[$i][$j]['green'], $diff[$i][$j]['blue'], $diff[$i][$j]['alpha']);
            imagesetpixel($diffImage, $i, $j, $colorOfPixel);
         }
      }

      $pixelsDiffInPercent = ($pixelsDiffCount / $pixelsTotalCount) * 100;
      $difference = number_format($pixelsDiffInPercent, 2);

      /**
       * Save result to Server and DB
       */
      $sourcePath = explode('/', $source->path_img);
      $resultPath = '/WS/results/' . $sourcePath[3];
      $this->rm->addResult(
         $source->id_shoot,
         $target->id_shoot,
         $this->color,
         $this->background,
         $this->tolerance,
         $difference,
         $this->ignoreActive,
         $this->ignore['top'],
         $this->ignore['left'],
         $this->ignore['width'],
         $this->ignore['height'],
         $resultPath
      );

      imagepng($diffImage, $this->wwwDir . $resultPath);
      imagedestroy($diffImage);

      /**
       * Templates
       */
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

      $this->template->tolerance = $this->tolerance;
      $this->template->difference = $difference;
      $this->template->result = $resultPath;
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
         $this->flashMessage('Result color was changed.', self::FLASH_MESSAGE_SUCCESS);
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
         $this->flashMessage('Result background color was changed.', self::FLASH_MESSAGE_SUCCESS);
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
    * Download result from server
    * @param $source
    * @param $target
    */
   public function handleDownloadResult($source, $target)
   {
      $result = $this->rm->getResult($source, $target);
      $this->sendResponse(new FileResponse($this->wwwDir . $result->path_img));
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

      $this->flashMessage('Shoot was deleted.', self::FLASH_MESSAGE_SUCCESS);
      $this->redirect('this');
   }


   /**
    * Set result tolerance form factory.
    * @return Nette\Application\UI\Form
    */
   protected function createComponentResultToleranceForm()
   {
      $this->resultToleranceFactory->setDefaultTolerance(self::DEFAULT_TOLERANCE);

      return $this->resultToleranceFactory->create(function () {
         $this->flashMessage('Result tolerance was changed.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('this');
      });
   }


   /**
    * Set ignore part form factory
    * @return Nette\Application\UI\Form
    */
   protected function createComponentResultIgnoreForm()
   {
      $this->resultIgnoreFactory->setSourceSize($this->sourceSize);

      return $this->resultIgnoreFactory->create(function () {
         $this->flashMessage('Ignore part was changed.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('this');
      });
   }
}