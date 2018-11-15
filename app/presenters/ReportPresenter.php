<?php

namespace App\Presenters;

use Tlapnet\Report\Bridges\Nette\Components\Render\ReportRenderControl;
use Tlapnet\Report\Report\Report;

final class ReportPresenter extends BasePresenter
{

	/** @var Report */
	private $report;

	/**
	 * @param string $id
	 * @return void
	 */
	public function actionDetail($id)
	{
		if (!($report = $this->reportService->getReport($id))) {
			$this->flashMessage('Takový report nenalezen.', 'danger');
			$this->redirect('List:');
		}

		$this->report = $report;
	}

	/**
	 * @param string $id
	 * @return void
	 */
	public function renderDetail($id)
	{
		$this->template->report = $this->report;
	}

	/**
	 * @return ReportRenderControl
	 */
	protected function createComponentRender()
	{
		$control = new ReportRenderControl($this->report);

		return $control;
	}

}
