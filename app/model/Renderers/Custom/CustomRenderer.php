<?php

namespace App\Model\Renderers\Custom;

use Tlapnet\Report\Bridges\Nette\Renderers\TemplateRenderer;
use Tlapnet\Report\Result\Result;

class CustomRenderer extends TemplateRenderer
{

	/**
	 * @param Result $result
	 * @return void
	 */
	public function render(Result $result)
	{
		$template = $this->createTemplate();
		$template->setFile(__DIR__ . '/templates/custom.latte');
		$template->data = $result->getData();
		$template->render();
	}

}
