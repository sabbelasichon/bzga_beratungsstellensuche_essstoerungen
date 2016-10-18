<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager;

use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;

class MeasureManager extends AbstractManager
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\MeasureRepository
     * @inject
     */
    protected $repository;

    /**
     * @return \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\MeasureRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }


}