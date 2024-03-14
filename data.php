<?php

    require_once('connection.php');

    if (empty($_GET)) {
        $query = mysqli_query( $connection, "SELECT * FROM tiket_film" );

        $result = array();

        while($row = mysqli_fetch_array($query)) {
            array_push($result, array(
                'nomor_id' =>$row['nomor_id'],
                'judul_film' =>$row['judul_film'],
                'harga_film' =>$row['harga_film']
            ));
        }
        echo json_encode(
            array( 'result' => $result )
        );
        
    } else {
        $query = mysqli_query( $connection, "SELECT * FROM tiket_film WHERE nomor_id=". $_GET
        ['nomor_id']);

        $result = array ();
        while($row = $query->fetch_assoc()) {
            $result = array (
                'nomor_id' => $row['nomor_id'],
                'judul_film' => $row['judul_film'],
                'harga_film' => $row['harga_film'],
                'tanggal_tayang' => $row['tanggal_tayang']
            );
        }

        echo json_encode (
            $result
        );

    }

?>