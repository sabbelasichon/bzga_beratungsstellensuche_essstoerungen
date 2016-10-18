<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager;

use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;

class QualificationManager extends AbstractManager
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\QualificationRepository
     * @inject
     */
    protected $repository;

    /**
     * @return \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\QualificationRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

}