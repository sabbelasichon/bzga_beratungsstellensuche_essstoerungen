<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager;

use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;

class TargetgroupManager extends AbstractManager
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository
     * @inject
     */
    protected $repository;

    /**
     * @return \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\TargetgroupRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }


}