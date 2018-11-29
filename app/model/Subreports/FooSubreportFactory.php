<?php

namespace App\Model\Subreports;

use Nette\Application\UI\ITemplateFactory;
use Tlapnet\Report\Bridges\Nette\Renderers\SimpleTable\SimpleTableRenderer;
use Tlapnet\Report\DataSources\ArrayDataSource;
use Tlapnet\Report\Parameters\ParametersFactory;
use Tlapnet\Report\Subreport\Subreport;
use Tlapnet\Report\Subreport\SubreportBuilder;
use Tlapnet\Report\Subreport\SubreportFactory;

class FooSubreportFactory implements SubreportFactory
{

	/** @var ITemplateFactory */
	private $templateFactory;

	/**
	 * @param ITemplateFactory $templateFactory
	 */
	public function __construct(ITemplateFactory $templateFactory)
	{
		$this->templateFactory = $templateFactory;
	}

	/**
	 * @return Subreport
	 */
	public function create(): Subreport
	{
		$builder = new SubreportBuilder();
		$builder->setSid('foo');
		$builder->setParameters(ParametersFactory::create([]));

		$builder->setDataSource($dataSource = new ArrayDataSource([
			['id' => 1, 'day' => 1, 'money' => 5000],
			['id' => 1, 'day' => 2, 'money' => 4000],
			['id' => 1, 'day' => 3, 'money' => 500],
			['id' => 2, 'day' => 3, 'money' => 500],
			['id' => 2, 'day' => 5, 'money' => 4000],
			['id' => 3, 'day' => 4, 'money' => 15000],
		]));

		$builder->setRenderer($renderer = new SimpleTableRenderer($this->templateFactory));
		$renderer->addColumn('id', 'Day');
		$renderer->addColumn('day', 'Day');

		return $builder->build();
	}

}
