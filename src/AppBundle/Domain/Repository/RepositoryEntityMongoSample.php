<?php

namespace AppBundle\Domain\Model;

use AppBundle\Domain\Model\EntityMongoSample;

class RepositoryEntityMongoSample
{
    function __construct($mongoConnexion) {
        $this->mongoConnexion = $mongoConnexion;
    }
}
