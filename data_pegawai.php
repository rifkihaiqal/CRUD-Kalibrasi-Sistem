<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' )) {

    // nama table
    $table = 'pegawai';
    // Table's primary key
    $primaryKey = 'equipment';

    $columns = array(
        array( 'db' => 'foto', 'dt' => 1 ),
        array( 'db' => 'equipment', 'dt' => 2 ),
        array( 'db' => 'area', 'dt' => 3 ),
        array(
            'db' => 'caldate',
            'dt' => 4,
            'formatter' => function( $d, $row ) {
                return date('d-m-Y', strtotime($d));
            }
        ),
        array(
            'db' => 'frekuensi',
            'dt' => 5,
            'formatter' => function( $d, $row ) {
                if ($d=='1/M') {
                    $frekuensi = "1/M";
                } if ($d=='1/3M') {
                    $frekuensi = "1/3M";
                } if ($d=='1/6M') {
                    $frekuensi = "1/6M";
                }if ($d=='1/6M') {
                    $frekuensi = "1/Y"; 
                }else {
                    $frekuensi = "1/2Y";
                }
                return $frekuensi;
            }
        ),
        array( 'db' => 'merk', 'dt' => 6 ),
        array( 'db' => 'itemcheck', 'dt' => 7 ),
        array( 'db' => 'actual', 'dt' => 8 ),
    );

    // SQL server connection information
    require_once "config/database.php";
    // ssp class
    require 'config/ssp.class.php';
    // require 'config/ssp.class.php';

    echo json_encode(
        SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    );
} else {
    echo '<script>window.location="index.php"</script>';
}
?>