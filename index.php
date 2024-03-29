<?php
//
// Reads the variables sent via POST
    require_once("db.php");
    require_once("config.php");
    $phone = $_POST['phoneNumber'];
    $sessionId   = $_POST["sessionId"];
    $serviceCode = $_POST["serviceCode"];
    $text = $_POST["text"];
    // $text = $_POST["text"];
    //This is the first menu screen
    $ussd_string_exploded = explode("*", $text);
    $now = date_create()->format('Y-m-d H:i:s');

    // Get ussd menu level number from the gateway
    $level = count($ussd_string_exploded);
    $userResponse= $ussd_string_exploded[$level-1];
    $check_phone=$con->prepare("SELECT * FROM stu_ussd WHERE stu_phone=? AND stu_status=?");
    $check_phone->setFetchMode(PDO:: FETCH_ASSOC);

    $quiz_6 = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
    $quiz_6->setFetchMode(PDO:: FETCH_ASSOC);
    $quiz_6->execute();
    $quiz=$quiz_6->fetch();
    $count=$quiz_6->rowCount();
    if($check_phone->execute([$phone,"YES"])){
        $user_count=$check_phone->rowCount(); 
        if($student = $check_phone->fetch()){
            $student_firstname = $student['stu_firstname'];
            $student_lastname = $student['stu_lastname'];
            $student_lga = $student['stu_lga'];
            $student_status = $student['stu_status'];
        }   
    }
    $num = rand(1,$count);
    $Q1 = $quiz['question_1'];
    $Q2 = $quiz['question_2'];
    $Q3 = $quiz['question_3'];
    $Q4 = $quiz['question_4'];
    $Q5 = $quiz['question_5'];
    function contains($str, $main_str){
        $last_index = -1;
        for($i=0; $i < strlen($main_str); $i++){
            for($j=0; $i+$j<=strlen($main_str); $j++){
                if($str == substr($main_str, $i, $j)){
                    $last_index = $i+$j-1;
                }
            }
        }
        return $last_index;
    }

        $value = contains("1*1*0", $_POST["text"]);
        $value2 = contains("1*2*0", $_POST["text"]);
        $value3 = contains("1*1*1*00", $_POST["text"]);
        while( $value != -1) {
            $left = substr($_POST["text"], 0, $value-3);
            $right = substr($_POST["text"], $value+1);
            $_POST["text"] = "".$left."".$right."";
            $value = contains("1*1*0", $_POST["text"]);
        }
        while( $value != -1) {
            $left = substr($_POST["text"], 0, $value-3);
            $right = substr($_POST["text"], $value+1);
            $_POST["text"] = "".$left."".$right."";
            $value = contains("1*1*0", $_POST["text"]);
        }
        while( $value3 != -1) {
            $left = substr($_POST["text"], 0, $value3-3);
            $right = substr($_POST["text"], $value3+1);
            $_POST["text"] = "".$left."".$right."";
            $value3 = contains("1*1*1*00", $_POST["text"]);
        }
        $value = contains("1*1*0", $_POST["text"]);
        $value2 = contains("1*2*0", $_POST["text"]);
        $value3 = contains("1*1*1*00", $_POST["text"]);
        while( $value != -1) {
            $left = substr($_POST["text"], 0, $value-3);
            $right = substr($_POST["text"], $value+1);
            $_POST["text"] = "".$left."".$right."";
            $value = contains("1*1*0", $_POST["text"]);
        }
        while( $value2 != -1) {
            $left = substr($_POST["text"], 0, $value2-3);
            $right = substr($_POST["text"], $value2+1);
            $_POST["text"] = "".$left."".$right."";
            $value2 = contains("1*2*0", $_POST["text"]);
        }
        while( $value3 != -1) {
            $left = substr($_POST["text"], 0, $value3-3);
            $right = substr($_POST["text"], $value3+1);
            $_POST["text"] = "".$left."".$right."";
            $value3 = contains("1*1*1*00", $_POST["text"]);
        }
        /*****************KENYAA****** */
        $value3 = contains("2*1*0", $_POST["text"]);
        $value4 = contains("2*2*0", $_POST["text"]);
        $value5 = contains("2*1*1*00", $_POST["text"]);
        while( $value3 != -1) {
            $left = substr($_POST["text"], 0, $value3-3);
            $right = substr($_POST["text"], $value3+1);
            $_POST["text"] = "".$left."".$right."";
            $value3 = contains("2*1*0", $_POST["text"]);
        }
        while( $value3 != -1) {
            $left = substr($_POST["text"], 0, $value3-3);
            $right = substr($_POST["text"], $value3+1);
            $_POST["text"] = "".$left."".$right."";
            $value3 = contains("2*1*0", $_POST["text"]);
        }
        while( $value5 != -1) {
            $left = substr($_POST["text"], 0, $value5-3);
            $right = substr($_POST["text"], $value5+1);
            $_POST["text"] = "".$left."".$right."";
            $value5 = contains("2*1*1*00", $_POST["text"]);
        }
        $value3 = contains("2*1*0", $_POST["text"]);
        $value4 = contains("2*2*0", $_POST["text"]);
        $value5 = contains("2*1*1*00", $_POST["text"]);
        while( $value3 != -1) {
            $left = substr($_POST["text"], 0, $value3-3);
            $right = substr($_POST["text"], $value3+1);
            $_POST["text"] = "".$left."".$right."";
            $value3 = contains("2*1*0", $_POST["text"]);
        }
        while( $value4 != -1) {
            $left = substr($_POST["text"], 0, $value4-3);
            $right = substr($_POST["text"], $value4+1);
            $_POST["text"] = "".$left."".$right."";
            $value4 = contains("2*2*0", $_POST["text"]);
        }
        while( $value5 != -1) {
            $left = substr($_POST["text"], 0, $value5-3);
            $right = substr($_POST["text"], $value5+1);
            $_POST["text"] = "".$left."".$right."";
            $value5 = contains("2*1*1*00", $_POST["text"]);
        }
        
        $text = $_POST["text"];
            if ($text == "") {
                $response  = "CON Welcome to EduAfrica, Choose Preferred Language\n";
                $response .= "1. English \n";
                $response .= "2. Swahili";
            // first response when a user dials our ussd code
            } 
            elseif ($text == "1" && $user_count==0) {
                $response = "CON  Language has been set to English\n";
                $response .= "1. Register \n";
                $response .= "2. About EduAfrica\n";
                $response .= "3. Developers\n";
                $response .= "0. Back to Language";
            }
             elseif ($text == "1*1" && $user_count==0) {
                $response = "CON Enter your first name";
                $check=$con->prepare("SELECT * FROM stu_ussd WHERE stu_phone=?");
                $check->setFetchMode(PDO:: FETCH_ASSOC);
                $check->execute([$phone]);
                $find=$check->rowCount();
                if($find==1){}else{
                    $user = $con->prepare("INSERT INTO stu_ussd(stu_phone) VALUES (?) ");
                    $user->execute([$phone]);
                }     
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 3 && $user_count==0) {
                $response = "CON Enter your last name";
                $firstname = $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_firstname=? WHERE stu_phone=?");
                $user->execute([$firstname,$phone]);
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 4 && $user_count==0) {
                $response = "CON Enter your middle name";
                $lastname =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_lastname=? WHERE stu_phone=?");
                $user->execute([$lastname,$phone]);
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 5 && $user_count==0) {
                $response = "CON Enter your State";
                $middlename =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_middlename=? WHERE stu_phone=?");
                $user->execute([$middlename,$phone]);
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 6 && $user_count==0) {
                $response = "CON Enter your Local Government";
                $state =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_state=? WHERE stu_phone=?");
                $user->execute([$state,$phone]);
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 7 && $user_count==0) {
                $response = "CON Enter your Year of Birth";
                $lga =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_lga=? WHERE stu_phone=?");
                $user->execute([$lga,$phone]);
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 8 && $user_count==0) {
                $response = "CON Enter your Month of Birth";
                $year =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_year=? WHERE stu_phone=?");
                $user->execute([$year,$phone]);
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 9 && $user_count==0) {
                $response = "CON Enter your Day of Birth ";
                $month =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_month=? WHERE stu_phone=?");
                $user->execute([$month,$phone]);
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 10 && $user_count==0) {
                $response = "CON Enter your Class";
                $day =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_day=? WHERE stu_phone=?");
                $user->execute([$day,$phone]);
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 1 && $level == 11 && $user_count==0) {
                // save data in the database
                $class =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_class=?,stu_status=?,stu_created_time=? WHERE stu_phone=?");
                if ($user->execute([$class,"YES",$now,$phone])) {
                    $response = "END Registered Successfully! Thank you for registering EduAfrica Learning Center .";
                }
            } elseif ($text == "1*2" && $user_count==0) {
                // when use response with option Laravel
                $response = "CON EduAfrica is a platform that bridges the gap where there is no internet access.\n ";
            } elseif ($text == "1*3" && $user_count==0) {
                // when use response with option Laravel
                $response = "CON EduAfrica is being developed by.\n  Abandy Roosevelt - rooseveltabandy@gmail.com\n Oviawe Princess \n";
            }
             elseif ($text == "1" && $user_count==1) {
                $response = "CON  Language has been set to English\n";
                $response .= "1. Take Class\n";
                $response .= "2. Student Details\n";
                $response .= "3. Trivial Question\n";
                $response .= "4. Fee Balance\n";
                $response .= "5. Subscribe for updates\n";
                $response .= "6. Exit";
            }
            elseif ($text == "1*3" && $user_count==1) {
                $response = "CON Welcome to the Quiz \n Answer All Questions \n ".$Q1."";
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 3 && $level == 3 && $user_count==1) {
                // $response = "CON ".$Q2."";
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a1 = $b['answer_1'];
                if ($a1==$answer) {
                    $z = $con->prepare("INSERT INTO quiz_answer (stu_phone,stu_score) VALUES (?,?)");
                    $z->execute([$phone,"1"]);
                    $a1 = $b['answer_1'];
                    $do = "correct";
                } else {
                    $z = $con->prepare("INSERT INTO quiz_answer (stu_phone,stu_score) VALUES (?,?)");
                    $z->execute([$phone,"0"]);
                    $a1 = $b['answer_1'];
                    $do = "wrong";
                }
                $response = "CON Question 1 ".$do."\n ".$Q2."";
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 3 && $level == 4 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a2 = $b['answer_2'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a2==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a2 = $b['answer_2'];
                    $do = "correct";
                } else {
                    $do = "wrong";
                }
                $response = "CON Question 2 ".$do."\n ".$Q3."";
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 3 && $level == 5 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a3 = $b['answer_3'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a3==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a3 = $b['answer_3'];
                    $do = "correct";
                } else {
                    $do = "wrong";
                }
                $response = "CON Question 3 ".$do."\n ".$Q4."";
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 3 && $level == 5 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a3 = $b['answer_3'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a3==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a3 = $b['answer_3'];
                    $do = "correct";
                } else {
                    $do = "wrong";
                }
                $response = "CON Question 3 ".$do."\n ".$Q4."";
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 3 && $level == 6 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a4 = $b['answer_4'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a4==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a4 = $b['answer_4'];
                    $do = "correct";
                } else {
                    $do = "wrong";
                }
                $response = "CON Question 4 ".$do."\n ".$Q5."";
            } elseif ($ussd_string_exploded[0] == 1 && $ussd_string_exploded[1] == 3 && $level == 7 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a4 = $b['answer_5'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a4==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a5 = $b['answer_5'];
                    $do = "correct";
                } else {
                    $do = "wrong";
                }
                $s = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $s->setFetchMode(PDO:: FETCH_ASSOC);
                $s->execute([$phone]);
                $sc = $s->fetch();
                $score=$sc['stu_score'];
                $response = "END Question 5 ".$do."\n \nYour total score is ".$score."/5";
            } 
            elseif ($text == "1*1" && $user_count==1) {
                $response = "CON Choose Subject\n";
                $response .= "1. Mathematics\n";
                $response .= "2. English\n";
                $response .= "3. Civic Education\n";
                $response .= "0. Back";
            }
            elseif ($text == "1*1*2" && $user_count==1) {
                $response = "END English Coming Soon!!!\n";
            }
            elseif ($text == "1*1*3" && $user_count==1) {
                $response = "END Civic Education Coming Soon!!!\n";
            }
            // elseif ($text == "1*1" && $user_count==1) {
            //     $response = "CON Choose Subject\n";
            //     $response .= "1. Mathematics\n";
            //     $response .= "2. English\n";
            //     $response .= "3. Civic Education\n";
            //     $response .= "0. Back";
            // }
             elseif ($text == "1*2" && $user_count==1) {
                $response = "CON Student Details\n Firstname: ".$student_firstname."\n Lastname: ".$student_lastname. "\n Local Government: ".$student_lga."\n Status: ".$student_status. "\n";
                $response .= "0. Back";
            } elseif ($text == "1*6" && $user_count==1) {
                $response = "END Thank you for choosing EduAfrica\n";
            } elseif ($text == "1*5" && $user_count==1) {
                $user = $con->prepare("UPDATE stu_ussd SET stu_update=? WHERE stu_phone=?");
                if ($user->execute(["YES",$phone])) {
                    $response = "END You have Successfully Registered for updates";
                }
            } elseif ($text == "1*4" && $user_count==1) {
                $response = "END Dear ".$student_firstname." ".$student_lastname. "\n Your Due Balance is ".$student_balance."";
            }
            elseif ($text == "1*1*1" && $user_count==1) {
                $response = "CON About Mathematic\n";
                $response .= "1. Assignment\n";
                $response .= "2. Test\n";
                $response .= "3. Check Test Score\n";
                $response .= "4. Conversions\n";
                $response .= "00. Back";
            }
            elseif ($text == "1*1*1*1" && $user_count==1) {
                $response = "END MATHS Assignment\n Study the Following Multiplication Table\n 2 Multiplication Table \n 3 Multiplication Table \n 4 Multiplication \n 5 Multiplication Table\n Study before 7th May, 2021";
            }
            elseif ($text == "1*1*1*2" && $user_count==1) {
                $response = "END No Mathematic Test Yet\n";

            }
            elseif ($text == "1*1*1*3" && $user_count==1) {
                $response = "END TEXT Your TEST Score is ";
            }
            elseif ($text == "1*1*1*4" && $user_count==1) {
                $response = "END Converting metric units of length\n 1 km = 1,000 m \n 1 m = 100 cm \n 1 cm = 10 mm \n 1 m = 1,000 mm \n F° TO C°\n To convert temperatures in degrees Fahrenheit to Celsius, subtract 32 and multiply by .5556 (or 5/9). \n C° TO F°\n To convert temperatures in degrees Celsius to Fahrenheit, multiply by 1.8 (or 9/5) and add 32";

            }
            /******* For SWAHILI***** */


            elseif ($text == "2" && $user_count==0) {
                        $response = "CON  Language has been set to English\n";
                        $response .= "1. usajili \n";
                        $response .= "2. kuhusu EduAfrica\n";
                        $response .= "3. waundaji\n";
                        $response .= "0. kurudi kwa lugha\n";
            }
             elseif ($text == "2*1" && $user_count==0) {
                $response = "CON Jina lako la kwanza ni nani?";
                $check=$con->prepare("SELECT * FROM stu_ussd WHERE stu_phone=?");
                $check->setFetchMode(PDO:: FETCH_ASSOC);
                $check->execute([$phone]);
                $find=$check->rowCount();
                if($find==1){}else{
                    $user = $con->prepare("INSERT INTO stu_ussd(stu_phone) VALUES (?) ");
                    $user->execute([$phone]);
                }  
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 3 && $user_count==0) {
                $response = "CON Jina lako la mwisho ni nani?";
                $firstname = $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_firstname=? WHERE stu_phone=?");
                $user->execute([$firstname,$phone]);
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 4 && $user_count==0) {
                $response = "CON Jina lako la kati unaitwa nani?";
                $lastname =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_lastname=? WHERE stu_phone=?");
                $user->execute([$lastname,$phone]);
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 5 && $user_count==0) {
                $response = "CON Wewe unatoka jimbo gani?";
                $middlename =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_middlename=? WHERE stu_phone=?");
                $user->execute([$middlename,$phone]);
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 6 && $user_count==0) {
                $response = "CON Serikali yako ya mtaa ni nini?";
                $state =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_state=? WHERE stu_phone=?");
                $user->execute([$state,$phone]);
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 7 && $user_count==0) {
                $response = "CON Je! Ni mwaka wako wa kuzaliwa?";
                $lga =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_lga=? WHERE stu_phone=?");
                $user->execute([$lga,$phone]);
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 8 && $user_count==0) {
                $response = "CON Je! Mwezi wako wa kuzaliwa ni nini?";
                $year =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_year=? WHERE stu_phone=?");
                $user->execute([$year,$phone]);
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 9 && $user_count==0) {
                $response = "CON Je! Ni siku yako ya kuzaliwa? ";
                $month =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_month=? WHERE stu_phone=?");
                $user->execute([$month,$phone]);
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 10 && $user_count==0) {
                $response = "CON Je! Uko darasa gani?";
                $day =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_day=? WHERE stu_phone=?");
                $user->execute([$day,$phone]);
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 11 && $user_count==0) {
                // save data in the database
                $class =  $userResponse;
                $user = $con->prepare("UPDATE stu_ussd SET stu_class=?,stu_status=?,stu_created_time=? WHERE stu_phone=?");
                if ($user->execute([$class,"YES",$now,$phone])) {
                    $response = "END Usajili Umefanikiwa! Asante kwa kusajili Kituo cha Kujifunza cha Edu Africa .";
                }
            } elseif ($text == "2*2" && $user_count==0) {
                // when use response with option Laravel
                $response = "CON EduAfrica ni jukwaa ambalo huziba pengo ambapo hakuna ufikiaji wa mtandao.\n ";
            } elseif ($text == "2*3" && $user_count==0) {
                // when use response with option Laravel
                $response = "CON EduAfrica inaundwa na.\n  Abandy Roosevelt\n Oviawe Princess \n Gregory \n Busola \n Vallery";
            }
             elseif ($text == "2" && $user_count==1) {
                $response = "CON  Lugha imewekwa kwa Kiswahili\n";
                $response .= "1. Chagua Darasa\n";
                $response .= "2. Maelezo ya Wanafunzi\n";
                $response .= "3. swali dogo\n";
                $response .= "4. Usawa wa ada\n";
                $response .= "5. Jisajili ili upate sasisho\n";
                $response .= "6. Utgång";
            }
            elseif ($text == "2*3" && $user_count==1) {
                $response = "CON Karibu kwenye jaribio \n Jaribu maswali yote \n ".$Q1."";
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 3 && $level == 3 && $user_count==1) {
                // $response = "CON ".$Q2."";
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a1 = $b['answer_1'];
                if ($a1==$answer) {
                    $z = $con->prepare("INSERT INTO quiz_answer (stu_phone,stu_score) VALUES (?,?)");
                    $z->execute([$phone,"1"]);
                    $a1 = $b['answer_1'];
                    $do = "sahihisha";
                } else {
                    $z = $con->prepare("INSERT INTO quiz_answer (stu_phone,stu_score) VALUES (?,?)");
                    $z->execute([$phone,"0"]);
                    $a1 = $b['answer_1'];
                    $do = "vibaya";
                }
                $response = "CON Swali la 1 ".$do."\n ".$Q2."";
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 3 && $level == 4 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a2 = $b['answer_2'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a2==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a2 = $b['answer_2'];
                    $do = "sahihisha";
                } else {
                    $do = "vibaya";
                }
                $response = "CON Swali la 2 ".$do."\n ".$Q3."";
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 3 && $level == 5 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a3 = $b['answer_3'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a3==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a3 = $b['answer_3'];
                    $do = "sahihisha";
                } else {
                    $do = "vibaya";
                }
                $response = "CON Swali la 3 ".$do."\n ".$Q4."";
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 3 && $level == 5 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a3 = $b['answer_3'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a3==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a3 = $b['answer_3'];
                    $do = "sahihisha";
                } else {
                    $do = "vibaya";
                }
                $response = "CON Swali la 3 ".$do."\n ".$Q4."";
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 3 && $level == 6 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a4 = $b['answer_4'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a4==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a4 = $b['answer_4'];
                    $do = "sahihisha";
                } else {
                    $do = "vibaya";
                }
                $response = "CON Swali la 4 ".$do."\n ".$Q5."";
            } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 3 && $level == 7 && $user_count==1) {
                $answer = $userResponse;
                $a = $con->prepare("SELECT * FROM stu_ussd_quiz_6");
                $a->setFetchMode(PDO:: FETCH_ASSOC);
                $a->execute();
                $b = $a->fetch();
                $a4 = $b['answer_5'];

                $u = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $u->setFetchMode(PDO:: FETCH_ASSOC);
                $u->execute([$phone]);
                $us = $u->fetch();
                $user=$us['id'];

                if ($a4==$answer) {
                    $z = $con->prepare("UPDATE quiz_answer SET stu_score=stu_score+1 WHERE id=?");
                    $z->execute([$user]);
                    $a5 = $b['answer_5'];
                    $do = "sahihisha";
                } else {
                    $do = "vibaya";
                }
                $s = $con->prepare("SELECT * FROM quiz_answer WHERE id IN (SELECT MAX(id) FROM quiz_answer GROUP BY stu_phone) AND stu_phone=?");
                $s->setFetchMode(PDO:: FETCH_ASSOC);
                $s->execute([$phone]);
                $sc = $s->fetch();
                $score=$sc['stu_score'];
                $response = "END Swali la 5 ".$do."\n \nAlama yako yote ni ".$score."/5";
            } 
            elseif ($text == "2*1" && $user_count==1) {
                $response = "CON Chagua Somo\n";
                $response .= "1. Hisabati\n";
                $response .= "2. Kiswahili\n";
                $response .= "3. Elimu ya Uraia\n";
                $response .= "0. nenda kwa uliopita";
            }
            elseif ($text == "2*1*2" && $user_count==1) {
                $response = "END Kiswahili kinakuja hivi karibuni!!!\n";
            }
            elseif ($text == "2*1*3" && $user_count==1) {
                $response = "END Elimu ya Uraia inakuja hivi karibuni!!!\n";
            }
            // elseif ($text == "1*1" && $user_count==1) {
            //     $response = "CON Choose Subject\n";
            //     $response .= "1. Mathematics\n";
            //     $response .= "2. English\n";
            //     $response .= "3. Civic Education\n";
            //     $response .= "0. Back";
            // }
             elseif ($text == "2*2" && $user_count==1) {
                $response = "CON Maelezo ya Wanafunzi\n Jina la kwanza: ".$student_firstname."\n Jina la familia: ".$student_lastname. "\n Jina la familia: ".$student_lga."\n Hali: ".$student_status. "\n";
                $response .= "0. nenda kwa uliopita";
            } elseif ($text == "2*6" && $user_count==1) {
                $response = "END Asante kwa kuchagua EduAfrica\n";
            } elseif ($text == "2*5" && $user_count==1) {
                $user = $con->prepare("UPDATE stu_ussd SET stu_update=? WHERE stu_phone=?");
                if ($user->execute(["YES",$phone])) {
                    $response = "END Umefanikiwa kujiandikisha kupata sasisho";
                }
            } elseif ($text == "2*4" && $user_count==1) {
                $response = "END Mpendwa ".$student_firstname." ".$student_lastname. "\n Usawa wako unaofaa ni ".$student_balance."";
            }
            elseif ($text == "2*1*1" && $user_count==1) {
                $response = "CON Kuhusu Hisabati\n";
                $response .= "1. Kazi\n";
                $response .= "2. Jaribu\n";
                $response .= "3. Angalia Alama ya Mtihani\n";
                $response .= "4. Uongofu wa Kitengo\n";
                $response .= "00. Rudi kwenye menyu kuu";
            }
            elseif ($text == "2*1*1*1" && $user_count==1) {
                $response = "END Kazi ya Hisabati\n Jifunze meza ifuatayo ya kuzidisha\n Jifunze kabla ya Mei 7, 2021";
            }
            elseif ($text == "2*1*1*2" && $user_count==1) {
                $response = "END Hakuna Mtihani wa Hesabu bado\n";

            }
            elseif ($text == "2*1*1*3" && $user_count==1) {
                $response = "END Alama yako ya Mtihani";
            }
            elseif ($text == "2*1*1*4" && $user_count==1) {
                $response = "END Kubadilisha vitengo vya urefu wa mita\n 1 km = 1,000 m \n 1 m = 100 cm \n 1 cm = 10 mm \n 1 m = 1,000 mm \n F ° HADI C °\n Kubadilisha joto kwa digrii Fahrenheit kuwa Celsius, toa 32 na kuzidisha kwa .5556 (au 5/9). \n C ° HADI F °\n Kubadilisha joto kwa digrii Celsius kuwa Fahrenheit, kuzidisha kwa 1.8 (au 9/5) na kuongeza 32";

            }

            
            
        
            // when user respond with option one to register
            // elseif ($text == "2") {
            //     $check_phone=$con->prepare("SELECT * FROM ken_stu_ussd WHERE stu_phone=? AND stu_status=?");
            //     $check_phone->setFetchMode(PDO:: FETCH_ASSOC);
            //     $check_phone->execute([$phone,"YES"]);
            //     $user_count=$check_phone->rowCount();
            //     if ($user_count==1) {
            //         $response = "CON  Language has been set to English\n";
            //         $response .= "1. Take Class\n";
            //         $response .= "2. Student Details\n";
            //         $response .= "3. Trivial Question\n";
            //         $response .= "4. Fee Balance\n";
            //         $response .= "5. Subscribe for updates\n";
            //         $response .= "6. Exit";
            //     } else {
            //         if ($text == "2") {
            //             // Our response a user respond with input 2 from our first level
            //             $response = "CON  lugha imewekwa kiswahili\n";
            //             $response .= "1. usajili \n";
            //             $response .= "2. kuhusu EduAfrica\n";
            //             $response .= "3. waundaji\n";
            //             $response .= "0. kurudi kwa lugha\n";
            //         } elseif ($text == "2*1") {
            //             // when use response with option django
            //             $response = "CON jina lako la kwanza ni nani";
            //             $user = $con->prepare("INSERT INTO ken_stu_ussd(stu_phone)
            //         VALUES (?)");
            //             $user->execute([$phone]);
            //         } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 3) {
            //             $response = "CON jina lako la mwisho ni nani";
            //             $firstname = $userResponse;
            //             $user = $con->prepare("UPDATE ken_stu_ussd SET stu_firstname=? WHERE stu_phone=?");
            //             $user->execute([$firstname,$phone]);
            //         } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 4) {
            //             $response = "CON jina lako la kati ni nani";
            //             $lastname =  $userResponse;
            //             $user = $con->prepare("UPDATE ken_stu_ussd SET stu_lastname=? WHERE stu_phone=?");
            //             $user->execute([$lastname,$phone]);
            //         } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 5) {
            //             $response = "CON Kata";
            //             $middlename =  $userResponse;
            //             $user = $con->prepare("UPDATE ken_stu_ussd SET stu_middlename=? WHERE stu_phone=?");
            //             $user->execute([$middlename,$phone]);
            //         } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 6) {
            //             $response = "CON serikali ya Mtaa";
            //             $state =  $userResponse;
            //             $user = $con->prepare("UPDATE ken_stu_ussd SET stu_state=? WHERE stu_phone=?");
            //             $user->execute([$state,$phone]);
            //         } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 7) {
            //             $response = "CON mwaka wa kuzaliwa";
            //             $lga =  $userResponse;
            //             $user = $con->prepare("UPDATE ken_stu_ussd SET stu_lga=? WHERE stu_phone=?");
            //             $user->execute([$lga,$phone]);
            //         } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 8) {
            //             $response = "CON mwezi wa kuzaliwa";
            //             $year =  $userResponse;
            //             $user = $con->prepare("UPDATE ken_stu_ussd SET stu_year=? WHERE stu_phone=?");
            //             $user->execute([$year,$phone]);
            //         } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 9) {
            //             $response = "CON siku ya kuzaliwa";
            //             $month =  $userResponse;
            //             $user = $con->prepare("UPDATE ken_stu_ussd SET stu_month=? WHERE stu_phone=?");
            //             $user->execute([$month,$phone]);
            //         } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 10) {
            //             $response = "CON darasa";
            //             $day =  $userResponse;
            //             $user = $con->prepare("UPDATE ken_stu_ussd SET stu_day=? WHERE stu_phone=?");
            //             $user->execute([$day,$phone]);
            //         } elseif ($ussd_string_exploded[0] == 2 && $ussd_string_exploded[1] == 1 && $level == 11) {
            //             // save data in the database
            //             $user = $con->prepare("UPDATE ken_stu_ussd SET stu_class=?,stu_status=? WHERE stu_phone=?");
            //             if ($user->execute([$class,"YES",$phone])) {
            //                 $response = "END Usajili Umefanikiwa! Asante kwa kusajili Kituo cha Kujifunza cha Edu Africa..";
            //             }
            //         } elseif ($text == "2*2") {
            //             // when use response with option Laravel
            //             $response = "CON EduAfrica bu ikpo okwu nke jikoro oghere ebe adighi uzo intaneti.\n ";
            //         } elseif ($text == "2*3") {
            //             // when use response with option Laravel
            //             $response = "CON EduAfrica na emeputa site na.\n  Abandy Roosevelt - rooseveltabandy@gmail.com\n Oviawe Princess \n";
            //         }
            //     }
            // }
 
    // send your response back to the API
    header('Content-type: text/plain');
    echo $response;
 
?>