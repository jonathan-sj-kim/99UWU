<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser ="root";
    $dbpass ="";
    $db = "99UWU";
    //$connection_string = "dbhost.students.cs.ubc.ca:1522/stu";
    //$ociuser ="ora_jonkim99";
    //$ocipass ="a46095295";

    $conn = new mysqli($dbhost, $dbuser,
    $dbpass,$db) or die("Connect failed: %s\n".
    $conn -> error);

    //$dconn = OCILogon($ociuser, $ocipass, $connection_string);

    return $conn;


    /*if ($dconn) {
        echo "Database is Connected";
        return $dconn;
    } else {
        echo "Cannot connect to Database";
        $e = OCI_Error(); // For OCILogon errors pass no handle
        echo htmlentities($e['message']);
        return false;
    }*/

}
function CloseCon($conn)
{
    $conn -> close();
}