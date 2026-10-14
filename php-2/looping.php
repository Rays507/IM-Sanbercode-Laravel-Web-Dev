<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Looping</title>

</head>

<body>

    <h1>Berlatih Looping</h1>    
     <?php 

        echo "<h3>Soal No 1 Looping I Love PHP</h3>";

        /* 

            Soal No 1 

            Looping I Love PHP

            Lakukan Perulangan (boleh for/while/do while) sebanyak 20 iterasi. Looping terbagi menjadi dua: Looping yang pertama Ascending (meningkat) 

            dan Looping yang ke dua menurun (Descending).             
Output: 

            LOOPING PERTAMA

            2 - I Love PHP

            4 - I Love PHP

            6 - I Love PHP

            8 - I Love PHP

            10 - I Love PHP

            12 - I Love PHP

            14 - I Love PHP

            16 - I Love PHP

            18 - I Love PHP

            20- I Love PHP

            LOOPING KEDUA

            20 - I Love PHP

            18 - I Love PHP

            16 - I Love PHP

            14 - I Love PHP

            12 - I Love PHP

            10 - I Love PHP

            8 - I Love PHP

            6 - I Love PHP

            4 - I Love PHP

            2 - I Love PHP

        */

        echo "Soal No 1";
        echo "<br>";
        echo "LOOPING PERTAMA";
        echo "<br>";
        echo "<br>";
        for($i=1;$i<=20;$i++)
            {   
                if ($i % 2 == 0) // melakukan pengecekan apakah isi dari $i bernilai genap
                    {echo $i." - I Love PHP<br><br>";}
            }
        echo "LOOPING KEDUA";
        echo "<br>";
        echo "<br>";
        for($x=20;$x>=1;$x--)
            {   
                if ($x % 2 == 0) // melakukan pengecekan apakah isi dari $i bernilai ganjil
                    {echo $x." - I Love PHP<br><br>";}
            }




        /* 

            Soal No 2

            Loop Associative Array

            Terdapat data items dalam bentuk array dimensi. Buatlah data tersebut ke dalam bentuk Array Asosiatif. 

            Setiap item memiliki key yaitu : id, name, price, description, source. 

            

            Output: 

            Array ( [id] => 001 [name] => Keyboard Logitek [price] => 60000 [description] => Keyboard yang mantap untuk kantoran [source] => logitek.jpeg ) 

            Array ( [id] => 002 [name] => Keyboard MSI [price] => 300000 [description] => Keyboard gaming MSI mekanik [source] => msi.jpeg ) 

            Array ( [id] => 003 [name] => Mouse Genius [price] => 50000 [description] => Mouse Genius biar lebih pinter [source] => genius.jpeg ) 

            Array ( [id] => 004 [name] => Mouse Jerry [price] => 30000 [description] => Mouse yang disukai kucing [source] => jerry.jpeg )             
        Jangan ubah variabel $items        */


        $items = [

            ['001', 'Keyboard Logitek', 60000, 'Keyboard yang mantap untuk kantoran', 'logitek.jpeg'], 

            ['002', 'Keyboard MSI', 300000, 'Keyboard gaming MSI mekanik', 'msi.jpeg'],

            ['003', 'Mouse Genius', 50000, 'Mouse Genius biar lebih pinter', 'genius.jpeg'],

            ['004', 'Mouse Jerry', 30000, 'Mouse yang disukai kucing', 'jerry.jpeg']

        ];

        

        // Output: 
        echo "Soal No 2";
        echo "<br>";
        echo "<br>";

        foreach($items as $arrBarang)
            {
                $info_barang = 
                [
                    "id" => $arrBarang[0],
                    "name" => $arrBarang[1],
                    "price" => $arrBarang[2],
                    "description" => $arrBarang[3],
                    "source" => $arrBarang[4],
                ];

                print_r ($info_barang);
                echo "<br><br>";
            }

        

        echo "<h3>Soal No 3 Asterix </h3>";

        /* 

            Soal No 3

            Asterix 5x5

            Tampilkan dengan looping dan echo agar menghasilkan kumpulan bintang dengan pola seperti berikut: 

            Output: 

            * 

            * * 

            * * * 

            * * * * 

            * * * * *

        */
        $mulaiRow = 1;
        $batasRow = 5;

        echo "Asterix: ".$batasRow."x".$batasRow;
        echo "<br><br>";

        for ($row = $mulaiRow; $row <= $batasRow; $row++)
                {
                    for ($col = $mulaiRow; $col <= $row ;$col++)
                        echo "* ";
                    echo "<br>";
                }

         echo "<br>";       

    ?></body>

</html>