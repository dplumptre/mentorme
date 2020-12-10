<?php

class Mentorme{






    public function checkInArray($value,$array){
        if (in_array($value, $array)){
           return true;
        }else{
            return false;
        }
    }


//USER
    public  function getUser(int $user_id){
        global $DB;
        $data = $DB->get_record('user', ['id'=>$user_id]);
        return $data;
    }




        //  ROLES

        public  function getAllRoles(){
            global $DB;
            $roles = $DB->get_records('mentorme_roles', []);
            return $roles;
        }
        public  function getRole($role){
            global $DB;
            $data = $DB->get_record('mentorme_roles', ['role'=>$role]);
            return $data;
        }
    
        public function checkUserRole(int $user_id,$role){
            global $DB;
            $role =  $this->getRole($role);
            $data = $DB->get_record('mentorme_role_user', ['role_id'=>$role->id,'user_id'=>$user_id]);
            if($data){
               return true;
            }else{
                return false;
            }
        }






        //  INTEREST

        public  function getAllInterest(){
            global $DB;
            $data = $DB->get_records('mentorme_interests', []);
            return $data;
        }



        public  function getUserInterest(int $user_id){
            global $DB;
            $data = $DB->get_fieldset_select('mentorme_user_interest',"interest_id", "interest_id",['user_id'=>$user_id]);
           return $data;
        }


        public  function insertUserInterest( array $postData, string $submitName,int $user_id){
            global $DB;
            $var = "";
    
    
            if(isset($_POST[$submitName])){

                  if(count($postData['name']) > 0){
                    //check if there is already  interests
                    if(count($this->getUserInterest($user_id))>0){
                        //delete
                        $DB->delete_records('mentorme_user_interest',['user_id'=>$user_id]);
                    }
                    // insert new
                    foreach($postData['name'] as $interest_id){
                        try{
                            $obj = new stdClass();
                            $obj->user_id     =  $user_id;
                            $obj->interest_id =  $interest_id;
                            $obj->created_at  = date("Y-m-d H:i:s");
                            $obj->updated_at  = date("Y-m-d H:i:s");
                            $DB->insert_record('mentorme_user_interest', $obj);
                            }catch(Exception $e){
                                var_dump($e);
                            }
                        }
                  }else{
                    //delete if user interest
                    if(count($this->getUserInterest($user_id))>0){
                        
                        $DB->delete_records('mentorme_user_interest',['user_id'=>$user_id]);
                    }
                  }
            }
        }









    //  PROFILE

    public  function getUserProfile(int $user_id){
        global $DB;
        $data = $DB->get_record('mentorme_profile', ['user_id'=>$user_id]);
        return $data;
    }


    public  function updateUserProfile( array $postData, string $submitName){
        global $DB;
        $var = "";

        if(isset($_POST[$submitName])){

            $record = new stdclass;
            $record->id =  $postData['profile_id'];
            $record->language = $postData['language'];
            $record->about = $postData['about'];
            $record->career_aspirations = $postData['career_aspirations'];
            $record->updated_at = date("Y-m-d H:i:s");
            $var = "update Successful";

            try{
            $sql = $DB->update_record('mentorme_profile', $record); 

            }catch(Exception $e){
                var_dump($e);
            }
        }
    }












    // GRADES

    public function getAllGrades(){
        global $DB;
        $data = $DB->get_records('mentorme_grades', []);
        return $data;
    }

    public function getGradeById(int $id){
        global $DB;
        $data = $DB->get_record('mentorme_grades', ['id'=>$id]);
        return $data;
    }

    // public function getAllGradeSlugs(){
    //     global $DB;
    //     $data =  $DB->get_fieldset_select("mentorme_grades", "slug", []);

    //     return $data;
    // }

    public function getAllSelectedGrades(){
        global $DB;
        $data = $DB->get_records_sql("SELECT * FROM cocoon_mentorme_grades WHERE status IS NOT NULL");
        return $data;
    }

    public function getAllSelectedGradeSlugs(){
        global $DB;
        $data = $DB->get_fieldset_sql("SELECT slug FROM cocoon_mentorme_grades WHERE status IS NOT NULL");
        return $data;
    }

    public function checkGradeFromSelectedGrade($grade_slug){
        global $DB;
        return  $this->checkInArray($grade_slug,$this->getAllSelectedGradeSlugs());
    }






   // MENTOR  



   public function searchForMentor(){
    global $DB;   

    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $role =  $this->getRole('mentor');
    $search_mentor = "";
    $grade ="";

  
    
    if(isset($_GET['search_mentor'])){
        $search_mentor = "WHERE U.firstname = '{$_GET['search_mentor']}' OR  U.lastname = '{$_GET['search_mentor']}' " ;   
    }

    if(isset($_GET['grade'])){
        $grades = $_GET['grade'];
        $count = count($grades);
        $grade .=" WHERE "; 

        for($i=0; $i<$count ; $i++){
            $grade .= " P.grade_id = '{$grades[$i]}'   OR";
        }
        $grade = substr($grade,0,strlen($grade)-4); // remove the last OR
    }


    $query = $DB->get_records_sql("
        SELECT distinct  U.firstname,U.lastname,P.grade_id,P.job_title,P.user_id
        FROM newmentorme.cocoon_user AS U 
        INNER JOIN  newmentorme.cocoon_mentorme_profile AS P
        ON U.id = P.user_id
        INNER JOIN  newmentorme.cocoon_mentorme_role_user AS RU
        ON U.id = RU.user_id AND  RU.role_id = $role->id 
        $search_mentor
        $grade
    " );

   return $query;
   }






   public function getAllMentorsOrMentee($roleSlug){
    global $DB;
    $role =  $this->getRole($roleSlug);
    $data = $DB->get_records_sql("
        SELECT distinct  U.firstname,U.lastname,P.grade_id,P.job_title,P.user_id

        FROM newmentorme.cocoon_user AS U 

        INNER JOIN  newmentorme.cocoon_mentorme_profile AS P

        ON U.id = P.user_id

        INNER JOIN  newmentorme.cocoon_mentorme_role_user AS RU

        ON U.id = RU.user_id AND  RU.role_id = $role->id

        ");
        return $data;
}





public function connectToMentor($mentor_id){
    global $DB;
    global $USER;

    if(isset($mentor_id)){

        try{
            $obj = new stdClass();
            $obj->mentor_id =  $mentor_id;
            $obj->mentee_id =  $USER->id;
            $obj->created_at = date("Y-m-d H:i:s");
            $obj->updated_at = date("Y-m-d H:i:s");
            $DB->insert_record('mentorme_mentor_mentee', $obj);
           // var_dump("aaaaaa!");

            //send email
            $mentor = $this->getUser($mentor_id);
            $mentee = $this->getUser($USER->id);
            $to = $mentor->email;
            
        }catch(Exception $e){
            var_dump($e);
        }
    
    }else{
        $url ="mentor_list.php";
        echo header('Location:'.$url);
    }

}
    





 
     
    public function makeMentorOrMentee($user_id,$roleSlug){  // roleSlug = eg mentor or mentee
        global $DB;
        $role =  $this->getRole($roleSlug);

        if($user_id){
            // insert into role_user   

            if($this->checkUserRole($user_id,$roleSlug)){
                //check if already a mentor
                return;
                exit();
            } 

            try{
                $obj = new stdClass();
                $obj->user_id =  $user_id;
                $obj->role_id =  $role->id;
                $obj->created_at = date("Y-m-d H:i:s");
                $obj->updated_at = date("Y-m-d H:i:s");
                $DB->insert_record('mentorme_role_user', $obj);
               // var_dump("aaaaaa!");
                
            }catch(Exception $e){
                var_dump($e);
            }

        }else{
            return;
        }


    }






  
//     function getRole(id){
//         global $DB;

// SELECT A.`first_name` , A.`last_name` , B.`title`
// FROM `members`AS A
// INNER JOIN `movies` AS B
// ON B.`id` = A.`movie_id`

//         SELECT  U.'first_name', R.'role' 
//         FROM  'newmentorme.cocoon_user' AS A
//         INNER JOIN 'newmentorme.cocoon_mentorme_roles' AS R
//         ON U.'id' = R.'user_id'
        
        
//         , members.`last_name` , movies.`title`
// FROM members ,movies
// WHERE movies.`id` = members.`movie_id`



//         $sql = "select "
//         $DB->get_records_sql($sql, array $params=null, $limitfrom=0, $limitnum=0)

//         return $roles;
//     }
    





   
}