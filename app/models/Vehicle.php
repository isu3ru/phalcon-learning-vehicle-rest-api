<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;

class Vehicle extends Model
{
    public int $id;
    public string $name;
    public string $type;
    public int $vehicleMakeId;
    public int $vehicleModelId;
    public int $vehicleCategoryId;
    public ?DateTime $createdAt = null;
    public ?DateTime $updatedAt = null;

    public function initialize()
    {
        $this->setSource("vehicles");

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

        // vehicleMakeId
        $this->belongsTo(
            "vehicleMakeId",
            "VehicleMake",
            "id",
            [
                "reusable" => true,
            ]
        );

        // vehicleModelId
        $this->belongsTo(
            "vehicleModelId",
            "VehicleModel",
            "id",
            [
                "reusable" => true,
            ]
        );

        // vehicleCategoryId
        $this->belongsTo(
            "vehicleCategoryId",
            "VehicleCategory",
            "id",
            [
                "reusable" => true,
            ]
        );
    }

}