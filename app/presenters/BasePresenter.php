<?php declare(strict_types = 1);

namespace App\Presenters;

use Nette\Application\UI\Presenter;
use Tlapnet\Report\Service\ReportService;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Presenter
{

	/** @var ReportService @inject */
	public $reportService;

	/**
	 * Common template method
	 *
	 * @return void
	 */
	protected function beforeRender()
	{
		parent::beforeRender();
		$this->template->groups = $this->reportService->getGroups();
		$this->template->groupless = $this->reportService->getGroupless();
	}

}
