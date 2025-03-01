<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="icon" href="{{ asset('images/logo/kmeowkeyshop_logo.png') }}">
    <title>K'meow Key Shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://kit.fontawesome.com/e38e4d492f.js" crossorigin="anonymous"></script>
    <style>
        /* Chrome, Safari, Edge, Opera
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        } */

        /* Firefox */
        input[type=number] {
          -moz-appearance: textfield;
        }

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active  {
            -webkit-box-shadow: 0 0 0 30px rgb(75 85 99) inset !important;
            -webkit-text-fill-color: rgb(229 231 235) !important;
        }
    </style>
    {{-- <style>
         ::-webkit-scrollbar {
            width: 0.5rem;
        }

         ::-webkit-scrollbar-thumb:hover {
            background: gray;
        }

         ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 1px grey;
            border-radius: 1rem;
        }

         ::-webkit-scrollbar-thumb {
            background: darkgrey;
            border-radius: 1rem;
        }
    </style> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
    <script src="https://cdn.tailwindcss.com/3.3.0"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                fontFamily: {
                    sans: ["Roboto", "sans-serif"],
                    body: ["Roboto", "sans-serif"],
                    mono: ["ui-monospace", "monospace"],
                },
            },
            corePlugins: {
                preflight: false,
            },
        };

    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <script defer src="{{ asset('js/js.js') }}"></script>
    <script defer src="{{ asset('js/search.js') }}"></script>
</head>
