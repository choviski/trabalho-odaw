<!doctype html>
<html>
<head>
    <title>UDESCussão</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<body class="bg-green-200">
<div class="w-full h-full flex justify-center">
    <div class="w-5/12 p-5 border border-green-600 rounded-lg bg-white mt-32">
        <div class="flex justify-center">
            <img class="w-8/12" src="{{asset('images/logos/logo.png')}}">
        </div>

        <div class="mt-10">
            <form method="post" action="{{route('login')}}">
                @csrf
                <div class="w-full">
                    <label class="text-green-500 mb-2 text-sm"> Login: </label>
                    <input class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 p-3"
                           name="login"
                           type="text" placeholder="Insira o Login" required>
                </div>

                <div class="w-full mt-4">
                    <label class="text-green-500 mb-2 text-sm"> Senha: </label>
                    <input class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 p-3"
                           name="password" type="password" placeholder="Insira a Senha" required>
                </div>

                @if($message)
                    <div
                        class="w-full rounded-lg border border-red-500 flex justify-center text-red-500 bg-red-100 py-1 mt-2">
                        {{$message}}
                    </div>
                @endif

                <div class="w-full mt-4">
                    <input
                        class=" w-full cursor-pointer text center rounded-md border border-green-500 hover:bg-green-500 hover:text-white text-green-500 text-center py-1 px-5"
                        type="submit" value="Entrar">
                </div>
            </form>

            <div class="mt-20">
                <div class="flex justify-center items-center">
                    <div class="border-t border-gray-300 w-4/12"></div>

                    <span class="text-gray-500 w-4/12 text-center">
                        Novo no UDESCussão?
                    </span>
                    <div class="border-t border-gray-300 w-4/12"></div>
                </div>

                <a href="{{ route("cadastra-usuario") }}">
                    <button
                        class="w-full mt-7 border border-gray-500 rounded-md text-gray-500 py-1 px-5 hover:text-white hover:bg-gray-500">
                        Crie uma conta
                    </button>
                </a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
