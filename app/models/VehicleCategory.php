<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;

class VehicleCategory extends Model
{
    public int $id;
    public string $name;
    public ?DateTime $createdAt = null;
    public ?DateTime $updatedAt = null;

    public function initialize()
    {
        $this->setSource("vehicle_categories");

        // Set up Timestampable behavior
        $this->addBehavior(
            new Phalcon\Mvc\Model\Behavior\Timestampable([
                'beforeCreate' => [
                    'field' => 'createdAt',
                    'format' => 'Y-m-d H:i:s'
                ],
                'beforeUpdate' => [
                    'field' => 'updatedAt',
                    'format' => 'Y-m-d H:i:s'
                ],
            ])
        );
    }
}