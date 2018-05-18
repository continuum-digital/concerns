<?php

namespace App\Concerns;

use Jenssegers\Optimus\Optimus;

trait TransformsIds
{
    /**
     * Encode an ID.
     *
     * @param int $id
     * @return int
     */
    public function encodeId(int $id) : int
    {
        return $this->getTransformationInstance()->encode($id);
    }

    /**
     * Decode an ID.
     *
     * @param int $encodedId
     * @return int
     */
    public function decodeId(int $encodedId) : int
    {
        return $this->getTransformationInstance()->decode($encodedId);
    }

    /**
     * Return the transformation instance.
     *
     * @return \Jenssegers\Optimus\Optimus
     */
    protected function getTransformationInstance()
    {
        return app(Optimus::class);
    }
}
