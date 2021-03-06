<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");
include("redirect.php");

$stable = $_SESSION["stable"];

$sql = mysqli_query($conn, "SELECT * FROM $stable ORDER BY id DESC");
echo "
    <center>
    <div class='container bg-white rounded shadow p-3 m-3'>
    <div class='container text-center pt-3 pb-3'>
        <h5>Transaction History</h5>
        <div class='dropdown-divider'></div>
        <p class='text-muted small'>You can get a transaction history from your online activity.</p>
    </div>
        <div class='container pb-3'>
            <table id='dtBasicExample' class='table  table-bordered table-hover ' >
                <thead >
                    <tr >
                        <th ><b>Ref. No.</b></th>
                        <th ><b>Expense</b></th>
                        <th ><b>Income</b></th>
                        <th><b>Balance</b></th>
                        <th ><b>Notes</b></th>
                        <th ><b>Date/Time</b></th>
                    </tr>
                </thead>
    ";

while($row = mysqli_fetch_assoc($sql)) {
    $db_refno = $row["refno"];
    $db_debit = $row["debit"];
    $db_credit = $row["credit"];
    $db_bal = $row["bal"];
    $db_notes = $row["notes"];
    $db_datetime = $row["date_time"];
echo "
        <tr>
            <td>$db_refno</td> 
            <td>$db_debit</td>
            <td>$db_credit</td>
            <td>$db_bal</td>
            <td>$db_notes</td>
            <td>$db_datetime</td>
        </tr>
    ";
}


echo "
    </table>
    </div>
    </div>
    </center>
    ";

?>
<title>Transaction History | Moneygment</title>
<?php include("footer.php");?>