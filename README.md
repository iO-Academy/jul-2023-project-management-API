# Project manager API

## API documentation

This API only supports GET requests.
### Return all projects, optionally filtered by client

* **URL**

  /projects.php

* **Method:**

  `GET`

* **URL Params**

  **Required:**

  There are no required URL params

  **Optional:**

  `client=[numeric]` - The `id` of a client to return projects for, if not provided, all projects are returned

  `locale=[uk|us]` - Adjusts the format of the returned data to match the users location, default to uk

  **Example:**

  `/projects.php?client=1&locale=uk`

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
  "message": "Successfully retrieved projects",
  "data": [
    {
      "id": "17",
      "name": "Overhold",
      "client_id": "7",
      "deadline": "30/06/2022", // "06-30-2022" if locale=us
      "overdue": true
    },
    {
      "id": "18",
      "name": "Wrapsafe",
      "client_id": "18",
      "deadline": "28/03/2024",
      "overdue": false
    }
  ]
  }
  ```

* **Error Response:**

    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid client ID", "data": []}`
  
    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid locale", "data": []}`

    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Unexpected error", "data": []}`

### Return a specific project

* **URL**

  /project.php

* **Method:**

  `GET`

* **URL Params**

  **Required:**

  `id=[numeric]` - The `id` of the project to return

  **Optional:**

  `locale=[uk|us]` - Adjusts the format of the returned data to match the users location, default to uk

  **Example:**

  `/project.php?id=1&locale=uk`

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
  "message": "Successfully retrieved project",
  "data": {
      "id": "17",
      "name": "Overhold",
      "client_id": "7",
      "client_name": "Avamba",
      "client_logo": "http://dummyimage.com/200x200.png/dddddd/000000",
      "users": [
        {
          "id": "1",
          "name": "Lamond Teather",
          "avatar": "https://robohash.org/explicaboautodit.png?size=50x50&set=set1",
          "role": "Geological Engineer"
        },
        {
          "id": "2",
          "name": "Jonas Filippazzo",
          "avatar": "https://robohash.org/explicaboautodit.png?size=50x50&set=set1",
          "role": "Senior Editor"
        }
      ],
      "deadline": "30/06/2022", // "06-30-2022" if locale=us
      "overdue": true
    }
  }
  ```

* **Error Response:**

    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid project ID", "data": []}`
  
    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid locale", "data": []}`

    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Unexpected error", "data": []}`

### Return all tasks assigned to a specific user for a specified project

* **URL**

  /tasks.php

* **Method:**

  `GET`

* **URL Params**

  **Required:**

  `user_id=[numeric]` - The `id` of the user to return tasks for

  `project_id=[numeric]` - The `id` of the project to return tasks for

  **Optional:**

  `locale=[uk|us]` - Adjusts the format of the returned data to match the users location, default to uk

  **Example:**

  `/tasks.php?user_id=1&project_id=1&locale=uk`

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
  "message": "Successfully retrieved tasks",
  "data": [
    {
      "id": "17",
      "project_id": "1",
      "user_id": "7",
      "name": "mattis",
      "estimate": "3", // only if locale=uk
      "deadline": "30/07/2022", // "07-30-2022" if locale=us
      "overdue": true
  //  "estimate_hrs": 12, // if locale=us
  //  "estimate_days": 1.5 // if locale=us
    },
    {
      "id": "41",
      "project_id": "1",
      "user_id": "7",
      "name": "curae",
      "estimate": null, // only if locale=uk
      "deadline": null,
      "overdue": null
  //  "estimate_hrs": null, // if locale=us
  //  "estimate_days": null // if locale=us
    }
  ]
  }
  ```

* **Error Response:**

    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid project ID", "data": []}`
  
    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid user ID", "data": []}`
  
    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid locale", "data": []}`
  
    * **Code:** 404 NOT FOUND <br />
      **Content:** `{"message": "No tasks assigned to that user for this project", "data": []}`

    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Unexpected error", "data": []}`

### Return a specific task

* **URL**

  /task.php

* **Method:**

  `GET`

* **URL Params**

  **Required:**

  `id=[numeric]` - The `id` of the task to return

  **Optional:**

  `locale=[uk|us]` - Adjusts the format of the returned data to match the users location, default to uk

  **Example:**

  `/task.php?id=1&locale=uk`

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
  "message": "Successfully retrieved task",
  "data": {
      "id": "17",
      "project_id": "1",
      "user_id": "7",
      "name": "augue",
      "description": "Phasellus sit amet erat. Nulla tempus. Vivamu...",
      "estimate": "3", // only if locale=uk
      "deadline": "30/07/2022", // "07-30-2022" if locale=us
      "overdue": true
  //  "estimate_hrs": 12, // if locale=us
  //  "estimate_days": 1.5 // if locale=us
    }
  }
  ```

* **Error Response:**

    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid task ID", "data": []}`
  
    * **Code:** 400 BAD REQUEST <br />
      **Content:** `{"message": "Invalid locale", "data": []}`

    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Unexpected error", "data": []}`

### Returns all clients

* **URL**

  /clients.php

* **Method:**

  `GET`

* **URL Params**

  There are no URL parameters for this route

* **Success Response:**

    * **Code:** 200 <br />
      **Content:** <br />

  ```json
  {
  "message": "Successfully retrieved clients",
  "data": [
    {
      "id": "1",
      "name": "Yadel",
      "logo": "http://dummyimage.com/200x200.png/ff4444/ffffff"
    },
    {
      "id": "2",
      "name": "Tagfeed",
      "logo": null
    }
  ]
  }
  ```

* **Error Response:**

    * **Code:** 500 SERVER ERROR <br />
      **Content:** `{"message": "Unexpected error", "data": []}`