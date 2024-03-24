<?php

/**
 * Local variables
 * @var \Phalcon\Mvc\Micro $app
 */

// set content type to json if Accept header set to application/json
$app->before(function() use ($app) {
    $contentType = $app->request->getHeader('Accept');
    if ($contentType === 'application/json') {
        $app->response->setContentType('application/json');
    }
});

/**
 * Add your routes here
 */
$app->get('/', function () {
    echo $this['view']->render('index');
});

// GET /vehicle-makes -> VehicleMakesController::index
$app->get('/vehicle-makes', function() use($app) {
    // Instantiate the VehicleMakesController
    $controller = new VehicleMakesController();

    // Call the index action
    $response = $controller->index();

    // Return the response
    return $response;
});

// Get /vehicle-makes/{id} -> VehicleMakesController::getById
$app->get('/vehicle-makes/{id}', function($id) use($app) {
    // Instantiate the VehicleMakesController
    $controller = new VehicleMakesController();

    // Call the getById action
    $response = $controller->show($id);

    // Return the response
    return $response;
});

// POST /vehicle-makes -> VehicleMakesController::create
$app->post('/vehicle-makes', function() use($app) {
    // Instantiate the VehicleMakesController
    $controller = new VehicleMakesController();

    // Call the create action
    return $controller->store();
});

// PUT /vehicle-makes/{id} -> VehicleMakesController::update
$app->put('/vehicle-makes/{id}', function($id) use($app) {
    // Instantiate the VehicleMakesController
    $controller = new VehicleMakesController();

    // Call the update action
    return $controller->update($id);
});

// DELETE /vehicle-makes/{id} -> VehicleMakesController::delete
$app->delete('/vehicle-makes/{id}', function($id) use($app) {
    // Instantiate the VehicleMakesController
    $controller = new VehicleMakesController();

    // Call the delete action
    return $controller->delete($id);
});

/**
 * Not found handler
 */
$app->notFound(function () use($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo $app['view']->render('404');
});
