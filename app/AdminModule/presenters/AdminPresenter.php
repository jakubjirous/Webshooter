<?php

namespace App\AdminModule\Presenters;

use Nette;
use App\Model;


class AdminPresenter extends BasePresenter
{

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';
	}

}
