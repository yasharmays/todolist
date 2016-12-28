**TO DO LIST Application**

A To do list application created in Code Ignitor. 

Features:
- Create, Update, Delete Tasks with  their descriptions.
- APIs to use the CRUD functionality of the application by using Get, Put types depending on the type of API.

REST API List:
- [GET] `/api/tasks`
    Getting list of all tasks 
    
- [POST] `/api/task/new` 
    Create New Task 
    
- [POST] `/api/task/edit/(:num)`
    Update a task using its id
    
- [POST] `/api/task/delete/(:num)`
    Delete a task using its id
    
Also the Postman collection is shared in  _CI_todo.postman_collection.json_ file to consume the APIs quickly.
    