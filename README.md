<p align="center"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReb0POmIY3t8_bwE4c55yZXSrZw-HsAY5_dp96I2myI_V17LuZ"></p>

## Laravel 5.8 and React 16.2.0 boilerplate

Please follow the guide.

1. `git clone https://github.com/shaimaa-elfikky/Laravel-Task-Manager-App.git`
2. `update the .env file along with database connection`
3. `composer install && composer update`
4. `php artisan migrate`
5. `npm install`
6. `php artisan serve`
7. `register`

## Running Application
1. open terminal and run command `php artisan serve`

2. Open browser and run with this url `http://127.0.0.1:8000`

3. Login with username and password

## Features
- [x] Laravel 5.8 Version
- [x] React 16.2 Version
- [x] Basic Authentication Laravel
- [x] Simple Todo CRUD App


# Task API Endpoints

This section documents the API endpoints for managing tasks in the Task Management application.

## Authentication
- **Note**: All endpoints require authentication.

### Base URL

---

### List All Tasks
- **Endpoint**: `/api/tasks`
- **Method**: `GET`
- **Description**: Retrieves a list of the 10 most recent tasks for the authenticated user.
- **Response**:
  ```json
  {
    "tasks": [
      {
        "id": 1,
        "name": "Task Name",
        "user_id": 1,
        "created_at": "2024-01-01T12:00:00Z",
        "updated_at": "2024-01-01T12:00:00Z",
        "user": {
          "id": 1,
          "name": "User Name",
          "email": "user@example.com"
        }
      },
      
    ]
  }

### Create New Task
-**Endpoint**: `/api/tasks`
- **Method**: `POST`
- **Description**:  Creates a new task for the authenticated user.
- **Request Body**:
  ```json
  {
    "name": "Task Name"
  } 
- **Response**:
  ```json
  {
  "task": {
    "id": 1,
    "name": "Task Name",
    "user_id": 1,
    "created_at": "2024-01-01T12:00:00Z",
    "updated_at": "2024-01-01T12:00:00Z"
  }
  }



### Task Details
- **Endpoint**: `/api/tasks/{id}`
- **Method**: `PUT`
- **Description**:  Edit  a specific task by id
- **Response**:
  ```json
  {
    "task": {
      "id": 1,
      "name": "Task Name",
      "user_id": 1,
      "created_at": "2024-01-01T12:00:00Z",
      "updated_at": "2024-01-01T12:00:00Z"
    }
  }


### Delete Task
- **Endpoint**: `/api/tasks/{id}`
- **Method**: `DELETE`
- **Description**:  Deletes a specific task by id.
- **Response**:
No content (204 status code).



### Task List API Endpoints
- **Endpoint**: `/api/task-lists`
- **Method**: `GET`
- **Description**: Retrieves all task lists for the authenticated user, along with the tasks in each list
- **Response**:
  ```json
  [
      {
          "id": 1,
          "name": "Work Tasks",
          "user_id": 1,
          "share_link": null,
          "tasks": [
              {
                  "id": 1,
                  "name": "Finish report",
                  "completed": false
              },
            
          ]
      },
    
  ]


- **Endpoint**: `/api/task-lists`
- **Method**: `POST`
- **Description**: Creates a new task list for the authenticated user.
- **Headers**:Authorization: Bearer {token}
- **Request Body**:
  ```json
    {
        "name": "My New Task List"
    }
- **Response**:
  ```json
  {
      "id": 1,
      "name": "My New Task List",
      "user_id": 1,
      "share_link": null,
      "tasks": []
  }
Status Code: 201 Created
Validation: The name field is required and must be a string with a maximum length of 255 characters.


- **Endpoint**: `/api/task-lists/{id}`
- **Method**: `GET`
- **Description**:  Retrieves a specific task list along with its tasks for the authenticated user.
**Request**:
**Headers**: Authorization: Bearer {token}
- **Response**:
   ```json
  {
      "id": 1,
      "name": "Work Tasks",
      "user_id": 1,
      "share_link": null,
      "tasks": [
          {
              "id": 1,
              "name": "Finish report",
              "completed": false
          },
          
      ]
  }



- **Endpoint**: `/api/task-lists/{id}/share`
- **Method**: `POST`
- **Description**: Retrieves a specific task list along with its tasks for the authenticated user.
- **Request**:
- **Headers**: Authorization: Bearer {token}
- **Response**:
    ```json
    {
        "share_link": "http://http://127.0.0.1:8000//task-lists/share/{shareLink}"
    }


**Endpoint**: `/api/task-lists/share/{shareLink}`
- **Method**: `GET`
- **Description**:  Displays a task list that has been shared using a unique share link
- **Request**:

  URL Parameter: shareLink is the unique link provided for the shared task list.
- **Response**:
    ```json
    {
        "id": 1,
        "name": "Work Tasks",
        "user_id": 1,
        "share_link": "{shareLink}",
        "tasks": [
            {
                "id": 1,
                "name": "Finish report",
                "completed": false
            },
            
        ]
    }



### Task List Share Endpoints
- **Endpoint**: `/api/task-lists/share`
- **Method**: `POST`
- **Description**: Shares a task list with another user by their username.
- **Request Body**:
  ```json
    {
      "task_list_id": "required|integer",  
      "username": "required|string"        
    }
- **Response**:
    {
      "message": "Task list shared successfully with {username}"
    }



- **Endpoint**: `/api/task-lists/shared-with-me`
- **Method**: `GET`
- **Description**:  Retrieves all task lists that have been shared with the authenticated user.
- **Response**:
   ```json
  [
    {
      "task_list": {
        "id": 1,
        "name": "My Shared Task List",
        "user_id": 1,
        "share_link": "a-unique-link",
        "tasks": [
          {
            "id": 1,
            "name": "Task 1",
            "completed": false,
            "user_id": 1
          },
          {
            "id": 2,
            "name": "Task 2",
            "completed": true,
            "user_id": 1
          }
        ]
      }
    },
    {
      "task_list": {
        "id": 2,
        "name": "Another Shared Task List",
        "user_id": 2,
        "share_link": "another-unique-link",
        "tasks": []
      }
    }
  ]
