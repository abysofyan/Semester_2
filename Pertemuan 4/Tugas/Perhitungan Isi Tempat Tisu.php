<?php
class Kubus {
    public $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    // Menghitung volume kubus
    public function volume() {
        return pow($this->sisi, 3); // Rumus: sisi^3
    }

    // Menghitung luas permukaan kubus
    public function luasPermukaan() {
        return 6 * pow($this->sisi, 2); // Rumus: 6 * sisi^2
    }

    // Mengembalikan hasil perhitungan
    public function getHasil() {
        return [
            'sisi' => $this->sisi,
            'volume' => number_format($this->volume(), 2),
            'luasPermukaan' => number_format($this->luasPermukaan(), 2)
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Isi Tempat Tisu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen py-8 px-4 bg-gradient-to-r from-blue-50 via-purple-50 to-pink-50">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 to-purple-700 p-6">
            <h1 class="text-2xl font-bold text-white text-center">Perhitungan Isi Tempat Tisu</h1>
        </div>

        <div class="p-6">
            <form action="" method="post" class="space-y-6">
                <div>
                    <label for="sisi" class="block text-sm font-medium text-gray-700 mb-1">Panjang Sisi (m)</label>
                    <input type="number" name="sisi" id="sisi" step="0.01" required
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-3 border focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200">
                </div>

                <button type="submit" name="hitung"
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-700 text-white py-3 px-4 rounded-md hover:from-blue-700 hover:to-purple-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                    Hitung
                </button>
            </form>

            <?php if (isset($_POST["hitung"])): ?>
                <?php
                $kubus = new Kubus(floatval($_POST["sisi"]));
                $hasil = $kubus->getHasil();
                ?>
                <div class="mt-6 bg-gray-50 rounded-md p-6 shadow-inner">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Hasil Perhitungan:</h2>
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Panjang Sisi:</span>
                            <span class="text-gray-800 font-medium"><?= $hasil['sisi'] ?> m</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-600">Volume:</span>
                            <span class="text-gray-800 font-medium"><?= $hasil['volume'] ?> m³</span>
                        </div>

                        <div class="flex justify-between">
                            <span class="text-gray-600">Luas Permukaan:</span>
                            <span class="text-gray-800 font-medium"><?= $hasil['luasPermukaan'] ?> m²</span>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>