# Phalcon Learning Project - Vehicle Data REST API

Work in progress.

## Structure

1. **Vehicle Makes Endpoints:**

    - **Create a Vehicle Make**
        - Endpoint: `/vehicle-makes`
        - Method: POST
        - Request Data:
          ```json
          {
              "name": "Toyota"
          }
          ```
        - Response:
            - HTTP status 201 (Created)
            - Response Body:
              ```json
              {
                  "id": 1,
                  "name": "Toyota"
              }
              ```

    - **Get All Vehicle Makes**
        - Endpoint: `/vehicle-makes`
        - Method: GET
        - Request Data: None
        - Response:
            - HTTP status 200 (OK)
            - Response Body:
              ```json
              [
                  {
                      "id": 1,
                      "name": "Toyota"
                  },
                  {
                      "id": 2,
                      "name": "Honda"
                  },
                  ...
              ]
              ```

2. **Vehicle Models Endpoints:**

    - **Create a Vehicle Model for a Make**
        - Endpoint: `/vehicle-makes/{make_id}/models`
        - Method: POST
        - Request Data:
          ```json
          {
              "name": "Camry",
              "year": 2020,
              "color": "Red"
          }
          ```
        - Response:
            - HTTP status 201 (Created)
            - Response Body:
              ```json
              {
                  "id": 1,
                  "make_id": 1,
                  "name": "Camry",
                  "year": 2020,
                  "color": "Red"
              }
              ```

    - **Get All Models for a Vehicle Make**
        - Endpoint: `/vehicle-makes/{make_id}/models`
        - Method: GET
        - Request Data: None
        - Response:
            - HTTP status 200 (OK)
            - Response Body:
              ```json
              [
                  {
                      "id": 1,
                      "make_id": 1,
                      "name": "Camry",
                      "year": 2020,
                      "color": "Red"
                  },
                  {
                      "id": 2,
                      "make_id": 1,
                      "name": "Corolla",
                      "year": 2021,
                      "color": "Black"
                  },
                  ...
              ]
              ```

3. **Vehicle Categories Endpoints:**

    - **Create a Vehicle Category**
        - Endpoint: `/vehicle-categories`
        - Method: POST
        - Request Data:
          ```json
          {
              "name": "Sedan"
          }
          ```
        - Response:
            - HTTP status 201 (Created)
            - Response Body:
              ```json
              {
                  "id": 1,
                  "name": "Sedan"
              }
              ```

    - **Get All Vehicle Categories**
        - Endpoint: `/vehicle-categories`
        - Method: GET
        - Request Data: None
        - Response:
            - HTTP status 200 (OK)
            - Response Body:
              ```json
              [
                  {
                      "id": 1,
                      "name": "Sedan"
                  },
                  {
                      "id": 2,
                      "name": "SUV"
                  },
                  ...
              ]
              ```

4. **Vehicles Endpoints:**

    - **Create a Vehicle**
        - Endpoint: `/vehicles`
        - Method: POST
        - Request Data:
          ```json
          {
              "make_id": 1,
              "model_id": 1,
              "category_id": 1,
              "year": 2020,
              "color": "Red"
          }
          ```
        - Response:
            - HTTP status 201 (Created)
            - Response Body:
              ```json
              {
                  "id": 1,
                  "make_id": 1,
                  "model_id": 1,
                  "category_id": 1,
                  "year": 2020,
                  "color": "Red"
              }
              ```

    - **Get All Vehicles**
        - Endpoint: `/vehicles`
        - Method: GET
        - Request Data: None
        - Response:
            - HTTP status 200 (OK)
            - Response Body:
              ```json
              [
                  {
                      "id": 1,
                      "make": "Toyota",
                      "model": "Camry",
                      "category": "Sedan",
                      "year": 2020,
                      "color": "Red"
                  },
                  {
                      "id": 2,
                      "make": "Toyota",
                      "model": "Corolla",
                      "category": "Sedan",
                      "year": 2021,
                      "color": "Black"
                  },
                  ...
              ]
              ```

    - **Get a Single Vehicle**
        - Endpoint: `/vehicles/{id}`
        - Method: GET
        - Request Data: None
        - Response:
            - HTTP status 200 (OK) if found, or HTTP status 404 (Not Found)
            - Response Body (if found):
              ```json
              {
                  "id": 1,
                  "make": "Toyota",
                  "model": "Camry",
                  "category": "Sedan",
                  "year": 2020,
                  "color": "Red"
              }
              ```

    - **Update a Vehicle**
        - Endpoint: `/vehicles/{id}`
        - Method: PUT
        - Request Data:
          ```json
          {
              "make_id": 1,
              "model_id": 2,
              "category_id": 2,
              "year": 2021,
              "color": "Black"
          }
          ```
        - Response:
            - HTTP status 200 (OK) if updated, or HTTP status 404 (Not Found)
            - Response Body (if updated):
              ```json
              {
                  "id": 1,
                  "make": "Toyota",
                  "model": "Corolla",
                  "category": "SUV",
                  "year": 2021,
                  "color": "Black"
              }
              ```

    - **Delete a Vehicle**
        - Endpoint: `/vehicles/{id}`
        - Method: DELETE
        - Request Data: None
        - Response:
            - HTTP status 204 (No Content) if deleted, or HTTP status 404 (Not Found)


----


1. **VehicleMake Model:**
    - Fields:
        - `id` (Primary Key): INTEGER (Auto-increment)
        - `name`: VARCHAR(255)
    - Relationships: None (as per this example)

2. **VehicleModel Model:**
    - Fields:
        - `id` (Primary Key): INTEGER (Auto-increment)
        - `make_id` (Foreign Key referencing VehicleMake): INTEGER
        - `name`: VARCHAR(255)
        - `year`: INTEGER
        - `color`: VARCHAR(50)
    - Relationships:
        - Belongs to VehicleMake (Many-to-One)

3. **VehicleCategory Model:**
    - Fields:
        - `id` (Primary Key): INTEGER (Auto-increment)
        - `name`: VARCHAR(255)
    - Relationships: None (as per this example)

4. **Vehicle Model:**
    - Fields:
        - `id` (Primary Key): INTEGER (Auto-increment)
        - `make_id` (Foreign Key referencing VehicleMake): INTEGER
        - `model_id` (Foreign Key referencing VehicleModel): INTEGER
        - `category_id` (Foreign Key referencing VehicleCategory): INTEGER
        - `year`: INTEGER
        - `color`: VARCHAR(50)
    - Relationships:
        - Belongs to VehicleMake (Many-to-One)
        - Belongs to VehicleModel (Many-to-One)
        - Belongs to VehicleCategory (Many-to-One)

These models represent the basic structure of vehicle-related data in a Phalcon PHP application. Depending on your application's requirements, you can add more fields or relationships to these models. Additionally, you may need to define validation rules, behaviors, or other custom logic within each model as needed for your application.

