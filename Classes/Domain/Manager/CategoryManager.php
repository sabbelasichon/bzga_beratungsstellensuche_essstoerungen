<?php


namespace BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Manager;

use Bzga\BzgaBeratungsstellensuche\Domain\Manager\AbstractManager;

class CategoryManager extends AbstractManager
{

    /**
     * @var \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $repository;

    /**
     * @return \BZgA\BzgaBeratungsstellensucheEssstoerungen\Domain\Repository\CategoryRepository
     */
    public function getRepository()
    {
        return $this->repository;
    }

}