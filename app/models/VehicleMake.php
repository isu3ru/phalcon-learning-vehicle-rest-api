<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;

class VehicleMake extends Model
{
    public function initialize()
    {
        $this->setSource("vehicle_makes");

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

        // has many vehicle models
        $this->hasMany(
            "id",
            "VehicleModel",
            "vehicleMakeId",
            [
                "reusable" => true,
            ]
        );

        // has many vehicles
        $this->hasMany(
            "id",
            "Vehicle",
            "vehicleMakeId",
            [
                "reusable" => true,
            ]
        );
    }

}