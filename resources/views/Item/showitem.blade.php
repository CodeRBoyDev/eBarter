 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>e-Barter</title>
<link rel="shortcut icon" type="image/jpg" href="{{ asset('image/barter.png') }}"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('css/itemshow.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/profileitem.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/profileitems.css') }}">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
         integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>

    
    @livewireStyles
@include('partials.header')
</head>

<body class="antialiased">

   
                        @livewire('product-ratings', ['item' => $item], key($item->id))

                        <div
                            class="justify-center w-full px-4 mt-2 font-sans text-xs leading-6 text-center text-gray-500">
                            <a href="#_">Terms and conditions apply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    @livewireScripts

</body>

</html>