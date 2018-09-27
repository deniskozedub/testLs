define({ "api": [
  {
    "type": "post",
    "url": "/login",
    "title": "Login",
    "name": "Login",
    "version": "0.1.0",
    "group": "Auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>student's email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>student's password</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/login"
      }
    ],
    "filename": "app/Http/Controllers/Auth/LoginController.php",
    "groupTitle": "Auth"
  },
  {
    "type": "post",
    "url": "/register",
    "title": "Registration",
    "name": "Registration",
    "version": "0.1.0",
    "group": "Auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>student's name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>student's email UNIQUE</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>student's password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>confirm student's password</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/register"
      }
    ],
    "filename": "app/Http/Controllers/Auth/RegisterController.php",
    "groupTitle": "Auth"
  },
  {
    "type": "post",
    "url": "/category",
    "title": "Add categories",
    "name": "Add_category",
    "version": "0.1.0",
    "group": "Category",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>name of category</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/category"
      }
    ],
    "filename": "app/Http/Controllers/CategoryController.php",
    "groupTitle": "Category"
  },
  {
    "type": "delete",
    "url": "/category/{id}",
    "title": "Delete category",
    "name": "Delete_category",
    "version": "0.1.0",
    "group": "Category",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/category/{id}"
      }
    ],
    "filename": "app/Http/Controllers/CategoryController.php",
    "groupTitle": "Category"
  },
  {
    "type": "get",
    "url": "/category",
    "title": "Get categories",
    "name": "Get_categories",
    "version": "0.1.0",
    "group": "Category",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/category"
      }
    ],
    "filename": "app/Http/Controllers/CategoryController.php",
    "groupTitle": "Category"
  },
  {
    "type": "get",
    "url": "/category/{id}",
    "title": "Get one category",
    "name": "Get_one_categories",
    "version": "0.1.0",
    "group": "Category",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/category/{id}"
      }
    ],
    "filename": "app/Http/Controllers/CategoryController.php",
    "groupTitle": "Category"
  },
  {
    "type": "put",
    "url": "/category/{id}",
    "title": "Update category",
    "name": "Update_category",
    "version": "0.1.0",
    "group": "Category",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>name of category</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/category/{id}"
      }
    ],
    "filename": "app/Http/Controllers/CategoryController.php",
    "groupTitle": "Category"
  },
  {
    "type": "get",
    "url": "/get-news",
    "title": "Get news for guest",
    "name": "Get_news_for_guest",
    "version": "0.1.0",
    "group": "Guest",
    "sampleRequest": [
      {
        "url": "/api/get-news"
      }
    ],
    "filename": "app/Http/Controllers/NewsController.php",
    "groupTitle": "Guest"
  },
  {
    "type": "post",
    "url": "/news",
    "title": "Add news",
    "name": "Add_news",
    "version": "0.1.0",
    "group": "News",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>name of news</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>description of news</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "category_id",
            "description": "<p>category_id for news</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/news"
      }
    ],
    "filename": "app/Http/Controllers/NewsController.php",
    "groupTitle": "News"
  },
  {
    "type": "delete",
    "url": "/news/{id}",
    "title": "Delete news",
    "name": "Delete_news",
    "version": "0.1.0",
    "group": "News",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/news/{id}"
      }
    ],
    "filename": "app/Http/Controllers/NewsController.php",
    "groupTitle": "News"
  },
  {
    "type": "get",
    "url": "/news",
    "title": "Get news",
    "name": "Get_news",
    "version": "0.1.0",
    "group": "News",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/news"
      }
    ],
    "filename": "app/Http/Controllers/NewsController.php",
    "groupTitle": "News"
  },
  {
    "type": "get",
    "url": "/news/{id}",
    "title": "Get one news",
    "name": "Get_one_categories",
    "version": "0.1.0",
    "group": "News",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/news/{id}"
      }
    ],
    "filename": "app/Http/Controllers/NewsController.php",
    "groupTitle": "News"
  },
  {
    "type": "put",
    "url": "/news/{id}",
    "title": "Update news",
    "name": "Update_news",
    "version": "0.1.0",
    "group": "News",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>name of news</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "description",
            "description": "<p>description of news</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "category_id",
            "description": "<p>category_id for news</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api/news/{id}"
      }
    ],
    "filename": "app/Http/Controllers/NewsController.php",
    "groupTitle": "News"
  }
] });
