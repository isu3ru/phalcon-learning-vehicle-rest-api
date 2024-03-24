<?php
declare(strict_types=1);

use Phalcon\Mvc\Model;

class VehicleModel extends Model
{
    public int $id;
    public int $vehicleMakeId;
    public string $name;
    public ?DateTime $createdAt = null;
    public ?DateTime $updatedAt = null;

    public function initialize()
    {
        $this->setSource("vehicle_models");

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
                ]
            ])
        );

        // belongs to a vehicle make
        $this->belongsTo(
            "vehicleMakeId",
            "VehicleMake",
            "id",
            [
                "reusable" => true,
            ]
        );

        // has many vehicles
        $this->hasMany(
            "id",
            "Vehicle",
            "vehicleModelId",
            [
                "reusable" => true,
            ]
        );
    }

    public function getVehicleMake(): VehicleMake
    {
        return VehicleMake::findFirst($this->vehicleMakeId);
    }
}