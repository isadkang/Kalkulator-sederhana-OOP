<?php
class Kalkulator
{
    private $nilai1, $nilai2, $operator;

    public function hitung($nilai1, $nilai2, $operator)
    {
        switch ($operator) {
            case '+': 
                return $nilai1 + $nilai2;
                break;
            case '-': 
                return $nilai1 - $nilai2;
                break;
            case '*': 
                return $nilai1 * $nilai2;
                break;
            case '/': 
                if ($nilai2 != 0){
                    return $nilai1 / $nilai2;
                } else {
                    return "Pembagian dengan 0 tidak valid";
                }
                break;
            default: 
                return "Operator tidak valid";
        }
    }
}

if (isset($_POST['submit'])){
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $operator = $_POST['operator'];
    

    $calcu = new Kalkulator();
    $result = $calcu->hitung($nilai1, $nilai2, $operator);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
    <link rel="stylesheet" href="./dist/output.css">
</head>

<body>

    <section class="flex flex-col justify-center items-center h-screen">
        <h2 class="text-center text-2xl font-medium">Kalkulator Dengan Konsep OOP PHP Sederhana</h2>
        <br>
        <div class="w-full max-w-sm p-4 bg-neutral-300 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
            <form action="" method="POST">
                <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                        Bilangan 1
                    </span>
                    <input type="number" name="nilai1" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukan Nilai Pertama..." />
                </label>

                <label class="block">
                    <span class="after:content-['*'] after:ml-0.5 after:text-red-500 block text-sm font-medium text-slate-700">
                        Bilangan 2
                    </span>
                    <input type="number" name="nilai2" class="mt-1 px-3 py-2 bg-white border shadow-sm border-slate-300 placeholder-slate-400 focus:outline-none focus:border-sky-500 focus:ring-sky-500 block w-full rounded-md sm:text-sm focus:ring-1" placeholder="Masukan Nilai Kedua..." />
                </label>

                <label for="default" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default select</label>
                <select id="default" name="operator" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected >Operator</option>
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>

                <div class="flex justify-center items-center">
                    <input type="submit" name="submit" value="Hitung!" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" />
                    <button type="button" onclick="resetHasil()" class="mt-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reset</button>
                </div>
            </form>
        </div>
        <br>
        <div id="result" class="flex flec-col justify-center items-center">
            <?php if (isset($result)) : ?>
                <p>Hasil dari Perkalkulasian diatas adalah : <?=" ".$result ?></p>
            <?php endif; ?>
        </div>
    </section>

    <script>
        const resetHasil = () => {
            document.getElementById("result").innerHTML = ""
        }
    </script>
</body>

</html>