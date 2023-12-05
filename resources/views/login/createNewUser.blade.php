<!doctype html>
<html>
<head>
    <title> Novo Usuário </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2"></script>

    @vite('resources/css/app.css')
</head>
<body class="bg-green-200">
<div class="w-full h-full flex justify-center text-gray-500">
    <div class="w-10/12 p-5 border border-green-600 rounded-lg bg-white mt-10">
        <div class="flex justify-center text-3xl text-green-500 font-semibold border-b border-green-500">
            Novo Usuário
        </div>

        <div class="mt-5">
            <form action="{{route('salva-usuario')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="w-full p-3">
                    <div x-data="{ open: true }">
                        <div class="flex items-baseline cursor-pointer" @click="open = !open">
                            <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="24"
                                 viewBox="0 0 448 512">
                                <path
                                    d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                            </svg>
                            <span class="text-lg ml-2 text-green-500">Informações Pessoais</span>
                            <span x-show="open" class="ml-2">
                            <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                 viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path
                                    d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/>
                            </svg>
                        </span>
                            <span x-show="!open" class="ml-2">
                            <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                 viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path
                                    d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                        </span>
                        </div>

                        <div x-show="open" class="p-5 border-l border-gray-300">
                            <div class="flex">
                                <div class="w-8/12">
                                    <label class="text-green-500 mb-2 text-sm"> Nome Completo: </label>
                                    <input
                                        class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 p-3"
                                        type="text" placeholder="Insira Seu Nome" name="name" required>
                                </div>

                                <div class="w-4/12 ml-2">
                                    <label class="text-green-500 mb-2 text-sm"> Email: </label>
                                    <input
                                        class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 p-3"
                                        type="email" placeholder="Insira Seu Email" name="email" required>
                                </div>
                            </div>

                            <div class="flex mt-2">
                                <div class="w-6/12">
                                    <input type="hidden" value="{{$roleId}}" name="role_id">
                                    <label class="text-green-500 mb-2 text-sm"> Login: </label>
                                    <input
                                        class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 p-3"
                                        type="text" placeholder="Insira Seu Login" name="login" required>
                                </div>

                                <div class="w-6/12 ml-2">
                                    <label class="text-green-500 mb-2 text-sm"> Senha: </label>
                                    <input
                                        class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 p-3"
                                        type="password" placeholder="Insira Sua Senha" name="password" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full p-3">
                    <div x-data="{ open: true }">
                        <div class="flex items-baseline cursor-pointer" @click="open = !open">
                            <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="24"
                                 viewBox="0 0 640 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                <path
                                    d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9v28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5V291.9c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z"/>
                            </svg>
                            <span class="text-lg ml-2 text-green-500">Informações Estudantis</span>
                            <span x-show="open" class="ml-2">
                                <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                     viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path
                                        d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/>
                                </svg>
                            </span>
                            <span x-show="!open" class="ml-2">
                                <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                     viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/>
                                </svg>
                            </span>
                        </div>

                        <div x-show="open" class="p-5 border-l border-gray-300">
                            <div class="flex">
                                <div class="w-full">
                                    <label class="text-green-500 mb-2 text-sm"> Curso: </label>
                                    <select
                                        class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 bg-white"
                                        name="course_id">
                                        @foreach($courses as $course)
                                            <option class="rounded-md mt-2" value="{{$course->id}}">
                                                <span title="{{$course->description}}">
                                                    {{$course->name}}
                                                </span>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full p-3">
                    <div x-data="{ open: true }">
                        <div class="flex items-baseline cursor-pointer" @click="open = !open">
                            <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="24"
                                 viewBox="0 0 512 512">
                                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                <path
                                    d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"/>
                            </svg>
                            <span class="text-lg ml-2 text-green-500">Informações de perfil</span>
                            <span x-show="open" class="ml-2">
                                <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                     viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path
                                        d="M233.4 105.4c12.5-12.5 32.8-12.5 45.3 0l192 192c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L256 173.3 86.6 342.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l192-192z"/>
                                </svg>
                            </span>
                            <span x-show="!open" class="ml-2">
                                <svg class="fill-green-500" xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                     viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path
                                        d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/>
                                </svg>
                            </span>
                        </div>

                        <div x-show="open" class="p-5 border-l border-gray-300">
                            <div class="flex">
                                <div class="w-6/12">
                                    <label class="text-green-500 mb-2 text-sm"> Cor de Fundo: </label>
                                    <input
                                        class="focus:outline-none focus:border-green-500 w-full rounded-md border"
                                        type="color" name="background_color" id="background_color"
                                        onchange="previewImage(document.getElementById('image'))">
                                </div>

                                <div class="w-6/12 ml-2">
                                    <label class="block text-sm text-green-500">
                                        Imagem de Perfil:
                                    </label>
                                    <div class="relative border border-gray-300 rounded-md px-2 text-sm py-1">
                                        <input
                                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                            type="file"
                                            name="image"
                                            id="image"
                                            onchange="previewImage(this)">
                                        <div class="flex items-center justify-between">
                                            <span class="text-gray-500">Escolher arquivo</span>
                                            <span class="text-green-500 hover:text-green-700">Procurar</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="text-sm text-green-500 mt-5">
                                    Pré - visualização :
                                </span>
                                <div id="imagePreview" class="mt-2 w-full flex justify-center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5 flex justify-between">
                    <a href="{{ route("welcome") }}">
                        <button
                            type="button"
                            class="border border-gray-500 rounded-md text-gray-500 py-1 px-5 hover:text-white hover:bg-gray-500">
                            Voltar a tela de login
                        </button>
                    </a>

                    <input
                        class="cursor-pointer ml-5 border border-green-500 rounded-md py-1 px-5 text-white bg-green-500"
                        type="submit" value="Cadastrar">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const backGroupColor = document.getElementById('background_color').value
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.innerHTML = `
                    <div class="w-6/12 h-48 rounded-lg flex " style="background-color: ${backGroupColor};">
                        <img src="${e.target.result}" alt="Preview" class="object-cover rounded-full w-32 h-32 ml-5 mt-3">
                    <div>
`;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.innerHTML = '';
        }
    }
</script>
