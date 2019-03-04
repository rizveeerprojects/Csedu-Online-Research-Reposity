<?php
    /* Purpose of this file is to update file view for research_group */
    class File_View_Update{

        function work($main_object,$view){
            if(isset($_SESSION["account"]) && isset($_SESSION["research_group"])){
                $query_make = New Query_Make();
                $attribute = array("view");
                $value = array($view);
                $condition_col = array("id");
                $condition_val = array($_SESSION["research_group"]);
                $sql = $query_make->update_query($query_make,"Files",$attribute,$value,$condition_col,$condition_val);
                $result = $main_object->exeute_query($main_object,$sql);
                if($result){
                    echo "successful";
                }
                else {
                    echo "unsuccessful";
                }
            }
        }

             //executing query
        function exeute_query($main_object,$sql){
            $sql_query = new SQL_Query();
            $result = $sql_query->query_execute_return_result($sql_query,$sql); 
            return $result; 
        }
    }


?>