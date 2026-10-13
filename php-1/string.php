<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>String PHP</title>
</head>
<body>
    <h1>Berlatih String PHP</h1>
    <?php   
        echo "<h3> Soal No 1</h3>";
        /* 
            SOAL NO 1
            Tunjukan dengan menggunakan echo berapa panjang dari string yang diberikan berikut! Tunjukkan juga jumlah kata di dalam kalimat tersebut! 

            Contoh: 
            $string = "PHP is never old";
            Output:
            Panjang string: 16, 
            Jumlah kata: 4 
        */

        $first_sentence = "Hello PHP!" ; // Panjang string 10, jumlah kata: 2
        $second_sentence = "I'm ready for the challenges"; // Panjang string: 28,  jumlah kata: 5

        $cek_panjang_first_sentence = strlen($first_sentence);
        $cek_panjang_second_sentence = strlen($second_sentence);

        $cek_jumlah_kata_first_sentence = str_word_count($first_sentence);
        $cek_jumlah_kata_second_sentence = str_word_count($second_sentence);

        echo "kata pertama adalah ".$first_sentence."<br>";
        echo "panjang string dari kata pertama adalah ".$cek_panjang_first_sentence."<br>";
        echo "jumlah kata pertama adalah ".$cek_jumlah_kata_first_sentence."<br>";

        echo "<br>kata kedua adalah ".$second_sentence."<br>";
        echo "panjang string dari kata kedua adalah ".$cek_panjang_second_sentence."<br>";
        echo "jumlah kata kedua adalah ".$cek_jumlah_kata_second_sentence."<br>";
        
        echo "<h3> Soal No 2</h3>";
        /* 
            SOAL NO 2
            Mengambil kata pada string dan karakter-karakter yang ada di dalamnya. 
            
            
        */
        $string2 = "I love PHP";
        
        echo "<label>String: </label> \"$string2\" <br>";
        echo "Kata pertama: " . substr($string2, 0, 1) . "<br>" ; 
        // Lanjutkan di bawah ini
        echo "Kata kedua: " . substr($string2,2,5);
        echo "<br> Kata Ketiga: " . substr($string2,7,10);

        echo "<h3> Soal No 3 </h3>";
        /*
            SOAL NO 3
            Mengubah karakter atau kata yang ada di dalam sebuah string.
        */
        $string3 = "PHP is old but sexy!";

        $kata_yg_ingin_diedit = "sexy!";
        $input_kata_pengganti = "awesome";

        $edit_kalimat_string3 = str_replace($kata_yg_ingin_diedit,$input_kata_pengganti,$string3);

        echo $edit_kalimat_string3; 
        // OUTPUT : "PHP is old but awesome"

    ?>
</body>
</html>