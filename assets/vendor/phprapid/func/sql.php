<?php

/** 
 * https://github.com/Shaxadhere/phprapid
 *
 * Tested on PHP 7.4
 *
 * Copyright Shehzad Ahmed 
 * https://shaxad.netlify.app
 * https://github.com/Shaxadhere

 * Released under the GNU GENERAL PUBLIC LICENSE
 * 
 *
 * Date: 2020-08-23
 */

//this method inserts values in a table by writing mysql query//
/**
 * inserts values in a table by writing mysql query
 *
 * @param String   $table  expects table name
 * @param Array   $fields  expects field names in array
 * @param Array   $values  expects values in array
 * @param mysqli_connect   $conn  expects database connection
 * 
 */
function insertData(string $table, array $fields, array $values, $conn)
{
    //breaking fields array//
    $quote = '';
    $c = 0;
    foreach ($fields as $item) {
        $quote .= "`$item`";
        $c++;
        if ($c < count($fields)) {
            $quote .= ',';
        }
    }
    //breaking values array//
    $valQuote = '';
    $valc = 0;
    foreach ($values as $item) {
        $valQuote .= "'$item'";
        $valc++;
        if ($valc < count($fields)) {
            $valQuote .= ',';
        }
    }
    //bulding query for the fields and values//
    $query = "insert into `$table` (" . $quote . ") values (" . $valQuote . ")";
    mysqli_query($conn, $query);
}

// //this method inserts values in a table and returns the inserted row by writing mysql query//
// /**
//  * inserts values in a table and returns the inserted row by writing mysql query
//  *
//  * @param String   $table  expects table name
//  * @param Array   $fields  expects field names in array
//  * @param Array   $values  expects values in array
//  * @param String $PrimaryKey expects primary key column name
//  * @param mysqli_connect   $conn  expects database connection
//  * 
//  */ 
// function insertAndFetchData(string $table,array $fields,array $values,string $PrimaryKey, $conn){
//     //breaking fields array//
//     $quote = '';
//     $c = 0;
//     foreach ($fields as $item) {
//         $quote.="`$item`";
//         $c++;
//         if($c < count($fields))
//         {
//             $quote.=',';
//         }
//     }
//     //breaking values array//
//     $valQuote = '';
//     $valc = 0;
//     foreach ($values as $item) {
//         $valQuote.="'$item'";
//         $valc++;
//         if($valc < count($fields))
//         {
//             $valQuote.=',';
//         }
//     }
//     //bulding query for the fields and values//
//     $query = "insert into `$table` (".$quote.") values (".$valQuote."); select *from $table where $PrimaryKey=(SELECT LAST_INSERT_ID())";
//     mysqli_query($conn, $query);
// }

/**
 * fetches values from a table by writing mysql query
 *
 * @param String   $table  expects table name
 * @param mysqli_connect   $conn  expects database connection
 * 
 * @return mysqli_query_result
 * 
 */
function fetchData(string $table, $conn)
{
    $query = "select * from `" . $table . "`";
    return mysqli_query($conn, $query);
}

/**
 * fetches values from a table with a specific primary key value by writing mysql query
 *
 * @param String   $table  expects table name
 * @param String   $PrimaryKey  expects primary key column name
 * @param Integer   $id  expects primary key value
 * @param mysqli_connect   $conn  expects database connection
 * 
 * @return mysqli_query_result
 */
function fetchDataById(string $table, string $PrimaryKey, $id, $conn)
{
    $query = "select * from `$table` where $PrimaryKey = $id";
    return mysqli_query($conn, $query);
}

/**
 * deletes values in a table with a specific primary key value by writing mysql query
 *
 * @param String   $table  expects table name
 * @param String   $PrimaryKey  expects primary key column name
 * @param Integer   $id  expects primary key value
 * @param mysqli_connect   $conn  expects database connection
 * 
 * @return mysqli_query_result
 */
function deleteDataById(string $table, string $PrimaryKey, $id, $conn)
{
    $query = "DELETE FROM `$table` WHERE $PrimaryKey = $id";
    mysqli_query($conn, $query);
}

/**
 * edits values in a table with a specific primary key value by writing mysql query
 *
 * @param String   $table  expects table name
 * @param Array   $data  expects data in array as array("column1", value1, "column2", "value2"...)
 * @param String   $PrimaryKey  expects primary key column name
 * @param Integer   $id  expects primary key value
 * @param mysqli_connect   $conn  expects database connection
 * 
 */
function editData(string $table, array $data, string $PrimaryKey, $id, $conn)
{
    //breaking data array//
    $ini = '';
    $c = 0;
    $mm = count($data);
    foreach ($data as $item) {
        $c++;
        if ($mm % 2 == 0) {
            $ini .= "`$item`=";
        }
        if ($mm % 2 != 0) {
            $ini .= "'$item'";
        }
        if ($mm % 2 != 0 && $c < count($data)) {
            $ini .= ',';
        }
        if ($c == count($data)) {
            $ini .= '';
        }
        $mm--;
    }
    $query = "UPDATE `$table` SET $ini WHERE $PrimaryKey = $id";
    $res = mysqli_query($conn, $query);
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return true;
}


/**
 * checks if same value already exists
 *
 * @param String   $table  expects table name
 * @param String   $column_name  expects column name
 * @param Value   $value  expects value
 * @param mysqli_connect   $conn  expects database connection
 * 
 * @return Boolean
 */
function checkExistance($table, $column_name, $value, $conn, $extra_query)
{
    if(empty($extra_query)){
        $res = mysqli_query($conn, "select count($column_name) from $table where $column_name = '$value'");
    }
    else{
        $res = mysqli_query($conn, "select count($column_name) from $table where $column_name = '$value' and $extra_query");
    }
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    $num = mysqli_fetch_array($res);
    if ($num[0] == 0) {
        return false;
    } else {
        return true;
    }
}


//this method verifies values from a specific table by writing mysql query//

/**
 * verifies values from a specific table by writing mysql query
 *
 * @param String   $table  expects table name
 * @param Array   $data  expects data in array as array("column1", value1, "column2", "value2"...)
 * @param mysqli_connect   $conn  expects database connection
 * 
 * @return mysqli_query_results
 */
function verifyValues(string $table, array $data, $conn)
{

    //breaking data array//
    $ini = '';
    $c = 0;
    $mm = count($data);
    foreach ($data as $item) {
        $c++;
        if ($mm % 2 == 0) {
            $ini .= "`$item`=";
        }
        if ($mm % 2 != 0) {
            $ini .= "'$item'";
        }
        if ($mm % 2 != 0 && $c < count($data)) {
            $ini .= ' and ';
        }
        if ($c == count($data)) {
            $ini .= '';
        }
        $mm--;
    }

    $query = "SELECT * FROM `$table` WHERE $ini";
    $res = mysqli_query($conn, $query);
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return $res;
}

//this method fetches last row of a specific table by writing mysql query//

/**
 * fetches last row of a specific table by writing mysql query
 *
 * @param String   $table  expects table name
 * @param String   $PrimaryKey  expects primary key column name
 * @param mysqli_connect   $conn  expects database connection
 * 
 * @return Array
 */
function getLastRow($table, $PrimaryKey, $conn)
{
    $res = mysqli_query($conn, "SELECT * FROM $table ORDER BY $PrimaryKey DESC LIMIT 1");
    if (!$res) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
    return mysqli_fetch_array($res);
}

function excelToMysql($file, $examID, $connect)
{
    $extension = end(explode(".", $file["name"]));
    $allowed_extension = array("xls", "xlsx", "csv");
    if (in_array($extension, $allowed_extension)) {
        $file = $file["tmp_name"];
        $objPHPExcel = PHPExcel_IOFactory::load($file);
        foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
            $highestRow = $worksheet->getHighestRow();
            for ($row = 2; $row <= $highestRow; $row++) {
                $QuestionText = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
                $WrongAnswer1 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
                $WrongAnswer2 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
                $WrongAnswer3 = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
                $CorrectAnswer = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                $Marks = mysqli_real_escape_string($connect, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
                $query = "INSERT INTO `tbl_mcqs_questions`(`QuestionText`, `WrongAnswer1`, `WrongAnswer2`, `WrongAnswer3`, `CorrectAnswer`, `Marks`, `FK_ExamMQues`)" .
                " VALUES ('" . $QuestionText . "', '" . $WrongAnswer1 . "', '" . $WrongAnswer2 . "', '" . $WrongAnswer3 . "', '" . $CorrectAnswer . "', '" . $Marks . "', '" . $examID . "')";
                mysqli_query($connect, $query);
            }
        }
    } else {
        return false;
    }
}
