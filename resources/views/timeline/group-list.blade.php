<!doctype html>
<html>
<head>
    <title>UDESCussão</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <style>
        /* Estilo básico para a "fachada" do dropdown */
        .custom-dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%; /* Ajuste conforme necessário */
            max-width: 600px; /* Ajuste conforme necessário */
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            z-index: 1;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .modal-content {
            background-color: #fff;
            border-radius: 8px;
            max-width: 80%; /* Ajuste conforme necessário */
            width: 100%;
            padding: 20px;
        }

        .dropdown-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }

        .dropdown-header i {
            transition: transform 0.2s ease-in-out;
        }

        .dropdown-list {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .dropdown-item {
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-green-200">
<div class="w-full flex bg-white px-5 py-1 items-center"
     style="box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);">
    <a href="{{route('timeline')}}">
        <img width="180px" src="{{asset('images/logos/logo.png')}}">
    </a>

    <div class="custom-dropdown w-2/12 ml-5" id="customDropdown">
        <div class="dropdown-header" onclick="toggleDropdown()">
            <a href="{{route('timeline')}}">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 640 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/>
                    </svg>
                    <span class="text-gray-500 text-md ml-3">
                    Grupos
                </span>
                </div>
            </a>

            <svg xmlns="http://www.w3.org/2000/svg" height="12" viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                <path
                    d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/>
            </svg>
        </div>
        <div class="dropdown-list" id="dropdownList">
            <span class="text-gray-500 text-sm mt-4 p-3 border-b w-full">
                Feeds
            </span>
            <div class="dropdown-item mt-5" onclick="selectOption('home', 'Página Inicial')">
                <a href="{{route('timeline')}}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 576 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                        </svg>
                        <span class="text-gray-500 text-md ml-3">
                    Página Inicial
                </span>
                    </div>
                </a>
            </div>

            <div class="dropdown-item" onclick="selectOption('created', 'Publicações Feitas')">
                <a href="{{route('minhas-publicacoes')}}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="12" viewBox="0 0 384 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM80 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16s7.2-16 16-16zm16 96H288c17.7 0 32 14.3 32 32v64c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V256c0-17.7 14.3-32 32-32zm0 32v64H288V256H96zM240 416h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H240c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                        </svg>
                        <span class="text-gray-500 text-md ml-3">
                    Publicações Feitas
                </span>
                    </div>
                </a>
            </div>

            <div class="dropdown-item" onclick="selectOption('like', 'Publicações Curtidas')">
                <a href="{{route('publicacoes-curtidas')}}">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                            <path
                                d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"/>
                        </svg>
                        <span class="text-gray-500 text-md ml-3">
                    Publicações Curtidas
                </span>
                    </div>
                </a>
            </div>

            <div class="dropdown-item" onclick="selectOption('group', 'Grupos')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 640 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/>
                    </svg>
                    <span class="text-gray-500 text-md ml-3">
                    Grupos
                </span>
                </div>
            </div>

        </div>
    </div>

    <div class="w-5/12 ml-5">
        <form method="get">
            <div class="flex">
                <input class="focus:outline-none focus:border-green-500 w-full rounded-xl border-2 h-10 p-3" type="text"
                       placeholder="Pesquisar...">
                <button
                    class="rounded-full ml-2 px-5 flex justify-center items-center bg-green-500"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            fill="#fff"
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <div class="w-5/12 ml-5">
        <div class="h-20 rounded-lg flex p-2 px-5 justify-between"
             style="background-color: {{$user->background_color}}">
            <img class="rounded-full" src="{{asset($user->attachments[0]->path)}}">
            <div class="text-white font-semibold text-md ml-4">
                <div class="flex items-center">
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            fill="#fff"
                            d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                    </svg>
                    {{$user->name}}
                </div>

                <div class="flex items-center">
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" height="18" viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            fill="#fff"
                            d="M96 0C43 0 0 43 0 96V416c0 53 43 96 96 96H384h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V384c17.7 0 32-14.3 32-32V32c0-17.7-14.3-32-32-32H384 96zm0 384H352v64H96c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16zm16 48H336c8.8 0 16 7.2 16 16s-7.2 16-16 16H144c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                    </svg>
                    {{$user->course->name}}
                </div>
            </div>

            <a href="{{route('logout')}}">
                <div class="flex items-center ml-5 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 512 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                        <path
                            fill="#fff"
                            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/>
                    </svg>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="w-full flex justify-center">
    <div class="w-6/12 mt-10 p-3">
        @foreach($groups as $group)
            <div class="w-full bg-white border border-green-500 rounded-lg p-5 mt-2">
                <div class="w-full flex items-center justify-between border-b pb-2">
                    <div class="flex">
                        <img class="rounded-full" width="64px"
                             src="{{asset($group->attachments[0]?->path)}}">
                        <div class="ml-4 text-gray-500">
                            <p class="text-lg font-semibold">
                                {{$group->name}}
                            </p>
                            <p class="text-xs">
                                {{$group->course?->name}}
                            </p>
                            <p class="text-xs">
                                Criado em {{$group->created_at->format('d/m/Y')}}
                            </p>
                        </div>
                    </div>
                    <div>
                        @if($group->user_id == $user->id)
                            <div class="flex mb-3">
                                <div id="openEditGroupModalBtn" onclick="openModal({{ $group->id }})"
                                     class="bg-blue-500 p-2 rounded-full h-8 mr-2 cursor-pointer" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 512 512">
                                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path
                                            fill="#fff"
                                            d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                                    </svg>
                                </div>

                                <form action="{{ route('remove-grupo', ['id' => $group->id]) }}" method="POST"
                                      onsubmit="return confirm('Tem certeza que deseja excluir este Grupo?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">
                                        <div class="bg-red-500 p-2 rounded-full h-8 cursor-pointer" title="Excluir">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 448 512">
                                                <!-- Seu ícone SVG aqui -->
                                                <path fill="#fff"
                                                      d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                            </svg>
                                        </div>
                                    </button>
                                </form>
                            </div>

                        @endif

                        @if(!$group->participants->contains($user->id) || !$group->user_id == $user->id)
                            <a href="{{route('participar-grupo',['id' => $group->id])}}">
                                <button class="py-1 px-2 bg-blue-500 text-white rounded-lg">
                                    Participar
                                </button>
                            </a>
                        @else
                            <a href="{{route('participar-grupo',['id' => $group->id])}}">
                                <button class="py-1 px-2 bg-gray-600 text-white rounded-lg">
                                    Participando
                                </button>
                            </a>
                        @endif
                    </div>
                </div>

                <div class="w-full mt-6">
                    <span class="text-xl text-gray-700 font-normal">
                        {{$group->description}}
                    </span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="w-3/12 mt-12 p-3">
        <div class="bg-white border border-green-500 rounded-lg h-76 p-3">
            <div class="flex items-center border-b py-2 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 640 512">
                    <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                    <path
                        d="M72 88a56 56 0 1 1 112 0A56 56 0 1 1 72 88zM64 245.7C54 256.9 48 271.8 48 288s6 31.1 16 42.3V245.7zm144.4-49.3C178.7 222.7 160 261.2 160 304c0 34.3 12 65.8 32 90.5V416c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V389.2C26.2 371.2 0 332.7 0 288c0-61.9 50.1-112 112-112h32c24 0 46.2 7.5 64.4 20.3zM448 416V394.5c20-24.7 32-56.2 32-90.5c0-42.8-18.7-81.3-48.4-107.7C449.8 183.5 472 176 496 176h32c61.9 0 112 50.1 112 112c0 44.7-26.2 83.2-64 101.2V416c0 17.7-14.3 32-32 32H480c-17.7 0-32-14.3-32-32zm8-328a56 56 0 1 1 112 0A56 56 0 1 1 456 88zM576 245.7v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM320 32a64 64 0 1 1 0 128 64 64 0 1 1 0-128zM240 304c0 16.2 6 31 16 42.3V261.7c-10 11.3-16 26.1-16 42.3zm144-42.3v84.7c10-11.3 16-26.1 16-42.3s-6-31.1-16-42.3zM448 304c0 44.7-26.2 83.2-64 101.2V448c0 17.7-14.3 32-32 32H288c-17.7 0-32-14.3-32-32V405.2c-37.8-18-64-56.5-64-101.2c0-61.9 50.1-112 112-112h32c61.9 0 112 50.1 112 112z"/>
                </svg>
                <span class="text-gray-500 text-xl ml-3 font-semibold">
                    Grupos
                </span>
            </div>
            <p class="text-md text-gray-500 mt-2 border-b">
                Página de Grupos do UDESCussão que lista todos os Grupos Cadastrados na plataforma, junte-se a um deles
                e crie publicações!!!
            </p>

            <div class="flex justify-center w-full mt-5">
                <button id="openNewGroupModalBtn" class="bg-blue-500 rounded-lg w-full p-1 text-sm text-white">
                    Criar Novo Grupo
                </button>
            </div>
        </div>
    </div>
</div>

<div id="newGroupModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-lg w-10/12">
        <div class="flex justify-center text-xl text-green-500 font-semibold border-b border-green-500">
            Novo Grupo
        </div>
        <form action="{{route('salva-grupo')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="w-full flex items-center mt-4">
                <div class="w-6/12 mr-2">
                    <label class="text-green-500 text-sm mb-1">
                        Nome:
                    </label>
                    <input class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 p-3"
                           type="text" placeholder="Insira o Nome do Grupo" name="name" required>
                </div>

                <div class="w-6/12">
                    <label class="text-green-500 text-sm mb-1">
                        Relacionado ao Curso:
                    </label>
                    <input type="hidden" value="{{$user->id}}" name="user_id">

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

            <div class="w-full flex items-center mt-4">
                <div class="w-full">
                    <label class="text-green-500 text-sm mb-1">
                        Descrição do Grupo:
                    </label>
                    <textarea class="focus:outline-none focus:border-green-500 w-full rounded-md border px-3"
                              name="description" required>

                    </textarea>
                </div>
            </div>

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
            <button type="submit" class="mt-4 bg-green-500 text-white px-2 py-1 text-sm rounded">Criar Grupo</button>

            <button id="closeNewGroupModalBtn" class="mt-4 bg-gray-500 text-white px-2 py-1 rounded text-sm"
                    type="button">
                Fechar
            </button>
        </form>
    </div>
</div>

<div id="editGroupModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-lg w-10/12">
        <div class="flex justify-center text-xl text-green-500 font-semibold border-b border-green-500">
            Novo Grupo
        </div>
        <form action="{{route('edita-grupo')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="w-full flex items-center mt-4">
                <div class="w-6/12 mr-2">
                    <label class="text-green-500 text-sm mb-1">
                        Nome:
                    </label>
                    <input class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 p-3"
                           type="text" placeholder="Insira o Nome do Grupo" name="name_edit" id="name_edit" required>
                </div>

                <div class="w-6/12">
                    <label class="text-green-500 text-sm mb-1">
                        Relacionado ao Curso:
                    </label>
                    <input type="hidden" value="{{$user->id}}" name="user_id_edit" id="user_id_edit">
                    <input type="hidden" name="group_id_edit" id="group_id_edit">

                    <select
                        class="focus:outline-none focus:border-green-500 w-full rounded-md border h-8 bg-white"
                        name="course_id_edit" id="course_id_edit">
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

            <div class="w-full flex items-center mt-4">
                <div class="w-full">
                    <label class="text-green-500 text-sm mb-1">
                        Descrição do Grupo:
                    </label>
                    <textarea class="focus:outline-none focus:border-green-500 w-full rounded-md border px-3"
                              name="description_edit" id="description_edit" required>

                    </textarea>
                </div>
            </div>

            <div class="flex">
                <div class="w-6/12">
                    <label class="text-green-500 mb-2 text-sm"> Cor de Fundo: </label>
                    <input
                        class="focus:outline-none focus:border-green-500 w-full rounded-md border"
                        type="color" name="background_color_edit" id="background_color_edit">
                </div>

                <div class="w-6/12 ml-2">
                    <label class="block text-sm text-green-500">
                        Imagem de Perfil:
                    </label>
                    <div class="relative border border-gray-300 rounded-md px-2 text-sm py-1">
                        <input
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                            type="file"
                            name="image_edit" id="image_edit">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500">Escolher arquivo</span>
                            <span class="text-green-500 hover:text-green-700">Procurar</span>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="mt-4 bg-green-500 text-white px-2 py-1 text-sm rounded">Criar Grupo</button>

            <button id="closeEditGroupModalBtn" class="mt-4 bg-gray-500 text-white px-2 py-1 rounded text-sm"
                    type="button">
                Fechar
            </button>
        </form>
    </div>
</div>

</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function openModal(id) {
        console.log(id)
        // Requisição AJAX para obter os dados do grupo
        $.ajax({
            type: 'GET',
            url: '/obter-dados-grupo/' + id, // Substitua pela URL correta
            success: function (response) {
                // Preencher os campos da modal com os dados recebidos
                console.log(response)
                $('#group_id_edit').val(response.id);
                $('#user_id_edit').val(response.user_id);
                $('#name_edit').val(response.name);
                $('#course_id_edit').val(response.course_id);
                $('#description_edit').val(response.description);
                $('#background_color_edit').val(response.background_color);
            },
            error: function (error) {
                console.error(error);
                // Tratar erro, se necessário
            }
        });

    }
</script>

<script>
    const openNewGroupModalBtn = document.getElementById('openNewGroupModalBtn');
    const closeNewGroupModalBtn = document.getElementById('closeNewGroupModalBtn');
    const newGroupModal = document.getElementById('newGroupModal');

    const openEditGroupModalBtn = document.getElementById('openEditGroupModalBtn');
    const closeEditGroupModalBtn = document.getElementById('closeEditGroupModalBtn');
    const editGroupModal = document.getElementById('editGroupModal');

    openEditGroupModalBtn.addEventListener('click', () => {
        editGroupModal.classList.remove('hidden');
    });

    closeEditGroupModalBtn.addEventListener('click', () => {
        editGroupModal.classList.add('hidden');
    });

    openNewGroupModalBtn.addEventListener('click', () => {
        newGroupModal.classList.remove('hidden');
    });

    closeNewGroupModalBtn.addEventListener('click', () => {
        newGroupModal.classList.add('hidden');
    });
</script>

<script>
    function toggleDropdown() {
        $('#dropdownList').toggle();
        $('#customDropdown i').toggleClass('rotate-180');
    }

    function selectOption(value, text) {
        console.log('Opção selecionada:', value, text);
        $('#customDropdown .dropdown-header span').text(text);
        $('#dropdownList').hide();
        $('#customDropdown i').removeClass('rotate-180');
    }
</script>

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
