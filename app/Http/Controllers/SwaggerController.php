<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SwaggerController extends Controller
{
  /**
 * @OA\Info(title="Blood Bank API", version="v1")

* @OA\Tag(
*     name="User",
*     description="All user related API"
* )
* @OA\Tag(
*     name="Donor",
*     description="All Donor related API"
* )
* @OA\Tag(
*     name="Geographical",
*     description="Geographical related API"
* )
* @OA\Tag(
*     name="Notification",
*     description="Notification related API"
* )
* @OA\Tag(
*     name="Feed",
*     description="Feeds related API"
* )
* @OA\Server(
    *      url=L5_SWAGGER_CONST_HOST,
    *      description="Demo API Server"
    * )



 * @OA\Post(
 *     path="/login",
 * tags={"User"},
 *  summary="Login",
        * security={  },
     *      description="Returns User Credentials",
     *      @OA\RequestBody(
 *          description= "Provide auth credentials",
 *          required=true,
 *           @OA\JsonContent(
 *              type="object",
 *              @OA\Property(property="email", type="string",example="admin@admin.com"),
 *              @OA\Property(property="password", type="string",example="admin")
 *          )
 *     ),
 *      @OA\Response(
       *         response=200,
       *         description="Success Response",
       *     @OA\MediaType(
      *             mediaType="application/json",
      *             @OA\Schema(
      *         @OA\Property(property="loginData", type="object",example="id: 1,name:saransh, email:admin@admin.com, age:22, address:e-15, city:delhi,state: delhi, gender:male, phone:123, blood_type:A+, token: token"),
 *              @OA\Property(property="status", type="string",example="success")
      *              
    * ),
      *             )
      *         )
      *     )


       * @OA\Post(
    *     path="/register",
    * tags={"User"},
    *  summary="Register",
            * security={  },
        *      description="Returns User Data",
        *      @OA\RequestBody(
    *          description= "Provide provide all details",
    *          required=true,
    *           @OA\JsonContent(
    *              type="object",    
    *              @OA\Property(property="name", type="string",example="admin.com"),
    *              @OA\Property(property="email", type="string",example="admin@admin.com"),
    *              @OA\Property(property="password", type="string",example="admin"),
    *              @OA\Property(property="age", type="integer",example=18),
    *              @OA\Property(property="gender", type="string",example="male"),
    *              @OA\Property(property="address", type="string",example="address"),
    *              @OA\Property(property="state", type="string",example="Delhi"),
    *              @OA\Property(property="city", type="string",example="delhi"),
    *              @OA\Property(property="phone", type="integer",example=0987654321),
    *              @OA\Property(property="blood_type", type="string",example="A+"),
    *          )
    *     ),
    *      @OA\Response(
          *         response=200,
          *         description="Success Response",
          *     @OA\MediaType(
         *             mediaType="application/json",
         *             @OA\Schema(
         *         @OA\Property(property="registerData", type="object",example="id: 1,name:admin, email:admin@admin.com, age:22, address:e-15, city:delhi,state: delhi, gender:male, phone:123, blood_type:A+"),
    *              @OA\Property(property="status", type="string",example="success")
         *              
       * ),
         *             )
         *         )
         *     ),
         
       * @OA\Post(
    *     path="/logout",
    * tags={"User"},
    *  summary="Logout",
    * security={ * {"sanctum": {}}, * },
        *      description="Logout current user",
        *      @OA\RequestBody(
    *          description= "No parameter required",
    *          required=false,
    *          
    *     ),
    *      @OA\Response(
          *         response=200,
          *         description="Success Response",
          *     @OA\MediaType(
         *             mediaType="application/json",
         *             @OA\Schema(
         *         @OA\Property(property="logoutData", type="object",example="Successfully Logged Out"),
    *              @OA\Property(property="status", type="string",example="success")
         *              
       * ),
         *             )
         *         )
         *     ),
     * @OA\Post(
    *     path="/update",
    * tags={"User"},
    *  summary="Update User Details",
       * security={ * {"sanctum": {}}, * },
        *      description="Returns User Data",
        *      @OA\RequestBody(
    *          description= "Provide provide only parameter you want to update,",
    *          required=false,
    *           @OA\JsonContent(
    *              type="object",    
    *              @OA\Property(property="name", type="string",example="admin.com"),
    *              @OA\Property(property="email", type="string",example="admin@admin.com"),
    *              @OA\Property(property="password", type="string",example="admin"),
    *              @OA\Property(property="age", type="integer",example=18),
    *              @OA\Property(property="gender", type="string",example="male"),
    *              @OA\Property(property="address", type="string",example="address"),
    *              @OA\Property(property="state", type="string",example="Delhi"),
    *              @OA\Property(property="city", type="string",example="delhi"),
    *              @OA\Property(property="phone", type="integer",example=0987654321),
    *              @OA\Property(property="blood_type", type="string",example="A+"),
    *              @OA\Property(property="oldPassword", type="string",example="123"),
    *              @OA\Property(property="newPassword", type="string",example="1234"),
    *          )
    *     ),
    *      @OA\Response(
          *         response=200,
          *         description="Success Response",
          *     @OA\MediaType(
         *             mediaType="application/json",
         *             @OA\Schema(
         *         @OA\Property(property="updatedData", type="object",example="id: 1,name:admin, email:admin@admin.com, age:22, address:e-15, city:delhi,state: delhi, gender:male, phone:123, blood_type:A+"),
    *              @OA\Property(property="status", type="string",example="success")
         *              
       * ),
         *             )
         *         )
         *     ),
         
* @OA\Post(
*     path="/findDonors",
* tags={"Donor"},
*  summary="Get Donors",
* security={ * {"sanctum": {}}, * },
*      description="Get all donors, get donors by State, City, Blood Group",
*      @OA\RequestBody(
*          description= "Provide only parameters to search, except enter 'all'",
*          required=false,
*           @OA\JsonContent(
*              type="object",    
*              @OA\Property(property="state", type="string",example="All"),
*              @OA\Property(property="city", type="string",example="All"),
*              @OA\Property(property="blood_type", type="string",example="All")
*          )
*     ),
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*             @OA\Schema(
*         @OA\Property(property="donorsData", type="object",example="[{id: 1,name:admin, email:admin@admin.com, age:22, address:e-15, city:delhi,state: delhi, gender:male, phone:123, blood_type:A+}]"),
*              @OA\Property(property="status", type="string",example="success")            
* ),
*             )
*         )
*     ),

* @OA\Post(
*     path="/getAllBloodType",
* tags={"Donor"},
*  summary="Get All Blood Type",
* security={ * {"sanctum": {}}, * },
*      description="Get all blood Type",
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*             @OA\Schema(
*         @OA\Property(property="bloodTypeData", type="object",example="[A+,A-,A1+,A1-,A1B+,A1B-,A2+,A2-,A2B+,A2B-,AB+,AB-,B+,B-,Bombay Blood Group,INRA,O+,O-]"),
*              @OA\Property(property="status", type="string",example="success")            
* ),
*             )
*         )
*     ),



* @OA\Post(
*     path="/getAllCountries",
* tags={"Geographical"},
*  summary="Get all countries",
* security={ * {"sanctum": {}}, * },
*      description="Returns All Countries Data",
*     
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*             @OA\Schema(example="[{id: 1,name:India, phonecode:+91}]"
* ),
*             )
*         )
*     )
* @OA\Post(
*     path="/getAllStatesByCountry",
* tags={"Geographical"},
*  summary="Get all States By Country",
* security={ * {"sanctum": {}}, * },
*      description="Returns all States Data",
*      @OA\RequestBody(
*          description= "Please Provide country_id",
*          required=false,
*           @OA\JsonContent(
*              type="object",    
*              @OA\Property(property="country_id", type="integer",example=101),

*          )
*     ),
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*                    @OA\Schema(example="[{id: 1,name:Delhi, country_id:101}]"         
* ),
*             )
*         )
*     ),
* @OA\Post(
*     path="/getAllCityByStates",
* tags={"Geographical"},
*  summary="Get all City By States",
* security={ * {"sanctum": {}}, * },
*      description="Returns all States Data",
*      @OA\RequestBody(
*          description= "Please Provide state",
*          required=false,
*           @OA\JsonContent(
*              type="object",    
*              @OA\Property(property="state_id", type="integer",example=4021),

*          )
*     ),
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*                    @OA\Schema(example="[{id: 1,name:West Delhi, state_id,:4021, country_id:101}]"         
* ),
*             )
*         )
*     ),

* @OA\Post(
*     path="/getAllNotification",
* tags={"Notification"},
*  summary="Get all notifications",
* security={ * {"sanctum": {}}, * },
*      description="Returns All Notification",
*     
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*          @OA\Schema(
*         @OA\Property(property="notificationData", type="object",example="[{id:1, title:notification, description:description, read_exists:true}]"),
*              @OA\Property(property="status", type="string",example="success"),  
*              @OA\Property(property="total_notification_count", type="integer",example=2),  
*              @OA\Property(property="unread_notification_count", type="integer",example=1)             
* ),
*             )
*         )
*     )
* @OA\Post(
*     path="/readNotification",
* tags={"Notification"},
*  summary="Read Notification",
* security={ * {"sanctum": {}}, * },
*      description="Read notification by notificatio_id",
*      @OA\RequestBody(
*          description= "Please provide notification_id",
*          required=false,
*           @OA\JsonContent(
*              type="object",    
*              @OA\Property(property="notification_id", type="integer",example=1),
*   
*          )
*     ),
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*             @OA\Schema(
*         @OA\Property(property="notificationData", type="object",example="{id: 1,user_id:1, notification_id:1}"),
*              @OA\Property(property="status", type="string",example="success")            
* ),
*             )
*         )
*     ),
* @OA\Post(
*     path="/addNotification",
* tags={"Notification"},
*  summary="Add New Notification",
* security={ * {"sanctum": {}}, * },
*      description="Add new Notification to table!",
*      @OA\RequestBody(
*          description= "Please provide title and description only",
*          required=false,
*           @OA\JsonContent(
*              type="object",    
*              @OA\Property(property="title", type="string",example="title"),
*              @OA\Property(property="description", type="string",example="description"),
*   
*          )
*     ),
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*             @OA\Schema(
*         @OA\Property(property="notificationData", type="object",example="{id: 1,title:title, description:description}"),
*              @OA\Property(property="status", type="string",example="success"),       
* ),
*             )
*         )
*     ),
* @OA\Post(
*     path="/addFeed",
* tags={"Feed"},
*  summary="Add New Feed",
* security={ * {"sanctum": {}}, * },
*      description="Add new Feed to table!",
*      @OA\RequestBody(
*          description= "Please provide title, description and img. img is not necessary",
*          required=false,
*           @OA\JsonContent(
*              type="object",    
*              @OA\Property(property="title", type="string",example="title"),
*              @OA\Property(property="description", type="string",example="description"),
*              @OA\Property(property="img", type="string",example="base64string"),
*          )
*     ),
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*             @OA\Schema(
*         @OA\Property(property="feedData", type="object",example="{id: 1,title:title, description:description,img:base64string}"),
*              @OA\Property(property="status", type="string",example="success"),       
* ),
*             )
*         )
*     ),
* @OA\Post(
*     path="/getFeedById",
* tags={"Feed"},
*  summary="Get Feed By Id",
* security={ * {"sanctum": {}}, * },
*      description="Get Single Feed Data",
*      @OA\RequestBody(
*          description= "Please provide id only",
*          required=false,
*           @OA\JsonContent(
*              type="object",    
*              @OA\Property(property="id", type="integer",example=1),
*          )
*     ),
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*             @OA\Schema(
*         @OA\Property(property="feedData", type="object",example="{id: 1,title:title, description:description,img:base64string}"),
*              @OA\Property(property="status", type="string",example="success"),       
* ),
*             )
*         )
*     ),
* @OA\Post(
*     path="/getAllFeed",
* tags={"Feed"},
*  summary="Get all feeds",
* security={ * {"sanctum": {}}, * },
*      description="Returns All Feed",
*     
*      @OA\Response(
*         response=200,
*         description="Success Response",
*     @OA\MediaType(
*             mediaType="application/json",
*          @OA\Schema(
*         @OA\Property(property="feedData", type="object",example="[{id:1, title:title, description:description, img:base64string}]"),
*              @OA\Property(property="status", type="string",example="success")         
* ),
*             )
*         )
*     )
 */
 
}
