<?php

namespace data;

abstract class YiiArCreator extends YiiDataHandler implements CreatorInterface
{
    /**
     * @param $data array
     * @return object
     * @throws \Error
     */
    public function create(array $data): object
    {
        $model = new $this->query->modelClass($data);
        if ($model->save()) {
            return $model;
        }
        throw new \Error('Failed creating record');
    }

    /**
     * @param $data array
     * @return array
     */
    public function createMany(array $data): array
    {
        $dtos = [];
        foreach ($data as $attributesData) {
            $dtos[] = $this->create($attributesData);
        }
        return $dtos;
    }
}
