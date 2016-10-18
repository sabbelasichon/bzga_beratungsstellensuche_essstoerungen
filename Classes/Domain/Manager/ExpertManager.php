<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager;

use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;

class ExpertManager extends AbstractManager
{
    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\ExpertRepository
     * @inject
     */
    protected $repository;

    /**
     * @return \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\ExpertRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }


}