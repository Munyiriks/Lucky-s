@section('title', 'Merkly')

@include('includes/header')

<h1>Merkly:</h1>
<br>

@php
    $files = scandir(public_path('txt\merkly'));

    foreach ($wallets as $wallet) {
        $my_wallet = strtolower($wallet->address);

        foreach (glob(public_path('txt\merkly') . '\*.txt') as $file_path) {
            $file = fopen($file_path, 'r');

            while (!feof($file)) {
                $file_wallet = trim(strtolower(fgets($file)));

                if ($my_wallet == $file_wallet) {
                    echo $wallet->name . ' ' . basename($file_path) . '<br><br>';
                }
            }

            fclose($file);
        }
    }
@endphp

{{-- <ul>
    <li><a href="/airdrop/merkly">Merkly</a></li>
</ul> --}}

@include('includes/footer')
