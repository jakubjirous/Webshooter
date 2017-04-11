<?php

namespace App\CliModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Presenters\ShootAdd;
use App\FrontModule\Presenters\UserAgentParser;
use Nette\Utils\Strings;
use Nette\Utils\DateTime;


class CliPresenter extends BasePresenter
{

   /** @var Model\SessionManager */
   private $sm;

   /** @var Model\ShootManager */
   private $stm;

   /** @var Model\ResultManager */
   private $rm;

   /** @var Model\PlanManager */
   private $pm;

   /** @var Model\PlanTargetManager */
   private $ptm;

   /** @var Model\PlanResultManager */
   private $prm;

   /** @var ShootAdd */
   private $sa;


   /**
    * PATHS
    */
   private $wwwDir;
   private $wwwBinDir;
   private $wwwJsDir;
   private $wwwShootsDir;
   private $wwwResultsDir;
   private $wwwPlansDir;
   private $wwwPlansTargetsDir;
   private $wwwPlansResultsDir;

   private $binDir;
   private $jsDir;
   private $shootsDir;
   private $resultsDir;
   private $plansDir;
   private $plansTargetsDir;
   private $plansResultsDir;

   private $path;
   private $browserName;
   private $browserVersion;


   public function __construct(Model\SessionManager $sm, Model\ShootManager $stm, Model\ResultManager $rm, Model\PlanManager $pm, Model\PlanTargetManager $ptm, Model\PlanResultManager $prm)
   {
      $this->sm = $sm;
      $this->stm = $stm;
      $this->rm = $rm;
      $this->pm = $pm;
      $this->ptm = $ptm;
      $this->prm = $prm;

      $this->browserName = 'Webshooter Cron';
      $this->browserVersion = '';
   }


   public function startup()
   {
      parent::startup();

      $ds = DIRECTORY_SEPARATOR;
      $ds2 = '/';
      $this->wwwDir = $this->context->parameters['wwwDir'] . $ds;
      $this->wwwBinDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_BIN . $ds;
      $this->wwwJsDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_JS . $ds;
      $this->wwwShootsDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_SHOOTS . $ds;
      $this->wwwResultsDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_RESULTS . $ds;
      $this->wwwPlansDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_PLANS . $ds;
      $this->wwwPlansTargetsDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_PLANS . $ds . self::DIR_TARGETS . $ds;
      $this->wwwPlansResultsDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_PLANS . $ds . self::DIR_RESULTS . $ds;

      $this->binDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_BIN . $ds2;
      $this->jsDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_JS . $ds2;
      $this->shootsDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_SHOOTS . $ds2;
      $this->resultsDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_RESULTS . $ds2;
      $this->plansDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_PLANS . $ds2;
      $this->plansTargetsDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_PLANS . $ds2 . self::DIR_TARGETS . $ds2;
      $this->plansResultsDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_PLANS . $ds2 . self::DIR_RESULTS . $ds2;

      $this->path = [
         'wwwDir' => $this->wwwDir,
         'wwwBinDir' => $this->wwwBinDir,
         'wwwJsDir' => $this->wwwJsDir,
         'wwwShootsDir' => $this->wwwShootsDir,
         'wwwResultsDir' => $this->wwwResultsDir,
         'wwwPlansDir' => $this->wwwPlansDir,
         'wwwPlansTargetsDir' => $this->wwwPlansTargetsDir,
         'wwwPlansResultsDir' => $this->wwwPlansResultsDir,
         'binDir' => $this->binDir,
         'jsDir' => $this->jsDir,
         'shootsDir' => $this->shootsDir,
         'resultsDir' => $this->resultsDir,
         'plansDir' => $this->plansDir,
         'plansTargetsDir' => $this->plansTargetsDir,
         'plansResultsDir' => $this->plansResultsDir,
      ];
   }


   public function actionCron()
   {
      $plans = $this->pm->getAllPlansForTerminate(
         self::REPEATE_START_DAILY,
         self::REPEATE_START_WEEKLY,
         self::REPEATE_START_MONTHLY,
         self::REPEATE_START_YEARLY,
         self::REPEATE_END_NEVER,
         self::REPEATE_END_OCCURRENCES,
         self::REPEATE_END_DATE
      );


      echo 'WEBSHOOTER Cli ('.sizeof($plans).' shoots): ';

      $index = 1;
      foreach ($plans as $plan) {
         $source = $this->stm->getShootById($plan->id_source);
         $target = $this->stm->getShootById($plan->id_target);

         /**
          * Create new target shoot from source
          */
         $planTarget = $this->createTargetFromSource($target, $plan);

         /**
          * Create comparision from source and plan target shoots
          */
         $planResult = $this->compareSourceWithTargetByPlan($target, $planTarget, $plan);

         /**
          * Sending e-mail with results
          */
         $planDifference = $plan->difference;
         $planDifferenceResult = $planResult->difference_result;
         if($planDifferenceResult > $planDifference) {
            $this->sendEmail($source, $plan, $planTarget, $planResult);
         }

         echo 'Shoot ['. $index .'] DONE';
         echo '   |   ';

         $index ++;
      }

      $this->terminate();
   }


   /**
    * Create target shoot from source shoot defined in comparison plan
    * @param $source
    * @param $plan
    * @return bool|mixed|Nette\Database\IRow|Nette\Database\Table\IRow
    */
   public function createTargetFromSource($source, $plan)
   {
      $this->sa = new ShootAdd(
         $this->path,
         self::IMAGE_JPG,
         self::IMAGE_PNG,
         self::RENDER_TO_PLANS_TARGETS,
         self::RENDER_TO_SHOOTS,
         self::RENDER_TO_PLANS_TARGETS
      );

      $userID = $plan->id_user;

      $engine = $source->engine;
      $imgType = $source->img_type;
      $deviceID = $source->id_device;
      $deviceType = $source->device->id_type;

      $date = new DateTime();
      $timestamp = $date->getTimestamp();
      $authorityUrl = $source->url_autority;
      $absoluteUrlDB = $source->url;

      // other params
      $otherWidth = ($source->other_width == null) ? null : $source->other_width;
      $otherHeight = ($source->other_height == null) ? null : $source->other_height;

      // crop params
      $cropViewportWidth = $source->crop_viewport_width;
      $cropViewportHeight = $source->crop_viewport_height;
      $cropTop = $source->crop_top;
      $cropLeft = $source->crop_left;
      $cropWidth = $source->crop_width;
      $cropHeight = $source->crop_height;

      $filenameShoot = '';
      $filenameJS = '';


      /* MOBILE, TABLET, LAPTOP, DESKTOP TYPES */
      if ($deviceType === self::TYPE_MOBILE or
         $deviceType === self::TYPE_TABLET or
         $deviceType === self::TYPE_LAPTOP or
         $deviceType === self::TYPE_DESKTOP
      ) {

         $width = intval(round(($source->device->width_px / $source->device->density), 0));
         $height = intval(round(($source->device->height_px / $source->device->density), 0));
         $filenameShoot = $timestamp . '-' . $authorityUrl . '-' . Strings::webalize($source->device->device) . '-' . $width . 'x' . $height . '.' . $imgType;
         $filenameJS = $timestamp . '-' . $authorityUrl . '-' . Strings::webalize($source->device->device) . '-' . $width . 'x' . $height . '.js';

         if ($engine === self::WEBKIT) {
            $this->sa->devicePhantomJS(
               $absoluteUrlDB,
               $filenameShoot,
               $filenameJS,
               $width,
               $height,
               $imgType
            );
         } else if ($engine === self::GECKO) {
            $this->sa->deviceSlimerJS(
               $absoluteUrlDB,
               $filenameShoot,
               $filenameJS,
               $width,
               $height,
               $imgType
            );
         }


         /* OTHER TYPE */
      } else if ($deviceType === self::TYPE_OTHER) {
         if ($otherHeight === null) {
            $filenameShoot = $timestamp . '-' . $authorityUrl . '-other-' . $otherWidth . 'xMAX.' . $imgType;
            $filenameJS = $timestamp . '-' . $authorityUrl . '-other-' . $otherWidth . 'xMAX.js';
         } else {
            $filenameShoot = $timestamp . '-' . $authorityUrl . '-other-' . $otherWidth . 'x' . $otherHeight . '.' . $imgType;
            $filenameJS = $timestamp . '-' . $authorityUrl . '-other-' . $otherWidth . 'x' . $otherHeight . '.js';
         }

         if ($engine === self::WEBKIT) {
            $this->sa->devicePhantomJS(
               $absoluteUrlDB,
               $filenameShoot,
               $filenameJS,
               $otherWidth,
               $otherHeight,
               $imgType
            );
         } else if ($engine === self::GECKO) {
            $this->sa->deviceSlimerJS(
               $absoluteUrlDB,
               $filenameShoot,
               $filenameJS,
               $otherWidth,
               $otherHeight,
               $imgType
            );
         }


         /* CROP TYPE */
      } else if ($deviceType === self::TYPE_CROP) {
         $filenameShoot = $timestamp . '-' . $authorityUrl . '-' . $cropWidth . 'x' . $cropHeight . '-crop.' . $imgType;
         $filenameJS = $timestamp . '-' . $authorityUrl . '-' . $cropWidth . 'x' . $cropHeight . '-crop.js';

         if ($engine === self::WEBKIT) {
            $this->sa->cropPhantomJS(
               $absoluteUrlDB,
               $filenameShoot,
               $filenameJS,
               $cropViewportWidth,
               $cropViewportHeight,
               $cropTop,
               $cropLeft,
               $cropWidth,
               $cropHeight,
               $imgType
            );
         } else if ($engine === self::GECKO) {
            $this->sa->cropSlimerJS(
               $absoluteUrlDB,
               $filenameShoot,
               $filenameJS,
               $cropViewportWidth,
               $cropViewportHeight,
               $cropTop,
               $cropLeft,
               $cropWidth,
               $cropHeight,
               $imgType
            );
         }
      }

      /**
       * Add plan target to DB
       */
      $this->ptm->addTarget(
         $userID,
         $deviceID,
         $date->__toString(),
         $engine,
         $this->browserName,
         $this->browserVersion,
         $absoluteUrlDB,
         $authorityUrl,
         $imgType,
         'image/' . $imgType,
         $this->path['plansTargetsDir'] . $filenameShoot,
         $this->path['jsDir'] . $filenameJS,
         $otherWidth = ($otherWidth == null) ? null : $otherWidth,
         $otherHeight = ($otherHeight == null) ? null : $otherHeight,
         $cropViewportWidth = ($cropViewportWidth == null) ? null : $cropViewportWidth,
         $cropViewportHeight = ($cropViewportHeight == null) ? null : $cropViewportHeight,
         $cropTop = ($cropTop == null) ? null : $cropTop,
         $cropLeft = ($cropLeft == null) ? null : $cropLeft,
         $cropWidth = ($cropWidth == null) ? null : $cropWidth,
         $cropHeight = ($cropHeight == null) ? null : $cropHeight
      );

      $target = $this->ptm->getLastTarget($userID, $deviceID, $date->__toString());

      return $target;
   }


   /**
    * Compare source shoot with target shoot created from copmarison plan
    * @param $source
    * @param $target
    * @param $plan
    * @return bool|mixed|Nette\Database\IRow|Nette\Database\Table\IRow
    */
   public function compareSourceWithTargetByPlan($source, $target, $plan)
   {
      if ($source != FALSE and $target != FALSE) {

         $image1 = $this->imageCreate($source);
         $image2 = $this->imageCreate($target);

         $diff = [];
         $diffImage = $image1;
         $size = $this->imageSize($source);

         $pixelsDiffCount = 0;
         $pixelsTotalCount = $size[0] * $size[1];

         for ($x = 0; $x < $size[0]; $x++) {
            for ($y = 0; $y < $size[1]; $y++) {
               $rgb1 = imagecolorat($image1, $x, $y);
               $rgb2 = imagecolorat($image2, $x, $y);
               $pixels1 = imagecolorsforindex($image1, $rgb1);
               $pixels2 = imagecolorsforindex($image2, $rgb2);

               if ($plan->ignore_active) {
                  if (
                     $x >= $plan->ignore_left and $x <= $plan->ignore_width and
                     $y >= $plan->ignore_top and $y <= $plan->ignore_height
                  ) {

                     if ($plan->background == self::BACKGROUND_1) {
                        $diff[$x][$y]['red'] = $pixels1['red'];
                        $diff[$x][$y]['green'] = $pixels1['green'];
                        $diff[$x][$y]['blue'] = $pixels1['blue'];
                        $diff[$x][$y]['alpha'] = $pixels1['alpha'];

                     } elseif ($plan->background == self::BACKGROUND_2) {
                        $diff[$x][$y]['red'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                        $diff[$x][$y]['green'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                        $diff[$x][$y]['blue'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                        $diff[$x][$y]['alpha'] = 1;

                     } elseif ($plan->background == self::BACKGROUND_3) {
                        $diff[$x][$y]['red'] = 255;
                        $diff[$x][$y]['green'] = 255;
                        $diff[$x][$y]['blue'] = 255;
                        $diff[$x][$y]['alpha'] = 1;

                     } elseif ($plan->background == self::BACKGROUND_4) {
                        $diff[$x][$y]['red'] = 0;
                        $diff[$x][$y]['green'] = 0;
                        $diff[$x][$y]['blue'] = 0;
                        $diff[$x][$y]['alpha'] = 1;
                     }

                  } else {

                     if (
                        (abs(($pixels1['red'] - $pixels2['red'])) / 255 * 100) <= $plan->tolerance and
                        (abs(($pixels1['green'] - $pixels2['green'])) / 255 * 100) <= $plan->tolerance and
                        (abs(($pixels1['blue'] - $pixels2['blue'])) / 255 * 100) <= $plan->tolerance and
                        (abs(($pixels1['alpha'] - $pixels2['alpha'])) / 255 * 100) <= $plan->tolerance
                     ) {

                        if ($plan->background == self::BACKGROUND_1) {
                           $diff[$x][$y]['red'] = $pixels1['red'];
                           $diff[$x][$y]['green'] = $pixels1['green'];
                           $diff[$x][$y]['blue'] = $pixels1['blue'];
                           $diff[$x][$y]['alpha'] = 1;

                        } elseif ($plan->background == self::BACKGROUND_2) {
                           $diff[$x][$y]['red'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                           $diff[$x][$y]['green'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                           $diff[$x][$y]['blue'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                           $diff[$x][$y]['alpha'] = 1;

                        } elseif ($plan->background == self::BACKGROUND_3) {
                           $diff[$x][$y]['red'] = 255;
                           $diff[$x][$y]['green'] = 255;
                           $diff[$x][$y]['blue'] = 255;
                           $diff[$x][$y]['alpha'] = 1;

                        } elseif ($plan->background == self::BACKGROUND_4) {
                           $diff[$x][$y]['red'] = 0;
                           $diff[$x][$y]['green'] = 0;
                           $diff[$x][$y]['blue'] = 0;
                           $diff[$x][$y]['alpha'] = 1;
                        }

                     } else {

                        // red
                        if ($plan->color == self::COLOR_1) {
                           $diff[$x][$y]['red'] = 255;
                           $diff[$x][$y]['green'] = 0;
                           $diff[$x][$y]['blue'] = 0;
                           $diff[$x][$y]['alpha'] = 1;

                           // green
                        } else if ($plan->color == self::COLOR_2) {
                           $diff[$x][$y]['red'] = 0;
                           $diff[$x][$y]['green'] = 200;
                           $diff[$x][$y]['blue'] = 0;
                           $diff[$x][$y]['alpha'] = 1;

                           // blue
                        } elseif ($plan->color == self::COLOR_3) {
                           $diff[$x][$y]['red'] = 0;
                           $diff[$x][$y]['green'] = 127;
                           $diff[$x][$y]['blue'] = 255;
                           $diff[$x][$y]['alpha'] = 1;

                           // yellow
                        } elseif ($plan->color == self::COLOR_4) {
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
                     (abs(($pixels1['red'] - $pixels2['red'])) / 255 * 100) <= $plan->tolerance and
                     (abs(($pixels1['green'] - $pixels2['green'])) / 255 * 100) <= $plan->tolerance and
                     (abs(($pixels1['blue'] - $pixels2['blue'])) / 255 * 100) <= $plan->tolerance and
                     (abs(($pixels1['alpha'] - $pixels2['alpha'])) / 255 * 100) <= $plan->tolerance
                  ) {

                     if ($plan->background == self::BACKGROUND_1) {
                        $diff[$x][$y]['red'] = $pixels1['red'];
                        $diff[$x][$y]['green'] = $pixels1['green'];
                        $diff[$x][$y]['blue'] = $pixels1['blue'];
                        $diff[$x][$y]['alpha'] = 1;

                     } elseif ($plan->background == self::BACKGROUND_2) {
                        $diff[$x][$y]['red'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                        $diff[$x][$y]['green'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                        $diff[$x][$y]['blue'] = ($pixels1['red'] + $pixels1['green'] + $pixels1['blue']) / 3;
                        $diff[$x][$y]['alpha'] = 1;

                     } elseif ($plan->background == self::BACKGROUND_3) {
                        $diff[$x][$y]['red'] = 255;
                        $diff[$x][$y]['green'] = 255;
                        $diff[$x][$y]['blue'] = 255;
                        $diff[$x][$y]['alpha'] = 1;

                     } elseif ($plan->background == self::BACKGROUND_4) {
                        $diff[$x][$y]['red'] = 0;
                        $diff[$x][$y]['green'] = 0;
                        $diff[$x][$y]['blue'] = 0;
                        $diff[$x][$y]['alpha'] = 1;
                     }

                  } else {

                     // red
                     if ($plan->color == self::COLOR_1) {
                        $diff[$x][$y]['red'] = 255;
                        $diff[$x][$y]['green'] = 0;
                        $diff[$x][$y]['blue'] = 0;
                        $diff[$x][$y]['alpha'] = 1;

                        // green
                     } else if ($plan->color == self::COLOR_2) {
                        $diff[$x][$y]['red'] = 0;
                        $diff[$x][$y]['green'] = 200;
                        $diff[$x][$y]['blue'] = 0;
                        $diff[$x][$y]['alpha'] = 1;

                        // blue
                     } elseif ($plan->color == self::COLOR_3) {
                        $diff[$x][$y]['red'] = 0;
                        $diff[$x][$y]['green'] = 127;
                        $diff[$x][$y]['blue'] = 255;
                        $diff[$x][$y]['alpha'] = 1;

                        // yellow
                     } elseif ($plan->color == self::COLOR_4) {
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

         for ($i = 0; $i < $size[0]; ++$i) {
            for ($j = 0; $j < $size[1]; ++$j) {
               $colorOfPixel = imagecolorallocatealpha($diffImage, $diff[$i][$j]['red'], $diff[$i][$j]['green'], $diff[$i][$j]['blue'], $diff[$i][$j]['alpha']);
               imagesetpixel($diffImage, $i, $j, $colorOfPixel);
            }
         }

         $pixelsDiffInPercent = ($pixelsDiffCount / $pixelsTotalCount) * 100;
         $difference = number_format($pixelsDiffInPercent, 2);


         /**
          * Add plan result to DB
          */
         $resultPath = '';
         $deviceType = $source->device->id_type;
         $date = new DateTime();
         $timestamp = $date->getTimestamp();
         $autority = $source->url_autority;
         $imgType = $source->img_type;

         if ($deviceType === self::TYPE_MOBILE or
            $deviceType === self::TYPE_TABLET or
            $deviceType === self::TYPE_LAPTOP or
            $deviceType === self::TYPE_DESKTOP
         ) {
            $width = intval(round(($source->device->width_px / $source->device->density), 0));
            $height = intval(round(($source->device->height_px / $source->device->density), 0));
            $resultPath = $timestamp . '-' . $autority . '-' . Strings::webalize($source->device->device) . '-' . $width . 'x' . $height . '.' . $imgType;

         } elseif ($deviceType === self::TYPE_OTHER) {
            $otherWidth = ($source->other_width == null) ? null : $source->other_width;
            $otherHeight = ($source->other_height == null) ? null : $source->other_height;

            if ($otherHeight === null) {
               $resultPath = $timestamp . '-' . $autority . '-other-' . $otherWidth . 'xMAX.' . $imgType;
            } else {
               $resultPath = $timestamp . '-' . $autority . '-other-' . $otherWidth . 'x' . $otherHeight . '.' . $imgType;
            }

         } elseif ($deviceType === self::TYPE_CROP) {
            $cropWidth = $source->crop_width;
            $cropHeight = $source->crop_height;
            $resultPath = $timestamp . '-' . $autority . '-' . $cropWidth . 'x' . $cropHeight . '-crop.' . $imgType;
         }

         $this->prm->addResult(
            $source->id_shoot,
            $target->id_plan_target,
            $plan->id_plan,
            $plan->color,
            $plan->background,
            $plan->tolerance,
            $plan->difference,
            $difference,
            $plan->ignore_active,
            $plan->ignore_top,
            $plan->ignore_left,
            $plan->ignore_width,
            $plan->ignore_height,
            $this->plansResultsDir . $resultPath,
            $date
         );

         imagepng($diffImage, $this->wwwDir . $this->plansResultsDir . $resultPath);
         imagedestroy($diffImage);

         $result = $this->prm->getLastResult($source->id_shoot, $target->id_plan_target, $plan->id_plan, $date);

         return $result;
      }
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


   /**
    * Sending email
    * @param $source
    * @param $plan
    * @param $planTarget
    * @param $planResult
    */
   public function sendEmail($source, $plan, $planTarget, $planResult)
   {
      $email = new \Email(
         self::EMAIL_WEBSHOOTER_FULL,
         $source,
         $plan,
         $planTarget,
         $planResult,
         $this->wwwDir,
         self::REPEATE_START_DAILY,
         self::REPEATE_START_WEEKLY,
         self::REPEATE_START_MONTHLY,
         self::REPEATE_START_YEARLY,
         self::REPEATE_END_NEVER,
         self::REPEATE_END_OCCURRENCES,
         self::REPEATE_END_DATE
      );

      $email->send();
   }

}
