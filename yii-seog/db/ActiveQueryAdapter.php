<?php

namespace seog\db;

use yii\db\ActiveQuery as BaseActiveQuery;

class ActiveQueryAdapter extends BaseActiveQuery implements QueryInterface
{
    public function one($db = null):  ? object
    {
        return parent::one();
    }

    public function all($db = null) : array
    {
        return parent::all();
    }

    public function each($batchSize = 100, $db = null): \Iterator
    {
        return parent::each();
    }

    public function where($condition = [], $params = []): self
    {
        return parent::where($condition);
    }

    public function with(): self
    {
        return parent::with();
    }

    public function limit($limit = 50): self
    {
        return parent::limit($limit);
    }
}
