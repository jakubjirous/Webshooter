<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;


class HomepagePresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
