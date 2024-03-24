<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller as BaseController;

class VehicleMakesController extends BaseController
{
    /**
     * Returns all vehicle makes
     * Route: [GET] /vehicle-makes
     */
    public function index(): Phalcon\Http\Response
    {
        // Create a response
        $response = new \Phalcon\Http\Response();

        // Set the content of the response
        $response->setJsonContent(
            VehicleMake::find()
        );

        // Return the response
        return $response;
    }

    /**
     * Returns a vehicle make by ID
     * Route: [GET] /vehicle-makes/{id}
     */
    public function show(int $id): Phalcon\Http\Response
    {
        // Create a response
        $response = new \Phalcon\Http\Response();

        // Set the content of the response
        $response->setJsonContent(
            VehicleMake::findFirst($id)
        );

        // Return the response
        return $response;
    }

    /**
     * Creates a new vehicle make
     * Route: [POST] /vehicle-makes
     */
    public function store(): Phalcon\Http\Response
    {
        // get request
        $request = $this->request->getJsonRawBody();

        // Create a response
        $response = new \Phalcon\Http\Response();

        $vehicleMake = new VehicleMake();
        $vehicleMake->name = $request->name;
        $vehicleMake->save();

        // Set the content of the response
        $response->setJsonContent([
            'msg' => 'Vehicle Model Created Successfully.',
            'data' => $vehicleMake->toArray(),
        ]);

        $response->setStatusCode(201, "Created");

        // Return the response
        return $response;
    }

    /**
     * Updates a vehicle make by ID
     * Route: [PUT] /vehicle-makes/{id}
     */
    public function update(int $id): Phalcon\Http\Response
    {
        // get request
        $request = $this->request->getJsonRawBody();

        // Create a response
        $response = new \Phalcon\Http\Response();

        $vehicleMake = VehicleMake::findFirst($id);
        $vehicleMake->name = $request->name;
        $vehicleMake->save();

        // Set the content of the response
        $response->setJsonContent([
            'msg' => 'Vehicle Model Updated Successfully.',
            'data' => $vehicleMake->toArray(),
        ]);

        // Return the response
        return $response;
    }

    /**
     * Deletes a vehicle make by ID
     * Route: [DELETE] /vehicle-makes/{id}
     */
    public function delete(int $id): Phalcon\Http\Response
    {
        // Create a response
        $response = new \Phalcon\Http\Response();

        $vehicleMake = VehicleMake::findFirst($id);
        if(!$vehicleMake) {
            // Set the content of the response
            $response->setJsonContent([
                'msg' => 'Vehicle Model Not Found.',
            ]);

            $response->setStatusCode(404, "Vehicle make not found.");

            // Return the response
            return $response;
        }

        $vehicleMake->delete();

        // Set the content of the response
        $response->setJsonContent([
            'msg' => 'Vehicle Model Deleted Successfully.',
        ]);

        // Return the response
        return $response;
    }
}