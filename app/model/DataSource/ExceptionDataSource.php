<?php declare(strict_types = 1);

namespace App\Model\DataSource;

use Tlapnet\Report\DataSources\DataSource;
use Tlapnet\Report\Exceptions\Runtime\CompileException;
use Tlapnet\Report\Parameters\Parameters;

final class ExceptionDataSource implements DataSource
{

	/** @var string|NULL */
	private $message;

	/**
	 * @param Parameters $parameters
	 * @throws CompileException
	 */
	public function compile(Parameters $parameters)
	{
		throw new CompileException('This is exception sample - ' . $this->message);
	}

	public function setSql(?string $message): void
	{
		$this->message = $message;
	}

}
